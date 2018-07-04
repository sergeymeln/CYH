<?php


namespace CYH\Models\Core;


abstract class ValidatableModel extends Model
{
    protected $_modelValidator;
    protected $_validationErrors = [];
    protected $_isValid;

    public function IsValid(){
        if (is_null($this->_isValid))
        {
            $this->Validate();
        }
        return $this->_isValid;
    }
    public abstract function Validate();
    public abstract function GetMainError();
    public abstract function GetAllErrors();

}