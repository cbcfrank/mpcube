<?php
namespace Mpcube\Wechat\Publics\CustomService;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class KfAccount
{
    use Common, Singleton;

    //添加客服帐号
    public function add($kf_account, $nickname, $password)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/add?access_token='.$this->access_token;

        $arr = compact('kf_account', 'nickname', 'password');

        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //修改客服帐号
    public function update($kf_account, $nickname, $password)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/update?access_token='.$this->access_token;

        $arr = compact('kf_account', 'nickname', 'password');

        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //删除客服帐号
    public function del($kf_account, $nickname, $password)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/del?access_token='.$this->access_token;

        $arr = compact('kf_account', 'nickname', 'password');

        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    //设置客服帐号的头像
    public function uploadHeadImg($media_full_file_path)
    {
        $url = $this->WechatApiBaseURL.'customservice/kfaccount/uploadheadimg?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPostWxMedia($url, $media_full_file_path));
    }

    //获取所有客服账号
    public function getKfList()
    {
        $url = $this->WechatApiBaseURL.'customservice/getkflist?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url));
    }


}