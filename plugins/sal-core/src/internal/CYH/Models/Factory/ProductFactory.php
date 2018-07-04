<?php


namespace CYH\Models\Factory;


use CYH\Models\Phone;
use CYH\Models\Product;
use CYH\Models\ServiceProviderCategory;

class ProductFactory
{
    public static function CreateProductFromArray(array $product): Product
    {
        $productRes = Product::CreateFromArray($product);
        if (!is_null($product['Phone']))
        {
            $productRes->Phone = Phone::CreateFromArray($product['Phone']);
        }
        if (!is_null($product['ServiceProviderCategory']))
        {
            $productRes->ServiceProviderCategory = ServiceProviderCategoryFactory::CreateSpCategoryFromArray($product['ServiceProviderCategory']);
        }

        return $productRes;
    }
}