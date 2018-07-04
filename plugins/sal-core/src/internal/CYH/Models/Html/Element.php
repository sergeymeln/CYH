<?php
/**
 * Created by PhpStorm.
 * User: npyat
 * Date: 12/6/2017
 * Time: 6:58 PM
 */

namespace CYH\Models\Html;


class Element
{
    public $Id;
    public $Name;
    public $CssClass;
    public $Value;
    public $Label;
    public $Arrtibutes = [];

    public function __construct($id = '', $name = '', $value = '', $class = '')
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Value = $value;
        $this->CssClass = $class;
    }

    public function SetId($id)
    {
        $this->Id = $id;
        return $this;
    }

    public function SetName($name)
    {
        $this->Name = $name;
        return $this;
    }

    public function SetValue($value)
    {
        $this->Value = $value;
        return $this;
    }

    public function SetCssClass($class)
    {
        $this->CssClass = $class;
        return $this;
    }

    public function SetLabel($label)
    {
        $this->Label = $label;
        return $this;
    }

    public function AddAttribute($name, $value = null)
    {
        $this->Arrtibutes[$name] = $value;
        return $this;
    }
}