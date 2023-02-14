<?php

namespace Mpcube\Wxwork\Internal\ExternalContact;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class ExternalContact
{
    use Common, Singleton;

    /**
     * 获取客户列表
     * @link https://developer.work.weixin.qq.com/document/path/92113
     * @param $userid
     * @return mixed
     */
    public function list_external_contact($userid)
    {
        $url = $this->WxworkApiBaseURL.'cgi-bin/externalcontact/list?access_token='.$this->access_token."&userid={$userid}";

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::EXTERNALCONTACT_LIST_REQ, ParamsRemark::EXTERNALCONTACT_LIST_RES);
    }

    /**
     * 获取客户详情
     * @link https://developer.work.weixin.qq.com/document/path/92114
     * @param $external_userid
     * @param null $cursor
     * @return mixed
     */
    public function get($external_userid, $cursor=null)
    {
        if (!empty($cursor)) $cursor = '&cursor='.$cursor;

        $url = $this->WxworkApiBaseURL.'cgi-bin/externalcontact/get?access_token='.$this->access_token."&external_userid={$external_userid}".$cursor;

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::EXTERNALCONTACT_GET_REQ, ParamsRemark::EXTERNALCONTACT_GET_RES);
    }

    /**
     * 批量获取客户详情
     * @link https://developer.work.weixin.qq.com/document/path/92994
     * @param $userid_list
     * @param null $cursor
     * @param null $limit
     * @return mixed
     */
    public function batch_get_by_user($userid_list, $cursor=null, $limit=100)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/batch/get_by_user?access_token={$this->access_token}";
        $arr = array_filter(compact('userid_list', 'cursor', 'limit'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::BATCH_GET_BY_USER_REQ, ParamsRemark::BATCH_GET_BY_USER_RES);
    }

    /**
     * 修改客户备注信息
     * @link https://developer.work.weixin.qq.com/document/path/92115
     * @param $userid
     * @param $external_userid
     * @param $remark
     * @param $description
     * @param $remark_company
     * @param $remark_mobiles
     * @param $remark_pic_mediaid
     * @return mixed
     */
    public function remark($userid, $external_userid, $remark=null, $description=null, $remark_company=null, $remark_mobiles=null, $remark_pic_mediaid=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/remark?access_token={$this->access_token}";
        $arr = array_filter(compact('userid', 'external_userid', 'remark', 'description', 'remark_company', 'remark_mobiles', 'remark_pic_mediaid'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::REMARK_REQ, ParamsRemark::REMARK_RES);
    }

    /**
     * 获取企业标签库
     * @link https://developer.work.weixin.qq.com/document/path/92117#%E8%8E%B7%E5%8F%96%E4%BC%81%E4%B8%9A%E6%A0%87%E7%AD%BE%E5%BA%93
     * @param $tag_id
     * @param $group_id
     * @return mixed
     */
    public function get_corp_tag_list($tag_id=null, $group_id=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/get_corp_tag_list?access_token={$this->access_token}";
        $arr = array_filter(compact('tag_id', 'group_id'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::GET_CORP_TAG_LIST_REQ, ParamsRemark::GET_CORP_TAG_LIST_RES);
    }

    //组合标签
    public function assembleTag($name, $order=null)
    {
        return array_filter(compact('name', 'order'));
    }

    /**
     * 添加企业客户标签
     * @link https://developer.work.weixin.qq.com/document/path/92117#%E6%B7%BB%E5%8A%A0%E4%BC%81%E4%B8%9A%E5%AE%A2%E6%88%B7%E6%A0%87%E7%AD%BE
     * @param null $group_id
     * @param null $group_name
     * @param null $order
     * @param null $agentid
     * @param mixed ...$tag
     * @return mixed
     */
    public function add_corp_tag($group_id=null, $group_name=null, $order=null, $agentid=null, ...$tag)
    {

        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/add_corp_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('tag', 'group_id', 'group_name', 'order', 'agentid'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::ADD_CORP_TAG_REQ, ParamsRemark::ADD_CORP_TAG_RES);
    }

    /**
     * 编辑企业客户标签
     * @link https://developer.work.weixin.qq.com/document/path/92117#%E7%BC%96%E8%BE%91%E4%BC%81%E4%B8%9A%E5%AE%A2%E6%88%B7%E6%A0%87%E7%AD%BE
     * @param $id
     * @param null $name
     * @param null $order
     * @param null $agentid
     * @return mixed
     */
    public function edit_corp_tag($id, $name=null, $order=null, $agentid=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/edit_corp_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('id', 'name', 'order', 'agentid'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::EDIT_CORP_TAG_REQ, ParamsRemark::EDIT_CORP_TAG_RES);
    }

    /** 删除企业客户标签
     * @link https://developer.work.weixin.qq.com/document/path/92117#%E5%88%A0%E9%99%A4%E4%BC%81%E4%B8%9A%E5%AE%A2%E6%88%B7%E6%A0%87%E7%AD%BE
     * @param null $tag_id
     * @param null $group_id
     * @param null $agentid
     * @return mixed
     */
    public function del_corp_tag($tag_id=null, $group_id=null, $agentid=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/del_corp_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('tag_id', 'group_id', 'agentid'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::DEL_CORP_TAG_REQ, ParamsRemark::DEL_CORP_TAG_RES);
    }

    //获取指定规则组下的企业客户标签
    public function get_strategy_tag_list($strategy_id=null, $tag_id=null, $group_id=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/get_strategy_tag_list?access_token={$this->access_token}";
        $arr = array_filter(compact('tag_id', 'group_id', 'strategy_id'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::GET_STRATEGY_TAG_LIST_REQ, ParamsRemark::GET_STRATEGY_TAG_LIST_RES);
    }

    //为指定规则组创建企业客户标签
    //企业可通过此接口向规则组中添加新的标签组和标签，每个企业的企业标签和规则组标签合计最多可配置3000个。注意，仅可在一级规则组下添加标签。
    //https://developer.work.weixin.qq.com/document/path/94882
    public function add_strategy_tag($strategy_id, $group_id=null, $group_name=null, $order=null, ...$tag)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/add_strategy_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('group_id', 'strategy_id', 'group_name', 'order', 'tag'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::ADD_STRATEGY_TAG_REQ, ParamsRemark::ADD_STRATEGY_TAG_RES);
    }

    //编辑指定规则组下的企业客户标签
    public function edit_strategy_tag($id, $name=null, $order=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/edit_strategy_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('id', 'name', 'order'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::EDIT_STRATEGY_TAG_REQ, ParamsRemark::EDIT_STRATEGY_TAG_RES);
    }

    //删除指定规则组下的企业客户标签
    public function del_strategy_tag($tag_id=null, $group_id=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/del_strategy_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('tag_id', 'group_id'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::DEL_STRATEGY_TAG_REQ, ParamsRemark::DEL_STRATEGY_TAG_RES);
    }

    //编辑客户企业标签
    public function mark_tag($userid, $external_userid, $add_tag=null, $remove_tag=null)
    {
        $url = $this->WxworkApiBaseURL."cgi-bin/externalcontact/mark_tag?access_token={$this->access_token}";
        $arr = array_filter(compact('userid', 'external_userid', 'add_tag', 'remove_tag'));
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::MARK_TAG_REQ, ParamsRemark::MARK_TAG_RES);
    }

}
