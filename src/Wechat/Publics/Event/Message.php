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

    // endregion
}