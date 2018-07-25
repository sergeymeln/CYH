<?php

namespace CYH\Marketing\Repositories;


use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\ResultSet\ResultSet;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class MarketingRepository
{
    protected $adapter;
    private $config = array(
        'driver' => 'Pdo_Mysql',
        'database' => DB_NAME,
        'username' => DB_USER,
        'password' => DB_PASSWORD
    );

    const CITIES_IN = ['City', 'Town', 'Township', 'Village', 'Borough', 'Metropolitan Government'];

    public function __construct()
    {
        $this->adapter = new Adapter($this->config);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function GetCitiesData($data)
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from(CYH_TABLE_PREFIX.'cyh_city');
        $select->join(array("s" => CYH_TABLE_PREFIX."cyh_state"), "s.id=".CYH_TABLE_PREFIX."cyh_city.state_id");
        $select->join(array("cc" => CYH_TABLE_PREFIX."cyh_city_content"), CYH_TABLE_PREFIX."cyh_city.id=cc.city_id");
        $select->join(array("tl" => CYH_TABLE_PREFIX."cyh_tag_lines"), "cc.tag_lines_id=tl.id");
        $select->where(array('state_short_name' => $data['state_short_name'], 'city_name' => $data['city_name']));
        $select->where->in('city_type', self::CITIES_IN);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        return $results->current();
    }

    /**
     * @param $cityContentId
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function GetCityBullets($cityContentId)
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from(CYH_TABLE_PREFIX.'cyh_universal_statistic_bullets');
        $select->join(array("cusb" => CYH_TABLE_PREFIX."cyh_city_to_universal_statistic_bullets"), CYH_TABLE_PREFIX."cyh_universal_statistic_bullets.id=cusb.usb_id");
        $select->where(array('city_content_id' => $cityContentId));
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        return $results;
    }

    /**
     * @param $cityData
     * @param $excludeCityIds
     * @param int $radius
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function GetRelatedCities($cityData, $excludeCityIds, $radius=1500)
    {
        $bigCitiesCondition = '';
        if(count($excludeCityIds) > 0) {
            $bigCitiesCondition = ' AND c.id NOT IN('.implode(',', $excludeCityIds).') ';
        }
        $sql = 'SELECT
                c.*, (                
                  3959 * acos (
                  cos ( radians('.$cityData['latitude'].') )
                  * cos( radians( latitude ) )
                  * cos( radians( longitude ) - radians('.$cityData['longitude'].') )
                  + sin ( radians('.$cityData['latitude'].') )
                  * sin( radians( latitude ) )
                )
            ) AS distance
            FROM wp_cyh_city c
            INNER JOIN '.CYH_TABLE_PREFIX.'cyh_city_content cc ON c.id=cc.city_id
            WHERE c.city_name <> "'.$cityData['city_name'].'" AND cc.is_published=1 
            '.$bigCitiesCondition.'
            AND c.city_type IN('.implode(',', $this->getConvertedArray()).')
            HAVING distance < '.$radius.'
            ORDER BY distance
            LIMIT 0 , 10;';

        $statement = $this->adapter->createStatement($sql);
        $result = $statement->execute();

        return $result;
    }

    /**
     * @param $cityData
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function GetBiggestCitiesInState($cityData)
    {
        $sql = 'SELECT
                c.* 
            FROM wp_cyh_city c
            INNER JOIN '.CYH_TABLE_PREFIX.'cyh_city_content cc ON c.id=cc.city_id
            WHERE c.city_name <> "'.$cityData['city_name'].'" AND c.state_code="'.$cityData['state_code'].'" AND cc.is_published=1 AND c.city_type IN('.implode(',', $this->getConvertedArray()).')
            ORDER BY population DESC
            LIMIT 0 , 10;';

        $statement = $this->adapter->createStatement($sql);
        $result = $statement->execute();

        return $result;
    }

    /**
     * @param $data
     * @return array|bool
     */
    public function getCityFromUrl($data)
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from(CYH_TABLE_PREFIX.'cyh_city');
        $select->join(array("s" => CYH_TABLE_PREFIX."cyh_state"), "s.id=".CYH_TABLE_PREFIX."cyh_city.state_id");
        $select->join(array("cc" => CYH_TABLE_PREFIX."cyh_city_content"), CYH_TABLE_PREFIX."cyh_city.id=cc.city_id");
        $select->where(array('state_short_name' => strtoupper($data[2]), 'city_name' => $data[3], 'is_published' => 1));
        $select->where->in('city_type', self::CITIES_IN);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        if($results->getAffectedRows() == 0) {
            return false;
        }

        $cityData = $results->current();
        $return = [];
        $return['city_normal_name'] = $cityData['city_normal_name'];
        $return['state_name'] = $cityData['state_name'];
        $return['city_name'] = $cityData['city_name'];
        $return['state_short_name'] = $cityData['state_short_name'];


        return $return;
    }

    /**
     * @param $zipCode
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function getCityByZip($zipCode)
    {
        $sql = 'SELECT *
            FROM '.CYH_TABLE_PREFIX.'cyh_city c
            INNER JOIN '.CYH_TABLE_PREFIX.'cyh_city_content cc ON c.id=cc.city_id
            WHERE c.zip_code LIKE "%'.$zipCode.'%" AND c.city_type IN('.implode(',', $this->getConvertedArray()).')';

        $statement = $this->adapter->createStatement($sql);
        $result = $statement->execute();

        return $result;
    }

    private function getConvertedArray()
    {
        $result = [];
        foreach (self::CITIES_IN as $city) {
            array_push($result, '"'.$city.'"');
        }

        return $result;
    }


    /**
     * @param $cityData
     * @param int $radius
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function getNearestPublishedCity($cityData, $radius=1500)
    {
        $sql = 'SELECT
                c.*, (
                  3959 * acos (
                  cos ( radians('.$cityData['latitude'].') )
                  * cos( radians( latitude ) )
                  * cos( radians( longitude ) - radians('.$cityData['longitude'].') )
                  + sin ( radians('.$cityData['latitude'].') )
                  * sin( radians( latitude ) )
                )
            ) AS distance
            FROM wp_cyh_city c
            INNER JOIN '.CYH_TABLE_PREFIX.'cyh_city_content cc ON c.id=cc.city_id
            WHERE c.city_name <> "'.$cityData['city_name'].'" AND cc.is_published=1 AND c.city_type IN('.implode(',', $this->getConvertedArray()).')
            HAVING distance < '.$radius.'
            ORDER BY distance
            LIMIT 0 , 1;';

        $statement = $this->adapter->createStatement($sql);
        $result = $statement->execute();

        return $result;
    }
}
