<?php


namespace CYH\Controllers\Common;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Html\Element;

class FormRenderController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderSelect(Element $select, array $list, $selectedKey = null, $domain = 'common')
    {
        $this->View('form-elements/select', [
            'model' => $select,
            'list' => $list,
            'selectedKey' => $selectedKey
        ], $domain);
    }

    public function RenderOption(Element $option, $selectedKey = null, $domain = 'common')
    {
        $this->View('form-elements/option', [
            'option' => $option,
            'selectedKey' => $selectedKey
        ], $domain);
    }

    public function RenderRadioGroup(Element $radio, array $list, $selectedKey = null, $domain = 'common')
    {
        $this->View('form-elements/radio-group', [
            'model' => $radio,
            'list' => $list,
            'selectedKey' => $selectedKey
        ], $domain);
    }

    public function RenderCheckbox(Element $input, $checked = false, $domain = 'common')
    {
        $this->View('form-elements/checkbox', [
            'input' => $input,
            'checked' => $checked
        ], $domain);
    }

    public function RenderInput(Element $input, $selectedKey = null, $domain = 'common')
    {
        if (!is_null($selectedKey) && isset($input->Arrtibutes['type']) && $input->Arrtibutes['type'] != 'radio')
        {
            $input->Value = $selectedKey;
        }
        $this->View('form-elements/input', [
            'input' => $input,
            'selectedKey' => $selectedKey
        ], $domain);
    }

    public function RenderAttributes(array $list, $domain = 'common')
    {
        $this->View('form-elements/attr', [
            'list' => $list
        ], $domain);
    }
}