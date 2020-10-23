<?php
namespace Mpcube\Wechat\Publics\CustomService;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class KfAccountNew
{
    use Common, Singleton;

    //添加客服帐号
    public function add($kf_account, $nickname)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/add?access_token='.$this->access_token;

        $arr = compact('kf_account', 'nickname');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_ADD_REQ);
    }

    //邀请绑定客服帐号
    public function inviteWorker($kf_account, $invite_wx)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/inviteworker?access_token='.$this->access_token;

        $arr = compact('kf_account', 'invite_wx');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_INVITEWORKER_REQ);
    }

    //设置客服信息
    public function update($kf_account, $nickname)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/update?access_token='.$this->access_token;

        $arr = compact('kf_account', 'nickname');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_UPDATE_REQ);
    }

    //删除客服帐号
    public function del($kf_account)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/del?access_token='.$this->access_token.'&kf_account='.$kf_account;
        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_DEL_REQ);
    }

    //上传客服头像
    public function uploadHeadImg($kf_account, $media_full_file_path)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/uploadheadimg?access_token='.$this->access_token.'&kf_account='.$kf_account;

        return $this->httpRespToArray($this->curlPostWxMedia($url, $media_full_file_path), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_UPLOADHEADIMG_REQ);
    }

    //获取所有客服账号
    public function getKfList()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/customservice/getkflist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_GETKFlIST_RES);
    }

    //获取在线客服账号
    public function getOnlineKfList()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/customservice/getonlinekflist?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::CUSTOMSERVICE_KFACCOUNT_GETONLINE_KFlIST_RES);
    }

}