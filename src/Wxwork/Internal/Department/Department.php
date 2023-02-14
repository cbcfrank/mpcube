<?php
namespace Mpcube\Wxwork\Internal\Department;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class Department
{
    use Common, Singleton;

    private $_user_list = array();

    //获取部门列表
    public function list($id=null)
    {
        if (!empty($id)) $id = '&id='.$id;
        $url = $this->WxworkApiBaseURL.'cgi-bin/department/list?access_token='.$this->access_token.$id;

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::DEPARTMENT_LIST_REQ, ParamsRemark::DEPARTMENT_LIST_RES);
    }

    //获取子部门ID列表
    public function simpleList($id=null)
    {
        if (!empty($id)) $id = '&id='.$id;
        $url = $this->WxworkApiBaseURL.'cgi-bin/department/simplelist?access_token='.$this->access_token.$id;

//        $arr = compact('openid', 'remark');

//        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::USER_INFO_UPDATEREMARK_RES);

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::DEPARTMENT_SIMPLE_LIST_REQ, ParamsRemark::DEPARTMENT_SIMPLE_LIST_RES);
    }

    //获取单个部门详情
    public function get($id)
    {
        $url = $this->WxworkApiBaseURL.'cgi-bin/department/get?access_token='.$this->access_token.'&id='.$id;

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::DEPARTMENT_SIMPLE_LIST_REQ, ParamsRemark::DEPARTMENT_GET_RES);
    }

//
//    //批量获取用户基本信息
//    //开发者可通过该接口来批量获取用户基本信息。最多支持一次拉取100条。
//    public function infoBatchGet()
//    {
//        $url = $this->WechatApiBaseURL.'cgi-bin/user/info/batchget?access_token='.$this->access_token;
//
//        $arr = array("user_list" => $this->_user_list);
//
//        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::USER_INFO_BATCHGET_REQ, ParamsRemark::USER_INFO_BATCHGET_RES);
//    }
//


}
