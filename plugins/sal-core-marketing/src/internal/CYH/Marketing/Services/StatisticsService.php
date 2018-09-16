<?php

namespace CYH\Marketing\Services;

use CYH\Marketing\Repositories\StatisticsRepository;
use CYH\Marketing\ViewModels\UI\CityItem;
use CYH\Marketing\Events\StatisticsServiceEvent;
use CYH\Marketing\Helpers\UrlHelper;

class StatisticsService
{
    private static $instance = null;
    /** @var $statisticsRepository StatisticsRepository*/
    protected static $statisticsRepository;
    /** @var $city CityItem*/
    protected $city = null;
    /**@var $urlHelper UrlHelper*/
    protected static $urlHelper = null;

    protected $eventObjects = [];


    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$statisticsRepository = new StatisticsRepository();
            self::$urlHelper = new UrlHelper();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __construct() {}

    /**
     * @param $type
     * @param $time
     */
    public function addObject($type, $time)
    {
        $eventObject = $this->createObject($type, $time);
        array_push($this->eventObjects, $eventObject);
    }

    /**
     * @param $type
     * @param $time
     * @return StatisticsServiceEvent
     */
    private function createObject($type, $time)
    {
        $eventObject = new StatisticsServiceEvent();
        $eventObject->eventType = $type;
        $eventObject->actualTimestamp = $time;

        return $eventObject;
    }

    /**
     * @return mixed
     */
    private function generateRequestId()
    {
        return microtime(true);
    }

    public function insertStatistics()
    {
        $requestId = $this->generateRequestId();
        $city = UrlHelper::getCityUrl($this->getCity());
        foreach ($this->eventObjects as $stat) {
            self::$statisticsRepository->insertStatistics($stat, $requestId, $city);
        }
    }

    /**
     * @param $city CityItem
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return CityItem
     */
    public function getCity()
    {
        return $this->city;
    }
}
