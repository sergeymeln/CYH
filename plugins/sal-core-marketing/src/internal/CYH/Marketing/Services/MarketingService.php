<?php


namespace CYH\Marketing\Services;

use CYH\Marketing\Repositories\MarketingRepository;
use CYH\Sal\Services\Base\CacheableService;
use CYH\Marketing\Helpers\UrlHelper;

class MarketingService extends CacheableService
{
    protected $marketingRepository = null;

    public function __construct()
    {
        parent::__construct();
        $this->marketingRepository = new MarketingRepository();
    }

    public function GetCitiesData($data)
    {
        $citiesData = $this->marketingRepository->GetCitiesData($data);
        if(count($citiesData)>0) {
            $bullets = $this->marketingRepository->GetCityBullets($citiesData['city_id']);
            foreach($bullets as $bullet) {
                $citiesData['bullets'][] = $bullet;
            }
        }
        $zipCodes = explode('/', $citiesData['zip_code']);
        $citiesData['zip_code'] = trim($zipCodes[0]);
        $relatedCities = $this->marketingRepository->GetRelatedCities($citiesData);
        foreach($relatedCities as $relCity) {
            $citiesData['related_cities'][] = $this->getRelatedLinkData($relCity);
        }

        return $citiesData;

    }

    /**
     * @param $data
     * @return array|bool
     */
    public function getCityFromUrl($data)
    {
        return $this->marketingRepository->getCityFromUrl($data);
    }

    /**
     * @param $data
     * @return array
     */
    private function getRelatedLinkData($data)
    {
        $linkData = ['state_code' => $data['state_code'], 'city_name' => $data['city_name'], 'city_normal_name' => $data['city_normal_name']];

        return $linkData;
    }

    /**
     * @param $zipCode
     * @return mixed
     */
    public function getCityByZip($zipCode)
    {
        $result = $this->marketingRepository->getCityByZip($zipCode);
        $cities = [];
        foreach($result as $city) {
            $cities[] = $city;
        }

        if(count($cities) == 0) {
            return false;
        }

        return $cities[0];
    }

    /**
     * @param $zipCode
     * @return string
     */
    public function getCityTitle($cityData)
    {
        return 'Best Cable TV and Internet Providers in '.$cityData['city_normal_name'].', '.$cityData['state_name'];
    }

    /**
     * @param $cityData
     * @return string
     */
    public function getCityDescription($cityData)
    {
        return 'Find local cable TV and internet providers in '.$cityData['city_normal_name'].', '.$cityData['state_name'].'. Call $1-111-111-111 for high-speed internet service providers.';
    }

    /**
     * @param $cityData
     * @return string
     */
    public function getBrandHtml($brandId)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $products = json_decode($_SESSION['productsForBrand']);
        $hideTab = '';

        $html = '<div id="internetOffers" class="tab-pane fade in active">
            <table class="table providers-table offers-table hidden-xs">
                <thead>
                <tr class="thead-row">
                    <th scope="col" class="col-sm-1 col-md-2">Brand</th>
                    <th scope="col" class="col-sm-5 col-md-4">Product Description</th>
                    <th scope="col" class="col-sm-3 col-md-2">Speed</th>
                    <th scope="col" class="col-sm-3 col-md-2">Price</th>
                    <th scope="col" class="hidden-xs hidden-sm">Call to Order</th>
                </tr>
                </thead>
                <tbody>';

                $tempCounter = 0;
                foreach ($products as $prod) {
                    if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
                    $tempCounter++;
                }

                if($tempCounter > 0){
                     foreach($products as $prod){
                         if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
                         if(in_array($prod->ServiceProviderCategory->Category->Id, [4,5])){
                             $hideTab = 'allBrandsTab2';
                         } else {
                             $hideTab = 'allBrandsTab1';
                         }
                         $html.='<tr>
                            <td><img src="'.$prod->ServiceProviderCategory->Provider->Logo.'"></td>
                         <td class="slide-cell"><span class="middle-text arrow-up">'.$prod->Name.' </span></td>
                         <td><span class="big-text"><span class="number">50</span> Mbps</span></td>
                         <td><span class="big-text"><span class="number">$'.$prod->Price .'</span></span> '.$prod->PriceDescriptionEnd.'</td>
                         <td class="hidden-xs hidden-sm">
                             <a href="tel:'.\CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'"
                                onclick="ga(\'send\', \'event\', \'Call\', \'ClicktoCall - Header\');" class="btn btn-orange">'.
                                  \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'
                             </a>
                         </td>
                         </tr>
                         <tr class="hidden-row">
                             <td></td>
                             <td colspan="3">
                                 <div class="hidden-content">
                                     <ul class="plan-description">';
                                         $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description);
                                         $descr = explode('~~', $descr);
                                         foreach ($descr as $item){
                                             if($item ==''){
                                                 continue;
                                             }

                                             $html.='<li>'.$item.'</li>';
                                         }

                                         $html.='</ul>
                                 </div>
                             </td>
                             <td></td>
                         </tr>
                         <tr class="hidden-md hidden-lg">
                             <td colspan="4">
                                 <a href="tel:'.\CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'"
                                    onclick="ga(\'send\', \'event\', \'Call\', \'ClicktoCall - Header\');" class="btn btn-orange">'.
                                     \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'
                                 </a>
                             </td>
                         </tr>';
                     }
                } else {
                    $html.='<tr>
                        <td colspan="5">No items found</td>
                    </tr>';
                }

                $html.='</tbody>
            </table>';
            $tempCounter = 0;
            foreach ($products as $prod) {
                if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
                $tempCounter++;
            }

             if($tempCounter > 0) {$html.='<ul class="providers-table-slider hidden-sm hidden-md hidden-lg">';
             foreach($products as $prod){
                 if($prod->ServiceProviderCategory->Provider->Id != $brandId){continue;}
                     if(in_array($prod->ServiceProviderCategory->Category->Id, [4,5])){
                         $hideTab = 'allBrandsTab2';
                     } else {
                         $hideTab = 'allBrandsTab1';
                     }
                     $html.='<li>
                         <table class="table providers-table tablet">
                             <thead>
                             <tr class="thead-row">
                                 <th scope="col" class="col-xs-6">Brand</th>
                                 <th scope="col" class="col-xs-6">Product Description</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <td><img src="'.$prod->ServiceProviderCategory->Provider->Logo.'"></td>
                                 <td class="slide-cell"><span class="middle-text arrow-up">'.$prod->Name.'</span></td>
                             </tr>
                             <tr class="hidden-row">
                                 <td></td>
                                 <td>
                                     <div class="hidden-content">
                                         <ul class="plan-description">';
                                             $descr = str_replace(['{bullets}','{/bullets}'],['',''], $prod->Description);
                                             $descr = explode('~~', $descr);
                                             foreach ($descr as $item){
                                                 if($item ==''){
                                                     continue;
                                                 }

                                                 $html.='<li>'.$item.'</li>';
                                             }
                                        $html.='</ul>
                                     </div>
                                 </td>
                             </tr>
                             <tr class="thead-row thead-simple">
                                 <th>Speed</th>
                                 <th>Price</th>
                             </tr>
                             <tr>
                                 <td><span class="big-text"><span class="number">50</span> Mbps</span></td>
                                 <td><span class="big-text"><span class="number">$'.$prod->Price.'</span></span> '.$prod->PriceDescriptionEnd.'</td>
                             </tr>
                             <tr class="btn-row">
                                 <td colspan="2">
                                     <a href="tel:'.\CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'"
                                        onclick="ga(\'send\', \'event\', \'Call\', \'ClicktoCall - Header\');" class="btn btn-orange">'.
                                            \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'
                                    </a>
                                 </td>
                             </tr>
                             </tbody>
                         </table>
                         <table class="table providers-table mobile">
                             <thead>
                             <tr class="thead-row">
                                 <th>Brand</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                 <td><img src="'.$prod->ServiceProviderCategory->Provider->Logo.'"></td>
                             </tr>
                             <tr class="thead-row thead-simple">
                                 <th >Price From</th>
                             </tr>
                             <tr>
                                 <td><span class="big-text"><span class="number">$'.$prod->Price .'</span> '.$prod->PriceDescriptionEnd.'</span></td>
                             </tr>
                             <tr class="thead-row thead-simple">
                                 <th>Max Speed</th>
                             </tr>
                             <tr>
                                 <td><span class="big-text"><span class="number">100</span> Mbps</span> </td>
                             </tr>
                             <tr class="btn-row">
                                 <td><a href="tel:'.\CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'"
                                        onclick="ga(\'send\', \'event\', \'Call\', \'ClicktoCall - Header\');" class="btn btn-orange">'.
                                            \CYH\Helpers\FormatHelper::FormatPhoneNumber($prod->Phone->Number).'
                                    </a></td>
                             </tr>
                             </tbody>
                         </table>
                     </li>';}

        $html.='</ul>';} else {
                 $html.='<p class="not-found-items hidden-sm hidden-md hidden-lg">No items found</p>';
             }

        $html.='</div>';

       return ['html'=>$html, 'hideTab' => $hideTab];
    }
}