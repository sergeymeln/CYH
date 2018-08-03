<?php


namespace CYH\Marketing\Services;

use CYH\Marketing\Repositories\StatisticsRepository;
use CYH\Sal\Services\Base\CacheableService;

class StatisticsService
{
    private static $instance = null;
    protected static $statisticsRepository = null;
    protected $city = null;
    const EVENT_TYPES = [
        'page_generation_start' => 1,
        'request_to_sal_start' => 2,
        'request_to_sal_stop' => 3,
        'data_preparation_complete' => 4,
        'view_rendering_complete' => 5
    ];
    protected $eventObjects = [];


    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$statisticsRepository = new StatisticsRepository();
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
     * @return \stdClass
     */
    private function createObject($type, $time)
    {
        $eventObject = new \stdClass();
        $eventObject->event_type = $type;
        $eventObject->actual_timestamp = $time;

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
        $city = $this->getCity();
        foreach ($this->eventObjects as $stat) {
            self::$statisticsRepository->insertStatistics($stat, $requestId, $city);
        }
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
}
