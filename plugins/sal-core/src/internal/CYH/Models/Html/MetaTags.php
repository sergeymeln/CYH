<?php
namespace CYH\Models\Html;

class MetaTags
{
    public $PageTitle;
    public $Description;
    /* @var $OgTags OpenGraphTags */
    public $OgTags;
    public $LinkCanonical;

    public $PlainOverrides = false;

    public function __construct($title = null, $description = null)
    {
        $this->PageTitle = $title;
        $this->Description = $description;
        $this->OgTags = new OpenGraphTags();
        $this->OgTags->Title = $title;
        $this->OgTags->Description = $description;
    }
}