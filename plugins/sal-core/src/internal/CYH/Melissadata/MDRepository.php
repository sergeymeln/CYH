<?php


namespace CYH\Melissadata;


use CYH\Models\Address;
use CYH\Models\Melissadata\PersonatorResponse;

class MDRepository
{
    private $_requestSettings;

    public function __construct(array $settings)
    {
        $this->_requestSettings = $settings;
    }

    public function GetPersonatorData(Address $address)
    {
        $params = [
            't' => 'Sample',
            'id' => $this->_requestSettings['MelissaId'],
            'act' => 'Check,Append',
            'cols' => 'FullName,CompanyName',
            'opt' => 'CentricHint:Auto;AdvancedAddressCorrection:No',
            'first' => '',
            'last' => '',
            'full' => '',
            'comp' => '',
            'a1' => $address->Street,
            'a2' => '',
            'city' =>  $address->City,
            'state' => $address->State,
            'postal' => $address->Zip,
            //'ctry' => '%20',
            'lastlines' => '',
            'ff' => '',
            'email' => '',
            'phone' => '',
            'reserved' => '',
            'format' => 'JSON'
        ];

        $url = $this->_requestSettings['Url.Personator'] . http_build_query($params) . '&ctry=USA';
        // get melissa data results
        $response = file_get_contents($url);
        $decodedResp = json_decode($response, true);

        $mappedResponse = new PersonatorResponse();
        $mappedResponse->CompanyName = $decodedResp["Records"][0]["CompanyName"];
        $mappedResponse->FullName = $decodedResp["Records"][0]["NameFull"];
        return $mappedResponse;
    }
}