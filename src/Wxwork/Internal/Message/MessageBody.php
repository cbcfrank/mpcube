<?php
namespace Mpcube\Wxwork\Internal\Message;

use Mpcube\Common\Singleton;

class MessageBody
{
    use Singleton;

    // region 类变量

    private $textcard = array();
    private $markdown = array();
    private $miniprogram_notice = array();
    private $touser = '';
    private $toparty = '';
    private $totag = '';
    private $msgtype = '';
    private $agentid = 0;
    private $enable_id_trans = 0;
    private $enable_duplicate_check = 0;
    private $duplicate_check_interval = 0;

    public function ofTextCard($title, $description, $url, $btntxt)
    {
        $this->textcard = compact('title', 'description', 'url', 'btntxt');
        $this->msgtype = MessageType::TEXTCARD;
        return $this;
    }

    public function ofMarkdown($content)
    {
        $this->markdown = compact('content');
        $this->msgtype = MessageType::MARKDOWN;
        return $this;
    }

    public function ofMiniprogramNotice($appid, $title, $content_item=array(array('key'=>'默认栏目', 'value'=>'默认内容')), $emphasis_first_item=false, $page='', $description='')
    {
        $this->miniprogram_notice = compact('appid', 'title', 'content_item', 'emphasis_first_item', 'page', 'description');
        $this->msgtype = MessageType::MINIPROGRAM_NOTICE;
        return $this;
    }

    public function toUser(...$user_id)
    {
        $this->touser = implode('|', $user_id);
        return $this;
    }

    public function toParty(...$party_id)
    {
        $this->toparty = implode('|', $party_id);
        return $this;
    }

    public function toTag(...$tag_id)
    {
        $this->totag = implode('|', $tag_id);
        return $this;
    }

    public function setAgentid($agentid)
    {
        $this->agentid = $agentid;
        return $this;
    }

    public function setEnableIdTrans(bool $flag=false)
    {
        $this->enable_id_trans = intval($flag);
        return $this;
    }

    public function setEnableDuplicateCheck(bool $flag=false)
    {
        $this->enable_duplicate_check = intval($flag);
        return $this;
    }

    public function setDuplicateCheckInterval(int $interval=1800)
    {
        $this->duplicate_check_interval = $interval;
        return $this;
    }

    public function finish()
    {
//        return array_filter(array(""=>$this->_menus, "matchrule"=>$this->_matchrule));
//        return get_class_methods(self::class);
        return array_filter(get_object_vars($this));
    }

}
