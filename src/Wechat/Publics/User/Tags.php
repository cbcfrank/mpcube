<?php
namespace Mpcube\Wechat\Publics\User;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Singleton;

//用户标签管理
class Tags
{
    use Common, Singleton;

    private $_black_openid_list = array();

    // region 标签管理

    // 创建标签
    public function create($name)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/create?access_token='.$this->access_token;

        $arr = array("tag" => compact("name"));

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::TAGS_CREATE_REQ, ParamsRemark::TAGS_CREATE_RES);
    }

    //获取公众号已创建的标签
    public function get()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/get?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::TAGS_GET_RES);
    }

    //编辑标签
    public function update($id, $name)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/update?access_token='.$this->access_token;

        $arr = array("tag" => compact("id", "name"));

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::TAGS_CREATE_REQ, ParamsRemark::TAGS_CREATE_RES);
    }

    // 删除标签
    public function delete($id)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/delete?access_token='.$this->access_token;

        $arr = array("tag" => compact("id"));

        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    // endregion

    // region 用户管理

    //批量为用户打标签
    public function membersBatchtagging(array $openid_list, $tagid)
    {
        $arr = compact("openid_list", "tagid");
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/members/batchtagging?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //批量为用户取消标签
    public function membersBatchuntagging(array $openid_list, $tagid)
    {
        $arr = compact("openid_list", "tagid");
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/members/batchuntagging?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //获取用户身上的标签列表
    public function getIdList($openid)
    {
        $arr = compact("openid");
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/getidlist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    // endregion

    // region 黑名单管理

    //获取公众号的黑名单列表
    public function membersGetBlackList($begin_openid='')
    {
        $arr = compact("begin_openid");
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/members/getblacklist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    public function setBlackOpenidList($openid)
    {
        $this->_black_openid_list[] = $openid;
        return $this;
    }

    public function clearBlackOpenidList()
    {
        $this->_black_openid_list = array();
        return $this;
    }

    // 拉黑用户
    public function membersBatchBlackList()
    {
        $arr = array("openid_list" => $this->_black_openid_list);
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/members/batchblacklist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //取消拉黑用户
    public function membersBatchBlackUnBlackList()
    {
        $arr = array("openid_list" => $this->_black_openid_list);
        $url = $this->WechatApiBaseURL.'cgi-bin/tags/members/batchunblacklist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    // endregion

}