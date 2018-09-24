<?php


namespace CYH\Helpers\Parsers;


class BulletSection extends SectionBase
{
    public function __construct($elementContent)
    {
        parent::__construct($elementContent);
        $this->type = SectionType::BULLET;
    }

    public static function GetOpeningTag()
    {
        return '{bullets}';
    }

    public static function GetClosingTag()
    {
        return '{/bullets}';
    }

    public function FormatContent()
    {
        if (strpos($this->elementContent, '~~'))
        {
            $listItems = explode('~~', $this->elementContent);
            //removing first empty element as all lists start with ~~
            array_shift($listItems);
            return $listItems;
        }
        else
        {
            return [$this->elementContent];
        }
    }
}