<?php


namespace CYH\Controllers\Core;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\FormatHelper;
use CYH\Models\Category;
use CYH\Models\Core\ViewDirRegistryEntry;
use CYH\Models\Filters\CategoryFilter;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\Html\MetaTags;
use CYH\Models\RG\UserProfile;
use CYH\Plugins\PluginBase;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\CategoriesService;
use CYH\Sal\Services\ServiceProviderService;
use CYH\Sal\Services\SpCategoriesService;

class GenericController
{
    protected $spService = null;
    protected $catService = null;
    protected $spCatService = null;

    /* @var ControllerContext */
    protected $context;

    private $viewData = [];

    public function __construct(ControllerContext $context)
    {
        $this->context = $context;
        $this->spService = new ServiceProviderService();
        $this->catService = new CategoriesService();
        $this->spCatService = new SpCategoriesService();

        $this->AddViewData('context', $context);
    }

    protected function View($templateName, $data = [], $domain = null)
    {
        if (!is_null($domain))
        {
            $this->ViewRenderer($templateName, $domain, $data);
        }
        else
        {
            $this->ViewRenderer($templateName, $this->context->SiteType, $data);
        }
    }

    private function ViewRenderer($templateName, $domain, $data = [])
    {
        $data = array_merge($this->viewData, $data);
        extract($data);

        //calling domain override filter
        $domain = apply_filters('cyh_domain_override', $domain);
        $templateName = apply_filters('cyh_template_name_override', $templateName);

        $viewRegistry = PluginBase::GetViewDirectories();

        //initializing the list of view dirs to search for view in
        $searchDirs = [];
        //TODO: convert to recursive function
        foreach ($viewRegistry as $registryItem)
        {
            /* @var $registryItem ViewDirRegistryEntry */
            if ($registryItem->PluginKey == $this->context->PluginName)
            {
                $searchDirs[] = $registryItem->ViewDir;
                if (count($registryItem->ViewDirAlternatives) > 0)
                {
                    foreach ($viewRegistry as $altDir)
                    {
                        /* @var $altDir ViewDirRegistryEntry */
                        if (in_array($altDir->PluginKey, $registryItem->ViewDirAlternatives))
                        {
                            $searchDirs[] = $altDir->ViewDir;
                        }
                    }
                }
            }
        }
        $found = false;
        $actualSearchedDirs = [];
        foreach ($searchDirs as $dir)
        {
            if (file_exists($dir . $domain . '/' . $templateName . '.php'))
            {
                $found = true;
                require ($dir . $domain . '/' . $templateName . '.php');
                break;
            }
            elseif (file_exists($dir . $templateName . '.php'))
            {//fall back to general directory instead of site-specific directory
                $found = true;
                require ($dir . $templateName . '.php');
                break;
            }
            $actualSearchedDirs[] = $dir . $domain . '/' . $templateName . '.php';
            $actualSearchedDirs[] = $dir . $templateName . '.php';
        }

        if (!$found && defined('WP_DEBUG') && WP_DEBUG === true)
        {
            echo implode('<br>', $actualSearchedDirs);
        }
    }

    protected function OverrideTemplateDomain($newValue)
    {
        add_filter('cyh_domain_override', function() use ($newValue){
            return $newValue;
        }, 1, 0);
    }

    protected function OverrideViewRoot($newValue)
    {
        add_filter('cyh_view_root_override', function() use ($newValue){
            return $newValue;
        }, 1, 0);
    }

    protected function OverrideTemplateName($newValue)
    {
        add_filter('cyh_template_name_override', function() use ($newValue){
            return $newValue;
        }, 1, 0);
    }

    protected function AddViewData($name, $value)
    {
        $this->viewData[$name] = $value;
    }

    protected function ClearViewData()
    {
        $this->viewData = [];
    }

    protected function Redirect($url, $statusCode = 302)
    {
        wp_redirect($url, $statusCode);
        exit;
    }

    protected function InitializeMetaTags(MetaTags $metaInfo)
    {
        //this callback will be called when template rendering is finished and right before it is being output
        add_filter('cyh-shutdown-filter', function($output) use ($metaInfo) {

            if (!empty($metaInfo->PageTitle))
            {
                $output = preg_replace('/<title>(.*?)<\/title>/','<title>' . $metaInfo->PageTitle . '</title>', $output);
            }
            if (!empty($metaInfo->OgTags->Title))
            {
                $output = preg_replace('/<meta property="og:title"(.*?)\/>/','<meta property="og:title" content="' . $metaInfo->OgTags->Title . '" />', $output);
            }
            if (!empty($metaInfo->OgTags->Description))
            {
                $output = preg_replace('/<meta property="og:description"(.*?)\/>/','<meta property="og:description" content="' . $metaInfo->OgTags->Description . '" />', $output);
            }
            if (!empty($metaInfo->OgTags->Url))
            {
                $output = preg_replace('/<meta property="og:url"(.*?)\/>/','<meta property="og:url" content="' . $metaInfo->OgTags->Url . '" />', $output);
            }
            if (!empty($metaInfo->Description))
            {
                $output = preg_replace('/<meta name="description"(.*?)\/>/','<meta name="description" content="' . $metaInfo->Description . '" />', $output);
            }
            if (!empty($metaInfo->LinkCanonical))
            {
                $output = preg_replace('/<link rel="canonical"(.*?)\/>/','<link rel="canonical" href="' . $metaInfo->LinkCanonical . '" />', $output);
            }

            //plain overwrites
            if ($metaInfo->PlainOverrides)
            {
                $output = preg_replace('/<meta name="robots"(.*?)\/>/','<meta name="robots" content="index, follow" />', $output);
                $output = preg_replace('/<link rel="next"(.*?)\/>/','', $output);
            }

            return $output;
        });
    }

    protected function CheckAuthentication($accessToken, $groupId, $redirectUrl = '/') : UserProfile
    {
        /* @var $profile \CYH\Models\RG\UserProfile */
        $profile = $this->custService->GetUserProfile($accessToken, $groupId, CacheSettingsProvider::GetCacheDisabledSettings());
        if (is_null($profile)) {
            //if we can't get a profile info then user was logged off
            FlashMessageHelper::SetMessage("session-expired", "The session has expired");

            $this->Redirect(LinkHelper::AppendQueryParams($redirectUrl, [
                'salAction' => 'session-expired'
            ]));
        }

        return $profile;
    }

    /**
     * @return int|null
     */
    protected function MatchBrandByName(string $spName)
    {
        $filter = new ServiceProviderFilter();
        $spList = $this->spService->GetServiceProviderList($filter, CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(3600));
        foreach ($spList as $item)
        {
            /* @var $item ServiceProvider */
            if (FormatHelper::GetUrlFriendlyString($item->Name) == $spName)
            {
                return $item;
            }
        }

        return null;
    }

    /**
     * @return int|null
     */
    protected function MatchCategoryByName(string $catName)
    {
        $filter = new CategoryFilter();
        $catList = $this->catService->GetCategoriesList($filter, CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(3600));
        foreach ($catList as $item)
        {
            /* @var $item Category */
            if (FormatHelper::GetUrlFriendlyString($item->Name) == $catName)
            {
                return $item;
            }
        }

        return null;
    }

    /**
     * @return int|null
     */
    protected function MatchSpCategoryByName(string $spCatName)
    {
        $catList = $this->spCatService->GetSpCategoriesList(CacheSettingsProvider::GetCacheDisabledSettings());
        foreach ($catList as $item)
        {
            /* @var $item Category */
            if (FormatHelper::GetUrlFriendlyString($item->Name) == $spCatName)
            {
                return $item;
            }
        }

        return null;
    }
}