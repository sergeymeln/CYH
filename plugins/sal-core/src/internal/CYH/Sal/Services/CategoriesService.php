<?php


namespace CYH\Sal\Services;


use CYH\Models\Cache\CacheSettings;
use CYH\Models\Category;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Filters\CategoryFilter;
use CYH\Sal\Services\Base\BaseService;

class CategoriesService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetCategoriesList(CategoryFilter $filter, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetCategoriesList($filter, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0) {
            foreach ($res->Data as $category) {
                $categories[] = Category::CreateFromArray($category);
            }
            return $categories;
        } else {
            return [];
        }
    }

    /**
     * @return Category|null
     */
    public function GetCategoryById($id, CacheSettings $cacheSettings)
    {
        $categories = $this->GetCategoriesList(new CategoryFilter(), $cacheSettings);
        foreach ($categories as $cat) {
            /* @var $cat Category */
            if ($cat->Id == $id) {
                return $cat;
            }
        }

        //if we got here we haven't found any categories
        return null;
    }
}