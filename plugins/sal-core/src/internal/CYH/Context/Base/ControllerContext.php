<?php


namespace CYH\Context\Base;


use CYH\Models\Authentication\Principal;

class ControllerContext
{
    public $Request;
    public $Get;
    public $Post;
    public $Server;
    public $Environment;
    public $Cookies;
    public $Files;

    public $PluginName;
    public $SiteType = null;
    /* @var Principal */
    public $Principal = null;

    public function IsAuthenticated()
    {
        if (is_null($this->Principal))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}