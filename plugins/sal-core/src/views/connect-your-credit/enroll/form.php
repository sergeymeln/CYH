<?php
/* @var $plans array */
/* @var $states array */
/* @var $model \CYH\Models\Ocenture\CreateAccountModel */
?>
<form id="enroll" method="post" class="enrol-form" novalidate="novalidate">
    <div class="row">
        <div class="col-md-6">
            <h4>Your Plan Type</h4>
            <?php if (!empty($planText)) {
                echo '<strong>' . $planText . '</strong>';
            } ?>
            <div>
                <?php
                do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderRadioGroup',
                    new \CYH\Models\Html\Element(), $plans, $model->ProductCode)
                ?>
            </div>

            <hr/>


            <h4>Customer Information:</h4>
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('FirstName')
                            ->SetName('FirstName')
                            ->SetCssClass('form-control')
                            ->AddAttribute('placeholder', 'First Name')
                            ->AddAttribute('required')
                            ->AddAttribute('type', 'text'),
                            $model->FirstName); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('LastName')
                                ->SetName('LastName')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Last Name')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->LastName); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('Email')
                                ->SetName('Email')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Email')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'email'),
                            $model->Email); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('Phone')
                                ->SetName('Phone')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Phone Number')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text')
                                ->AddAttribute('pattern', '^[\d]{10,}$')
                                ->AddAttribute('data-pattern-error', 'Please use digits only'),
                            $model->Phone); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('Address1')
                                ->SetName('Address1')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Address Line 1')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->Address1); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('Address2')
                                ->SetName('Address2')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Address Line 2')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->Address2); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('City')
                                ->SetName('City')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'City')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->City); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('State')->SetId('State')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $states, $model->State); ?>
                    </div>
                    <div class="col-md-6">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('Zip')
                                ->SetName('Zip')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Zipcode')
                                ->AddAttribute('data-minlength', '5')
                                ->AddAttribute('maxlength', '5')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->Zip); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('Gender')->SetId('Gender')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $genders, $model->Gender); ?>
                    </div>
                </div>
                <h4>Date of Birth:</h4>
                <div class="form-group">
                    <div class="col-md-4">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('dobMonth')->SetId('dobMonth')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $dobMonths, !empty($model->Birthday) ? \CYH\Helpers\DateHelper::GetMonthZeroPadded($model->Birthday) : null); ?>
                    </div>
                    <div class="col-md-4">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('dobDay')->SetId('dobDay')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $dobDays, !empty($model->Birthday) ? \CYH\Helpers\DateHelper::GetDayZeroPadded($model->Birthday) : null); ?>
                    </div>
                    <div class="col-md-4">
                        <span class="red formReq">*</span>
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('dobYear')->SetId('dobYear')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $dobYears, !empty($model->Birthday) ? \CYH\Helpers\DateHelper::GetYearFull($model->Birthday) : null); ?>
                    </div>

                </div>
                <p><span class="red">*</span> required field</p>
            </div>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-md-6">
            <h4>Billing Information:</h4>
            <?php if (!empty($billingImage)) {
                echo '<img src="' . $billingImage . '" class="ccards" alt="">';
            } ?>
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-12">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('CcType')->SetId('CcType')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $creditCards, $model->CcType); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderInput',
                            (new \CYH\Models\Html\Element())->SetId('CcNumber')
                                ->SetName('CcNumber')
                                ->SetCssClass('form-control')
                                ->AddAttribute('placeholder', 'Credit Card Number')
                                ->AddAttribute('required')
                                ->AddAttribute('type', 'text'),
                            $model->CcNumber); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('CcExpMonth')->SetId('CcExpMonth')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $expMonths, $model->CcExpMonth); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderSelect',
                            (new \CYH\Models\Html\Element())->SetName('CcExpYear')->SetId('CcExpYear')
                                ->SetCssClass('form-control')->AddAttribute('required'),
                            $expYears, $model->CcExpYear); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <?php do_action('\\' . CYH\Controllers\Common\FormRenderController::class . '::RenderCheckbox',
                            (new \CYH\Models\Html\Element())->SetId('tandc')
                                ->SetName('tandc')
                                ->AddAttribute('required')
                                ->SetLabel($billingTerms),
                            false); ?>
                        <hr/>
                        <input type="hidden" name="FormSubmit" value="1">
                        <button class="btn btn-orange btn-lg">
                            Enroll Now
                        </button>
                    </div>
                </div>
                <p class="privacy-strap">We Value Your <a href="/privacy-policy">Privacy</a></p>
            </div>
</form>
<?php do_action('\\' . CYH\Controllers\Common\ScriptRenderController::class . '::RenderValidationScript', '#enroll', false) ?>