<?php


namespace CYH\Helpers\Parsers;


class TextSection extends SectionBase
{
    public static function GetOpeningTag()
    {
        return '{text}';
    }

    public static function GetClosingTag()
    {
        return '{/text}';
    }

    public function FormatContent()
    {
        return $this->elementContent;
    }
}