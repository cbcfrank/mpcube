<?php

namespace Mpcube\Wechat\Publics\Menu;


class ParamsRemark
{
    const NORMAL_MENU_RES = array(
        'button' => array('required'=>'是', 'memo'=>'一级菜单数组，个数应为1~3个'),
        'sub_button' => array('required'=>'否', 'memo'=>'二级菜单数组，个数应为1~5个'),
        'type' => array('required'=>'是', 'memo'=>'菜单的响应动作类型，view表示网页类型，click表示点击类型，miniprogram表示小程序类型'),
        'name' => array('required'=>'是', 'memo'=>'菜单标题，不超过16个字节，子菜单不超过60个字节'),
        'key' => array('required'=>'click等点击类型必须', 'memo'=>'菜单KEY值，用于消息接口推送，不超过128字节'),
        'url' => array('required'=>'view、miniprogram类型必须', 'memo'=>'网页 链接，用户点击菜单可打开链接，不超过1024字节。 type为miniprogram时，不支持小程序的老版本客户端将打开本url。'),
        'media_id' => array('required'=>'media_id类型和view_limited类型必须', 'memo'=>'调用新增永久素材接口返回的合法media_id'),
        'appid' => array('required'=>'miniprogram类型必须', 'memo'=>'小程序的appid（仅认证公众号可配置）'),
        'pagepath' => array('required'=>'miniprogram类型必须', 'memo'=>'小程序的页面路径'),
    );

    const CONDITIONAL_MENU_RES = array(
        'button' => array('required'=>'是', 'memo'=>'一级菜单数组，个数应为1~3个'),
        'sub_button' => array('required'=>'否', 'memo'=>'二级菜单数组，个数应为1~5个'),
        'type' => array('required'=>'是', 'memo'=>'菜单的响应动作类型，view表示网页类型，click表示点击类型，miniprogram表示小程序类型'),
        'name' => array('required'=>'是', 'memo'=>'菜单标题，不超过16个字节，子菜单不超过40个字节'),
        'key' => array('required'=>'click等点击类型必须', 'memo'=>'菜单KEY值，用于消息接口推送，不超过128字节'),
        'url' => array('required'=>'view、miniprogram类型必须', 'memo'=>'网页链接，用户点击菜单可打开链接，不超过1024字节。当type为miniprogram时，不支持小程序的老版本客户端将打开本url'),
        'media_id' => array('required'=>'media_id类型和view_limited类型必须', 'memo'=>'调用新增永久素材接口返回的合法media_id'),
        'appid' => array('required'=>'miniprogram类型必须', 'memo'=>'小程序的appid'),
        'pagepath' => array('required'=>'miniprogram类型必须', 'memo'=>'小程序的页面路径'),
        'matchrule' => array('required'=>'是', 'memo'=>'菜单匹配规则'),
        'tag_id' => array('required'=>'否', 'memo'=>'用户标签的id，可通过用户标签管理接口获取'),
        'sex' => array('required'=>'否', 'memo'=>'性别：男（1）女（2），不填则不做匹配'),
        'client_platform_type' => array('required'=>'否', 'memo'=>'客户端版本，当前只具体到系统型号：IOS(1), Android(2),Others(3)，不填则不做匹配'),
        'country' => array('required'=>'否', 'memo'=>'国家信息，是用户在微信中设置的地区，具体请参考地区信息表'),
        'province' => array('required'=>'否', 'memo'=>'省份信息，是用户在微信中设置的地区，具体请参考地区信息表'),
        'city' => array('required'=>'否', 'memo'=>'城市信息，是用户在微信中设置的地区，具体请参考地区信息表'),
        'language' => array('required'=>'否', 'memo'=>'语言信息，是用户在微信中设置的语言，具体请参考语言表： 1、简体中文 "zh_CN" 2、繁体中文TW "zh_TW" 3、繁体中文HK "zh_HK" 4、英文 "en" 5、印尼 "id" 6、马来 "ms" 7、西班牙 "es" 8、韩国 "ko" 9、意大利 "it" 10、日本 "ja" 11、波兰 "pl" 12、葡萄牙 "pt" 13、俄国 "ru" 14、泰文 "th" 15、越南 "vi" 16、阿拉伯语 "ar" 17、北印度 "hi" 18、希伯来 "he" 19、土耳其 "tr" 20、德语 "de" 21、法语 "fr"'),
    );

    const MENU_CONFIGURATION_RES = array(
        'is_menu_open' => array('memo'=>'菜单是否开启，0代表未开启，1代表开启'),
        'selfmenu_info' => array('memo'=>'菜单信息'),
        'button' => array('memo'=>'菜单按钮'),
        'type' => array('memo'=>'菜单的类型，公众平台官网上能够设置的菜单类型有view（跳转网页）、text（返回文本，下同）、img、photo、video、voice。使用API设置的则有8种，详见《自定义菜单创建接口》'),
        'name' => array('memo'=>'菜单名称'),
        'value、url、key等字段' => array('memo'=>'对于不同的菜单类型，value的值意义不同。官网上设置的自定义菜单： Text:保存文字到value； Img、voice：保存mediaID到value； Video：保存视频下载链接到value； News：保存图文消息到news_info，同时保存mediaID到value； View：保存链接到url。 使用API设置的自定义菜单： click、scancode_push、scancode_waitmsg、pic_sysphoto、pic_photo_or_album、 pic_weixin、location_select：保存值到key；view：保存链接到url'),
        'news_info' => array('memo'=>'图文消息的信息'),
        'title' => array('memo'=>'图文消息的标题'),
        'digest' => array('memo'=>'摘要'),
        'author' => array('memo'=>'作者'),
        'show_cover' => array('memo'=>'是否显示封面，0为不显示，1为显示'),
        'cover_url' => array('memo'=>'封面图片的URL'),
        'content_url' => array('memo'=>'正文的URL'),
        'source_url' => array('memo'=>'原文的URL，若置空则无查看原文入口'),
    );
}