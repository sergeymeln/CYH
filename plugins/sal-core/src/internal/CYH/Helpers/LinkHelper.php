<?php


namespace CYH\Helpers;


class LinkHelper
{
    public static function AppendQueryParams($url, array $params)
    {
        $appendedQuery = http_build_query($params);
        if (strpos($url, '?') !== false)
        {
            $url .= '&' . $appendedQuery;
        }
        else
        {
            $url .= '?' . $appendedQuery;
        }

        return $url;
    }
}