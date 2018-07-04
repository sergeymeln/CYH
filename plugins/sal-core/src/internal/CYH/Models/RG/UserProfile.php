<?php


namespace CYH\Models\RG;


use CYH\Models\Core\Model;

class UserProfile extends Model
{
    public $Id;
    public $Email;
    public $FirstName;
    public $LastName;
    public $Address;
    public $ApartmentNo;
    public $Zip;
    public $OutOfPromotions;
    public $IsActive;
    public $PhoneNumber;
}