<?php

namespace CYH\Marketing\Services;

use CYH\Marketing\ViewModels\SpeedCalculatorItem;

class SpeedCalculationService
{
    /** @var $speedCalculatorItem SpeedCalculatorItem*/
    protected $speedCalculatorItem;

    public function __construct()
    {
        $this->speedCalculatorItem = $this->setSpeedCalculatorItem(new SpeedCalculatorItem());
    }


    /**
     * @param $item SpeedCalculatorItem
     * @return SpeedCalculatorItem
     */
    public function setSpeedCalculatorItem($item)
    {
        $item->Activity = [
            'general'=>[
                'browsingEmail' => [1],
                'fileDownloading' => [10],
            ],
            'watchingVideo' => [
                'standard' => [3,4],
                'hd' => [5,6,7,8],
                'ultraHd' => 25,
            ],
            'videoConferencing' => [
                'skype' => [1.5],
                'hdVideoTeleconferencing' => [6]
            ],
            'gaming' => [
                'gameConsole' => [3],
                'onlineMultiplayer' => [4]
            ]

        ];
        $item->DevicesUsage = [
            'basic' => [
                'devices' => 1,
                'includes' => 'watchingVideo[hd], gaming[onlineMultiplayer]',
                'speed' => [3,4,5,6,7,8]
            ],
            'medium' => [
                'devices' => '2-3',
                'includes' => 'watchingVideo[hd], gaming[onlineMultiplayer]',
                'speed' => [12,13,14,15,16,17,18,19,20,21,22,23,24,25]
            ],
            'advanced' => [
                'devices' => 4,
                'includes' => 'watchingVideo[hd], gaming[onlineMultiplayer]',
                'speed' => [25]
            ],
        ];

        return $item;
    }

    /**
     * @return SpeedCalculatorItem
     */
    public function getSpeedCalculatorItem()
    {
        return $this->speedCalculatorItem;
    }
}
