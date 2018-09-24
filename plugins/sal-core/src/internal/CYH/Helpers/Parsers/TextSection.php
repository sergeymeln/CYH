<?php


namespace CYH\Helpers\Parsers;


class TextSection extends SectionBase
{
    public function __construct($elementContent)
    {
        parent::__construct($elementContent);
        $this->type = SectionType::TEXT;
    }

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