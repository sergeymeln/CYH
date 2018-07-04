<?php


namespace CYH\Helpers;


use CYH\Helpers\Parsers\BulletSection;
use CYH\Helpers\Parsers\TextSection;

class ContentDeserializeHelper
{
    public static function GetProviderRows($str)
    {
        $cleanStr = str_replace("*", "", $str);

        return explode("\r\n-", $cleanStr);
    }

    public static function GetDescription($str)
    {
        return explode("*", $str);
    }

    public static function GetDescriptionFromTags($str)
    {
        $descriptionItems = [];
        $matches = [];
        preg_match_all('|{[^}]+}(.*){\/[^}]+}|Us', $str, $matches);
        foreach ($matches[0] as $key => $match) {
            $closingBracketPos =  strpos($match, '}');
            if ($closingBracketPos !== false)
            {
                $tag = substr($match, 0, $closingBracketPos + 1);

                switch($tag)
                {
                    case TextSection::GetOpeningTag():
                        $descriptionItems[] = new TextSection($matches[1][$key]);
                        break;
                    case BulletSection::GetOpeningTag():
                        $descriptionItems[] = new BulletSection($matches[1][$key]);
                        break;
                }
            }
        }

        return $descriptionItems;
    }
}