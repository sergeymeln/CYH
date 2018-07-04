<?php


namespace CYH\Sal\Services;


use CYH\Models\Core\ResultCodes;
use CYH\Models\Groups\GroupInfo;
use CYH\Models\Cache\CacheSettings;
use CYH\Sal\Services\Base\BaseService;

class GroupsService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * @param CacheSettings $cacheSettings
     * @return GroupInfo|null
     */
    public function GetGroupInfo($id, CacheSettings $cacheSettings)
    {
        $res = $this->_salConnector->GetGroupInfo($id, $cacheSettings);
        if ($res->Status != ResultCodes::SUCCESS || is_null($res->Data))
        {
                return null;
        }

        $group = GroupInfo::CreateFromArray($res->Data);
        $group->SpPhone = $res->Data['Phone']['Number'];
        //these fields have mistypes in names so they should be mapped manually
        $group->CustomerPortalUrl = $res->Data['CustomerProtalUrl'];
        $group->CustomerProtalLoginUrl = $res->Data['CustomerProtalLoginUrl'];
        return $group;
    }
}