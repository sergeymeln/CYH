<?php


namespace CYH\Helpers;


class JsOutputHelper
{
    public static function OutputBoolValue($value)
    {
        echo ($value) ? 'true' : 'false';
    }

    public static function OutputObjectJson($obj)
    {
        echo json_encode($obj);
    }
}