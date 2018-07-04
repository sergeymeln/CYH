<?php


namespace CYH\Models\Authentication;


use CYH\Models\Core\Model;

class Principal extends Model
{
    public $UserName;
    public $AccessToken;
    public $CrossPortalToken; //used for autologin links generation
    public $GroupId;
}