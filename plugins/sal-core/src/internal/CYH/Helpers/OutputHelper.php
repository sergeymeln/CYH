<?php


namespace CYH\Helpers;


class OutputHelper
{
    public static function EchoHtmlEntities($obj, $fieldName)
    {
        if (!is_null($obj) && !empty($obj)
            && property_exists(get_class($obj), $fieldName) && !empty($obj->$fieldName)) {
            echo htmlentities($obj->$fieldName);
        }
    }

    public static function EchoHtmlEntitiesFromString($value)
    {
        echo htmlentities($value);
    }

    public static function EchoHtmlEntitiesFromArray($arr, $fieldName)
    {
        if (!is_null($arr) && !empty($arr)
            && !empty($arr[$fieldName])) {
            echo htmlentities($arr[$fieldName]);
        }
    }
}