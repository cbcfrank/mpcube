<?php
namespace Mpcube\Wxwork\Internal\Message;

class MessageTemplateCardType
{
    //模板卡片消息-文本通知型
    const TEXT_NOTICE = 'text_notice';

    //模板卡片消息-文本通知型
    const NEWS_NOTICE = 'news_notice';

    //模板卡片消息-按钮交互型
    const BUTTON_INTERACTION = 'BUTTON_INTERACTION';

    //模板卡片消息-投票选择型
    const VOTE_INTERACTION = 'vote_interaction';

    //模板卡片消息-多项选择型
    const MULTIPLE_INTERACTION = 'multiple_interaction';
}
