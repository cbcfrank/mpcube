<?php

namespace Mpcube\Wxwork\Internal\ExternalContact;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class CustomerStrategy
{
    use Common, Singleton;

    //获取规则组列表
    public function list($cursor=null, $limit=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/customer_strategy/list?access_token={$this->access_token}";
        $arr = array_filter(compact('cursor', 'limit'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::CUSTOMER_STRATEGY_LIST_REQ, ParamsRemark::CUSTOMER_STRATEGY_LIST_RES);
    }

    //获取规则组详情
    public function get($strategy_id)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/customer_strategy/get?access_token={$this->access_token}";
        $arr = array_filter(compact('strategy_id'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::CUSTOMER_STRATEGY_GET_REQ, ParamsRemark::CUSTOMER_STRATEGY_GET_RES);
    }


    // 获取规则组管理范围
    // 创建新的规则组
    // 编辑规则组及其管理范围
    // 删除规则组


}
