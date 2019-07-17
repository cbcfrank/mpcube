<?php
namespace Minicub\Wechat\Publics\CustomService;

use Minicub\Wechat\Publics\Common;
use Minicub\Wechat\Publics\Event\MessageType;
use Minicub\Wechat\Publics\Singleton;

class Message
{
    use Common, Singleton;

    private $_msg = array();

    // region 消息体

    //文本消息
    //发送文本消息时，支持插入跳小程序的文字链
    //文本内容<a href="http://www.qq.com" data-miniprogram-appid="appid" data-miniprogram-path="pages/index/index">点击跳小程序</a>
    //说明：
    //1.data-miniprogram-appid 项，填写小程序appid，则表示该链接跳小程序；
    //2.data-miniprogram-path项，填写小程序路径，路径与app.json中保持一致，可带参数；
    //3.对于不支持data-miniprogram-appid 项的客户端版本，如果有herf项，则仍然保持跳href中的网页链接；
    //4.data-miniprogram-appid对应的小程序必须与公众号有绑定关系。
    public function setTextMsg($touser, $content)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::TEXT,
            MessageType::TEXT => compact('content'),
        );
        return $this;
    }

    //图片消息
    public function setImageMsg($touser, $media_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::IMAGE,
            MessageType::IMAGE => compact('media_id'),
        );
        return $this;
    }

    //语音消息
    public function setVoiceMsg($touser, $media_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::VOICE,
            MessageType::VOICE => compact('media_id')
        );
        return $this;
    }

    //视频消息
    public function setVideoMsg($touser, $media_id, $thumb_media_id, $title, $description)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::VIDEO,
            MessageType::VIDEO => compact('media_id', 'thumb_media_id', 'title', 'description'),
        );
        return $this;
    }

    //音乐消息
    public function setMusicMsg($touser, $title, $description, $musicurl, $hqmusicurl, $thumb_media_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::MUSIC,
            MessageType::MUSIC => compact('title', 'description', 'musicurl', 'hqmusicurl', 'thumb_media_id'),
        );
        return $this;
    }

    //图文消息（点击跳转到外链） 图文消息条数限制在1条以内，注意，如果图文数超过1，则将会返回错误码45008。
    public function setNewsMsg($touser, $title, $description, $url, $picurl)
    {
        return 'todo'; //todo
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::NEWS,
            MessageType::NEWS => compact('title', 'description', 'musicurl', 'hqmusicurl', 'thumb_media_id'),
        );
        return $this;
    }

    //图文消息（点击跳转到图文消息页面） 图文消息条数限制在1条以内，注意，如果图文数超过1，则将会返回错误码45008
    public function setMpNewsMsg($touser, $media_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::MPNEWS,
            MessageType::MPNEWS => compact('media_id'),
        );
        return $this;
    }

    //菜单消息
    public function setMsgmenuMsg()
    {
        return 'todo'; //todo
    }

    //


    // endregion

    //客服接口-发消息
    public function customSend()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/message/custom/send?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $this->_msg));
    }
}