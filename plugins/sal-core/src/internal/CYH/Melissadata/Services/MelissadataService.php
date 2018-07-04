<?php


namespace CYH\Melissadata\Services;


use CYH\Melissadata\Services\Base\BaseService;
use CYH\Models\Address;

class MelissadataService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetPersonatorData(Address $address)
    {
        return $this->_mdRepository->GetPersonatorData($address);
    }
}