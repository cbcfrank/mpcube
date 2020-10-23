<?php

namespace Mpcube\Wechat\Miniapp\NearbyPoi;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class NearbyPoi
{
    use Common, Singleton;

    //todo
    public function getList($page, $pageRows)
    {
        $url = $this->WechatApiBaseURL."/wxa/getnearbypoilist?page={$page}&page_rows={$pageRows}&access_token={$this->access_token}";
//        var_dump($url);
        $ret = $this->curlGet($url);
        return $this->httpRespToArray($ret, ParamsRemark::NEARBYPOI_GETLIST_REQ, ParamsRemark::NEARBYPOI_GETLIST_RES);
    }
}