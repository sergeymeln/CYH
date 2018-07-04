<?php
namespace CYH\Controllers\ConnectYourCredit;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\Data\CcInfoProvider;
use CYH\Helpers\Data\CountryInfoProvider;
use CYH\Helpers\Data\DateDataProvider;
use CYH\Models\Html\Element;
use CYH\Models\Ocenture\Factory\CreateAccountModelFactory;
use CYH\Ocenture\Enums\CreditCardType;
use CYH\Ocenture\Enums\Gender;
use CYH\Ocenture\Services\OcentureService;

class EnrollController extends GenericController
{
    protected $_ocentureService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);

        $this->_ocentureService = new OcentureService();
    }

    public function EnrollForm()
    {
        if (isset($this->context->Request['FormSubmit'])) {
            $model = CreateAccountModelFactory::CreateFromArray($this->context->Request);

            $res = $this->_ocentureService->CreateAccount($model);
        } else {
            $model = CreateAccountModelFactory::CreateFromArray([]);
        }

        $params = array_merge(
            $this->PrepareDobOptions(),
            $this->PrepareCcExpOptions(),
            $this->PrepareGenderOptions(),
            $this->PrepareCcList(),
            [
                'planText' => get_field("plan_text", get_the_ID()),
                'plans' => $this->PreparePlans(),
                'states' => $this->PrepareStatesOptions(),
                'model' => $model,
                'billingTerms' => get_field("billing_info_terms", get_the_ID()),
                'billingImage' => get_field("billing_info_image", get_the_ID())
            ]
        );
        $this->View('enroll/form', $params);
    }

    protected function PreparePlans()
    {
        $planTypes = get_field("plan_type", get_the_ID());
        $plans = [];
        foreach ($planTypes as $key => $plan) {
            $plans[] = (new Element())->SetId('ProductCode' . $key)
                ->SetName('ProductCode')
                ->SetValue($plan['plan_item_id'])
                ->SetLabel($plan['plan_item_text'])
                ->AddAttribute('type', 'radio');
        }
        return $plans;
    }

    protected function PrepareStatesOptions()
    {
        $states = CountryInfoProvider::GetUSStates();
        $statesOptions = [
            (new Element())->SetValue('')->SetLabel('State')
        ];
        foreach ($states as $stateShort => $stateLabel) {
            $statesOptions[] = (new Element())->SetValue($stateShort)
                ->SetLabel($stateLabel);
        }
        return $statesOptions;
    }

    protected function PrepareDobOptions()
    {
        $days[] = (new Element())->SetValue('')
            ->SetLabel('Day');
        foreach (DateDataProvider::GetDays() as $day) {
            $days[] = (new Element())->SetValue($day)->SetLabel($day);
        }

        $months[] = (new Element())->SetValue('')
            ->SetLabel('Month');
        foreach (DateDataProvider::GetMonths() as $month) {
            $months[] = (new Element())->SetValue($month)->SetLabel($month);
        }

        $years[] = (new Element())->SetValue('')
            ->SetLabel('Year');
        $currentYear = (new \DateTime())->format('Y');
        foreach (DateDataProvider::GetYearsRange($currentYear - 100, $currentYear) as $year) {
            $years[] = (new Element())->SetValue($year)->SetLabel($year);
        }

        return [
            'dobDays' => $days,
            'dobMonths' => $months,
            'dobYears' => $years,
        ];
    }

    protected function PrepareCcExpOptions()
    {
        $months[] = (new Element())->SetValue('')
            ->SetLabel('Expiry Month');
        foreach (CcInfoProvider::GetExpirationMonths() as $month) {
            $months[] = (new Element())->SetValue($month)->SetLabel($month);
        }

        $years[] = (new Element())->SetValue('')
            ->SetLabel('Expiry Year');
        foreach (CcInfoProvider::GetExpirationYears() as $year) {
            $years[] = (new Element())->SetValue($year)->SetLabel($year);
        }

        return [
            'expMonths' => $months,
            'expYears' => $years,
        ];
    }

    protected function PrepareGenderOptions()
    {
        return [
            'genders' => [
                (new Element())->SetLabel('Please select...'),
                (new Element())->SetValue(Gender::MALE)->SetLabel('Male'),
                (new Element())->SetValue(Gender::FEMALE)->SetLabel('Female'),
            ]
        ];
    }

    protected function PrepareCcList()
    {
        return [
            'creditCards' => [
                (new Element())->SetValue('')->SetLabel('Please Select...'),
                (new Element())->SetValue(CreditCardType::VISA)->SetLabel('Visa'),
                (new Element())->SetValue(CreditCardType::MASTERCARD)->SetLabel('Mastercard'),
                (new Element())->SetValue(CreditCardType::AMEX)->SetLabel('American Express'),
                (new Element())->SetValue(CreditCardType::DISCOVER)->SetLabel('Discover'),
            ]
        ];
    }
}