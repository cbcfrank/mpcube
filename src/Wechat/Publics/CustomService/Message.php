<?php
namespace Mpcube\Wechat\Publics\CustomService;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Event\MessageType;
use Mpcube\Wechat\Publics\Singleton;

class Message
{
    use Common, Singleton;

    private $_msg = array();

    // region 客服消息 - 消息体组合

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
            MessageType::NEWS => array(
                'articles' => compact('title', 'description', 'musicurl', 'hqmusicurl', 'thumb_media_id')
            ),
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

    //发送卡券
    public function setWxCardMsg($touser, $card_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::WXCARD,
            MessageType::WXCARD => compact('card_id'),
        );
        return $this;
    }

    //发送小程序卡片（要求小程序与公众号已关联）
    public function setMiniProgramPageMsg($touser, $title, $appid, $pagepath, $thumb_media_id)
    {
        $this->_msg = array(
            "touser" => $touser,
            "msgtype" => MessageType::MINIPROGRAMPAGE,
            MessageType::MINIPROGRAMPAGE => compact('title', 'appid', 'pagepath', 'thumb_media_id'),
        );
        return $this;
    }

    //请注意，如果需要以某个客服帐号来发消息（在微信6.0.2及以上版本中显示自定义头像），
    //则需在JSON数据包的后半部分加入customservice参数，例如发送文本消息则改为：
    public function setCustomServiceKfAccountIfNeed($kf_account)
    {
        if (empty($this->_msg)) return false;

        $this->_msg['customservice'] = compact('kf_account');

        return $this;
    }

    // endregion

    // region 客服消息

    //客服接口-发消息
    public function customSend()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/message/custom/send?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $this->_msg), ParamsRemark::CUSTOMSERVICE_MESSAGE_CUSTOM_SEND_REQ);
    }

    //客服输入状态
    //开发者可通过调用“客服输入状态”接口，返回客服当前输入状态给用户。
    //此接口需要客服消息接口权限。
    //如果不满足发送客服消息的触发条件，则无法下发输入状态。
    //下发输入状态，需要客服之前30秒内跟用户有过消息交互。
    //在输入状态中（持续15s），不可重复下发输入态。
    //在输入状态中，如果向用户下发消息，会同时取消输入状态。
    public function customTyping($touser, $command)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/message/custom/typing?access_token='.$this->access_token;
        $arr = compact('touser', 'command');
        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CUSTOMSERVICE_MESSAGE_CUSTOM_TYPING_REQ);
    }

    // endregion
}