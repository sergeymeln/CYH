<?php


namespace CYH\Models\Ocenture;


use CYH\Models\Core\ValidatableModel;
use CYH\Ocenture\Enums\CreditCardType;
use CYH\Ocenture\Enums\Gender;
use Respect\Validation\Validator as v;

class CreateAccountModel extends ValidatableModel
{
    public $ProductCode;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Phone;
    public $Address1;
    public $Address2;
    public $City;
    public $State;
    public $Zip;
    public $Gender;
    /* @var $Birthday \DateTime */
    public $Birthday;
    public $CcType;
    public $CcNumber;
    public $CcExpMonth;
    public $CcExpYear;


    public function Validate()
    {
        if (is_null($this->_modelValidator))
        {
            $this->_modelValidator = v::attribute('ProductCode', v::notEmpty())
                ->attribute('FirstName', v::notEmpty())
                ->attribute('LastName', v::notEmpty())
                ->attribute('Email', v::email())
                ->attribute('Phone', v::phone())
                ->attribute('Address1', v::notEmpty())
                ->attribute('City', v::notEmpty())
                ->attribute('State', v::notEmpty())
                ->attribute('Zip', v::length(5))
                ->attribute('Gender', v::in([Gender::MALE, Gender::FEMALE]))
                ->attribute('CcType', v::in([CreditCardType::VISA, CreditCardType::AMEX, CreditCardType::MASTERCARD, CreditCardType::DISCOVER]))
                ->attribute('CcNumber', v::notEmpty())
                ->attribute('CcExpMonth', v::notEmpty())
                ->attribute('CcExpYear', v::notEmpty())
                ->attribute('Birthday', v::date());
        }

        try {
            $this->_isValid = $this->_modelValidator->validate($this);
        }
        catch(NestedValidationException $exception) {
            $this->_validationErrors = $exception->getMessages();
        }
    }

    public function GetMainError()
    {

    }

    public function GetAllErrors()
    {
        return $this->_validationErrors;
    }
}