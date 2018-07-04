<?php


namespace CYH\Models\RG;


class Registration
{
    public $Email;
    public $Zip;
    public $Address;
    public $ApartmentNo;
    public $GroupId;
    public $PhoneNumber;
    public $FirstName;
    public $LastName;
    public $Password;
    public $ConfirmPassword;
    //Determines whether to create account implicitly or explicitly
    public $CreateAccountExplicitly = false;
}