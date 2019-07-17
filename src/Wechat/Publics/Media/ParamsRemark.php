<?php

namespace Minicub\Wechat\Publics\Media;


class ParamsRemark
{
    const MEDIA_UPLOAD_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'type' => array('required'=>'是', 'memo'=>'媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）'),
        'media' => array('required'=>'是', 'memo'=>'form-data中媒体文件标识，有filename、filelength、content-type等信息'),
    );

    const MEDIA_UPLOAD_RES = array(
        'type' => array('memo'=>'媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb，主要用于视频与音乐格式的缩略图）'),
        'media_id' => array('memo'=>'媒体文件上传后，获取标识'),
        'created_at' => array('memo'=>'媒体文件上传时间戳'),
    );

    const MEDIA_UPLOADIMG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'media' => array('required'=>'是', 'memo'=>'form-data中媒体文件标识，有filename、filelength、content-type等信息'),
    );

    const MEDIA_UPLOADIMG_RES = array(
        'url' => array('memo'=>'是上传图片的URL，可放置图文消息中使用'),
    );

    const MEDIA_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'media_id' => array('required'=>'是','memo'=>'媒体文件上传后，获取标识'),
    );

    const MEDIA_GET_RES = array(
        'video_url' => array('memo'=>'调用接口凭证'),
    );

    const MATERIAL_ADD_NEWS_REQ = array(
        'title' => array('required'=>'是', 'memo'=>'标题'),
        'thumb_media_id' => array('required'=>'是', 'memo'=>'图文消息的封面图片素材id（必须是永久mediaID）'),
        'author' => array('required'=>'否', 'memo'=>'作者'),
        'digest' => array('required'=>'否', 'memo'=>'图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空。如果本字段为没有填写，则默认抓取正文前64个字。'),
        'show_cover_pic' => array('required'=>'是', 'memo'=>'是否显示封面，0为false，即不显示，1为true，即显示'),
        'content' => array('required'=>'是', 'memo'=>'图文消息的具体内容，支持HTML标签，必须少于2万字符，小于1M，且此处会去除JS,涉及图片url必须来源 "上传图文消息内的图片获取URL"接口获取。外部图片url将被过滤。'),
        'content_source_url' => array('required'=>'是', 'memo'=>'图文消息的原文地址，即点击“阅读原文”后的URL'),
        'need_open_comment' => array('required'=>'否', 'memo'=>'Uint32 是否打开评论，0不打开，1打开'),
        'only_fans_can_comment' => array('required'=>'否', 'memo'=>'Uint32 是否粉丝才可评论，0所有人可评论，1粉丝才可评论'),
    );

    const MATERIAL_ADD_NEWS_RES = array(
        'media_id' => array('memo'=>'媒体文件ID'),
    );

    const MATERIAL_GET_REQ = array(
        'media_id' => array('required'=>'是', 'memo'=>'媒体文件ID'),
    );

    const MATERIAL_GET_RES = array(
        'title' => array('memo'=>'图文消息的标题'),
        'thumb_media_id' => array('memo'=>'图文消息的封面图片素材id（必须是永久mediaID）'),
        'show_cover_pic' => array('memo'=>'是否显示封面，0为false，即不显示，1为true，即显示'),
        'author' => array('memo'=>'作者'),
        'digest' => array('memo'=>'图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空'),
        'content' => array('memo'=>'图文消息的具体内容，支持HTML标签，必须少于2万字符，小于1M，且此处会去除JS'),
        'url' => array('memo'=>'图文页的URL'),
        'content_source_url' => array('memo'=>'图文消息的原文地址，即点击“阅读原文”后的URL'),
    );

    const MATERIAL_COUNT_RES = array(
        'voice_count' => array('memo'=>'语音总数量'),
        'video_count' => array('memo'=>'视频总数量'),
        'image_count' => array('memo'=>'图片总数量'),
        'news_count' => array('memo'=>'图文总数量'),
    );

    const MATERIAL_BATCHGET_MATERIAL_REQ = array(
        'type' => array('required'=>'是', 'memo'=>'素材的类型，图片（image）、视频（video）、语音 （voice）、图文（news）'),
        'offset' => array('required'=>'是', 'memo'=>'从全部素材的该偏移位置开始返回，0表示从第一个素材 返回'),
        'count' => array('required'=>'是', 'memo'=>'返回素材的数量，取值在1到20之间'),
    );

    const MATERIAL_BATCHGET_MATERIAL_RES = array(
        'total_count' => array('memo'=>'该类型的素材的总数'),
        'item_count' => array('memo'=>'本次调用获取的素材的数量'),
        'title' => array('memo'=>'图文消息的标题'),
        'thumb_media_id' => array('memo'=>'图文消息的封面图片素材id（必须是永久mediaID）'),
        'show_cover_pic' => array('memo'=>'是否显示封面，0为false，即不显示，1为true，即显示'),
        'author' => array('memo'=>'作者'),
        'digest' => array('memo'=>'图文消息的摘要，仅有单图文消息才有摘要，多图文此处为空'),
        'content' => array('memo'=>'图文消息的具体内容，支持HTML标签，必须少于2万字符，小于1M，且此处会去除JS'),
        'url' => array('memo'=>'图文页的URL，或者，当获取的列表是图片素材列表时，该字段是图片的URL'),
        'content_source_url' => array('memo'=>'图文消息的原文地址，即点击“阅读原文”后的URL'),
        'update_time' => array('memo'=>'这篇图文消息素材的最后更新时间'),
        'name' => array('memo'=>'文件名称'),
    );
}