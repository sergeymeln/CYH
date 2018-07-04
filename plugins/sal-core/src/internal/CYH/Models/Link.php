<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class Link extends Model
{
    public $Id;
    public $LinkUrl = '';
    public $LinkText = '';
    public $LinkDestination = LinkDestination::INTERNAL;
    public $LinkTarget = UrlTarget::SAME_TAB;
}