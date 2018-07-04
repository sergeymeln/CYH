<?php


namespace CYH\Controllers\GroupPortal;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\CookieStorageHelper;
use CYH\Helpers\LinkHelper;
use CYH\Models\Core\Result;
use CYH\Models\Core\ResultCodes;
use CYH\Models\GroupPortal\Destinations;
use CYH\Models\Html\MetaTags;
use CYH\Models\RG\Login;
use CYH\Models\RG\Registration;
use CYH\RG\Settings;

class AuthenticationController extends GenericGroupPortalController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);

        $this->AddViewData('urlPrefix', $this->urlPrefix);
    }

    public function RenderGuestLogin()
    {
        $this->EnforceGroupInit();
        $this->InitializeMetaTags(new MetaTags(sprintf('%s | Connect Your Benefits', $this->groupInfo->Name)));

        if (isset($this->context->Request['salAction'])) {
            switch ($this->context->Request['salAction']) {
                case 'guest-login':
                    //try registering
                    $regInfo = new Registration();
                    $regInfo->Email = $this->context->Request['Email'];
                    $regInfo->GroupId = (int)$this->context->Request['groupId'];
                    $regInfo->Zip = $this->context->Request['Zip'];
                    $regInfo->CreateAccountExplicitly = false;
                    $res = $this->custService->RegisterRGAccount($regInfo, $this->groupInfo->Id);

                    //try logging in, it doesn't matter if registration was successful
                    //if it is not, we still might be able to log customer in as a returning one
                    $loginInfo = Login::CreateFromObject($regInfo);
                    $res = $this->custService->LoginRGAccount($loginInfo, $this->groupInfo->Id);

                    if ($res->Status == ResultCodes::SUCCESS) {
                        $ticket = $this->authService->CreateAuthTicket($res->Data, $this->groupInfo->Id);
                        CookieStorageHelper::CreateCookie(RG_AUTH_NAME, $ticket, time() + Settings::GetCybSettings()['Auth.CookieLifespan']);

                        $params = [
                            'groupId' => $this->groupInfo->Id
                        ];
                        //redirecting to address search by default
                        $this->Redirect(LinkHelper::AppendQueryParams($this->ResolveRgRedirectDestination(Destinations::SEARCH_PAGE), $params));
                    } else {
                        //direct customer to reset his password
                        $res = new Result();
                        $res->Status = ResultCodes::WARNING;
                        $res->Data['Message'] = 'It seems like you have already viewed the offers. Please <a href="' . \CYH\Navigation\RebateGiftUrl::GetResetPasswordLink($this->groupInfo) . '" target="_blank">follow this link</a> to reset your password or try another email';
                    }
                    break;
                default:
                    wp_redirect($this->urlPrefix . "?groupId=" . $this->context->Request['groupId'], 302);
                    exit;
                    break;
            }
        }

        $this->View('authentication/guest-login', [
            'res' => $res,
            'loginInfo' => $loginInfo
        ], $this->domain);
    }

    public function RenderLogin()
    {
        $this->EnforceGroupInit();
        $this->InitializeMetaTags(new MetaTags(sprintf('%s | Connect Your Benefits', $this->groupInfo->Name)));

        if (isset($this->context->Request['salAction'])) {
            switch ($this->context->Request['salAction']) {
                case 'login':
                    $loginInfo = Login::CreateFromArray($this->context->Request);
                    $res = $this->custService->LoginRGAccount($loginInfo, $this->groupInfo->Id);
                    break;
                default:
                    $this->Redirect($this->urlPrefix . "?groupId=" . $this->groupInfo->Id, 302);
                    break;
            }

            if ($res->Status == ResultCodes::SUCCESS) {
                $ticket = $this->authService->CreateAuthTicket($res->Data, $this->groupInfo->Id);
                CookieStorageHelper::CreateCookie(RG_AUTH_NAME, $ticket, time() + Settings::GetCybSettings()['Auth.CookieLifespan']);

                $params = [
                    'groupId' => $this->groupInfo->Id
                ];
                //redirecting to address search by default
                $this->Redirect(LinkHelper::AppendQueryParams($this->ResolveRgRedirectDestination(Destinations::SEARCH_PAGE), $params), 302);
            }
        }

        $this->View('authentication/login', [
            'res' => $res
        ], $this->domain);
    }

    public function RenderRegistration()
    {
        $this->EnforceGroupInit();
        $this->InitializeMetaTags(new MetaTags(sprintf('Register | %s | CYB', $this->groupInfo->Name)));

        if (isset($this->context->Request['salAction'])) {
            switch ($this->context->Request['salAction']) {
                case 'register':
                    $regInfo = new Registration();
                    $regInfo->Email = $this->context->Request['email'];
                    $regInfo->Password = $this->context->Request['Password'];
                    $regInfo->ConfirmPassword = $this->context->Request['PasswordConfirm'];
                    $regInfo->GroupId = (int)$this->context->Request['groupId'];
                    $regInfo->Zip = $this->context->Request['zip'];
                    $regInfo->Address = $this->context->Request['search'];
                    $regInfo->PhoneNumber = $this->context->Request['phone'];
                    $regInfo->FirstName = $this->context->Request['fname'];
                    $regInfo->LastName = $this->context->Request['lname'];
                    $regInfo->ApartmentNo = isset($this->context->Request['suite']) ? $this->context->Request['suite'] : '';
                    $regInfo->CreateAccountExplicitly = true;
                    $res = $this->custService->RegisterRGAccount($regInfo, $this->groupInfo->Id);
                    if ($res->Status == ResultCodes::SUCCESS) {
                        $loginInfo = Login::CreateFromObject($regInfo);
                        $res = $this->custService->LoginRGAccount($loginInfo, $this->groupInfo->Id);
                    }
                    break;
                default:
                    $this->Redirect($this->urlPrefix . "register?groupId=" . $this->groupInfo->Id);
                    break;
            }

            if ($res->Status == ResultCodes::SUCCESS) {
                $ticket = $this->authService->CreateAuthTicket($res->Data, $this->groupInfo->Id);
                CookieStorageHelper::CreateCookie(RG_AUTH_NAME, $ticket, time() + Settings::GetCybSettings()['Auth.CookieLifespan']);

                $params = [
                    'groupId' => $this->groupInfo->Id
                ];
                //redirecting to address search by default
                $this->Redirect(LinkHelper::AppendQueryParams($this->ResolveRgRedirectDestination(Destinations::SEARCH_PAGE), $params), 302);
            }
        }

        $this->View('authentication/registration', [
            'regInfo' => $regInfo,
            'res' => $res
        ], $this->domain);
    }
}
