<?php
namespace Minicub\Wechat\Publics\Event;

use Minicub\Wechat\Publics\Common;
use Minicub\Wechat\Publics\Event\Observer\MsgEventObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgImageObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgLinkObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgLocationObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgShortVideoObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgTextObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgVideoObserver;
use Minicub\Wechat\Publics\Event\Observer\MsgVoiceObserver;
use Minicub\Wechat\Publics\Singleton;

class Message extends Subject
{
    use Common, Singleton;

    // region 校验

    private function checkSignature($signature, $timestamp, $nonce, $token)
    {
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) return true;

        return false;
    }

    public function valid($signature, $timestamp, $nonce, $token, $echostr)
    {
        $check = $this->checkSignature($signature, $timestamp, $nonce, $token);

        if ($check) exit($echostr);

        return $check;
    }

    // endregion

    public function attachAll()
    {
        $this->attach(MsgTextObserver::getInstance())
             ->attach(MsgEventObserver::getInstance())
             ->attach(MsgImageObserver::getInstance())
             ->attach(MsgLinkObserver::getInstance())
             ->attach(MsgLocationObserver::getInstance())
             ->attach(MsgShortVideoObserver::getInstance())
             ->attach(MsgVideoObserver::getInstance())
             ->attach(MsgVoiceObserver::getInstance());

        return $this;
    }

    public function receive()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $postArr = json_decode(json_encode($postObj),TRUE);

        //如果还没有任何一个处理对象时，默认加载所有观察者
        if (empty($this->_observers)) {
            $this->attachAll();
        }

        $this->notifyAllObservers($postArr);
    }

    // region 回复消息体XML

    //回复文本消息
    public static function setRespTextXML($fromUserName, $toUserName, $content)
    {
        $xmltpl = '<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
					</xml>';
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::TEXT, $content);
    }

    //回复图片消息
    public static function setRespImageXML($fromUserName, $toUserName, $mediaId)
    {
        $xmltpl = '<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      <Image>
                        <MediaId><![CDATA[%s]]></MediaId>
                      </Image>
                    </xml>';
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::IMAGE, $mediaId);
    }

    //回复语音消息
    public static function setRespVoiceXML($fromUserName, $toUserName, $mediaId)
    {
        $xmltpl = '<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      <Voice>
                        <MediaId><![CDATA[%s]]></MediaId>
                      </Voice>
                    </xml>';
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::VOICE, $mediaId);
    }

    //回复视频消息
    public static function setRespVideoXML($fromUserName, $toUserName, $mediaId, $title, $description)
    {
        $xmltpl = '<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      <Video>
                        <MediaId><![CDATA[%s]]></MediaId>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                      </Video>
                    </xml>';
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::VIDEO, $mediaId, $title, $description);
    }

    //回复音乐消息
    public static function setRespMusicXML($fromUserName, $toUserName, $title, $description, $musicUrl, $hqMusicUrl, $thumbMediaId)
    {
        $xmltpl = '<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      <Music>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                        <MusicUrl><![CDATA[%s]]></MusicUrl>
                        <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                        <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                      </Music>
                    </xml>';
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::MUSIC, $title, $description, $musicUrl, $hqMusicUrl, $thumbMediaId);
    }

    //消息转发到客服
    //用户在等待队列中时，用户发送的消息仍然会被推送至开发者填写的url上。
    //这里特别要注意，只针对微信用户发来的消息才进行转发，而对于其他任何事件（比如菜单点击、地理位置上报等）都不应该转接，
    //否则客服在客服系统上就会看到一些无意义的消息了。
    //
    //如果您有多个客服人员同时登录了客服并且开启了自动接入在进行接待，每一个客户的消息转发给客服时，多客服系统会将客户分配给其中一个客服人员。
    //如果您希望将某个客户的消息转给指定的客服来接待，可以在返回transfer_customer_service消息时附上TransInfo信息指定一个客服帐号。
    // 需要注意，如果指定的客服没有接入能力(不在线、没有开启自动接入或者自动接入已满)，该用户会被直接接入到指定客服，不再通知其它客服，
    //不会被其他客服接待。建议在指定客服时，先查询客服的接入能力（获取在线客服接待信息接口），指定到有能力接入的客服，保证客户能够及时得到服务。
    public static function setRespTransferCustomerServiceXML($fromUserName, $toUserName, $KfAccount='')
    {
        if (!empty($KfAccount)) {
            $kfAccount = "<TransInfo><KfAccount><![CDATA[{$KfAccount}]]></KfAccount></TransInfo>";
        }

        $xmltpl = "<xml>
                      <ToUserName><![CDATA[%s]]></ToUserName>
                      <FromUserName><![CDATA[%s]]></FromUserName>
                      <CreateTime>%s</CreateTime>
                      <MsgType><![CDATA[%s]]></MsgType>
                      {$kfAccount}
                    </xml>";
        return sprintf($xmltpl, $toUserName, $fromUserName, time(), MessageType::TRANSFER_CUSTOMER_SERVICE);
    }

    // endregion
}