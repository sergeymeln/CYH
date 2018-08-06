<?php

namespace CYH\Marketing\Repositories;

use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\ResultSet\ResultSet;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class StatisticsRepository
{
    protected $adapter;
    private $config = array(
        'driver' => 'Pdo_Mysql',
        'database' => DB_NAME,
        'username' => DB_USER,
        'password' => DB_PASSWORD,
        'charset' => 'utf8'
    );

    public function __construct()
    {
        $this->adapter = new Adapter($this->config);
    }

    /**
     * @param $stat
     * @param $requestId
     * @param $city
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function insertStatistics($stat, $requestId, $city)
    {
        $sql = new Sql($this->adapter);
        $insert = $sql->insert(CYH_TABLE_PREFIX.'cyh_load_statistics')->columns(['request_id','event_type', 'actual_timestamp', 'city'])->
                values([$requestId, $stat->event_type, $stat->actual_timestamp, $city]);
        $statement = $sql->prepareStatementForSqlObject($insert);
        $result = $statement->execute();

        return $result;
    }

}
