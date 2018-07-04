<?php


namespace CYH\ViewModels;


use CYH\Models\Core\ResultCodes;

class Alert
{
    public $Status = ResultCodes::SUCCESS;
    public $Message = '';
    public $IsDismissable = true;
    public $IsCentered = true;

    public function __construct(int $status, string $message, bool $isDismissable = true, bool $isCentered = true)
    {
        $this->Status = $status;
        $this->Message = $message;
        $this->IsDismissable = $isDismissable;
        $this->IsCentered = $isCentered;
    }
}