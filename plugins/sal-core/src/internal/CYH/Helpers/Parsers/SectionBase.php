<?php


namespace CYH\Helpers\Parsers;


abstract class SectionBase implements \JsonSerializable
{
    protected $elementContent = null;
    protected $elementParsedContent = null;
    protected $type = null;

    public abstract static function GetOpeningTag();
    public abstract static function GetClosingTag();
    protected abstract function FormatContent();

    public function __construct($elementContent)
    {
        $this->elementContent = $elementContent;
        $this->elementParsedContent = $this->FormatContent();
    }

    public function GetTemplateKey()
    {
        $res = str_replace(['{', '}'], '', get_called_class()::GetOpeningTag());
        $res = strtolower($res);
        return $res;
    }

    public function GetRawContent()
    {
        return $this->elementContent;
    }

    public function GetParsedContent()
    {
        if (is_null($this->elementParsedContent))
        {
            $this->elementParsedContent = $this->FormatContent();
        }

        return $this->elementParsedContent;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}