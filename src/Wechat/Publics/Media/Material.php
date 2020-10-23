<?php

namespace Mpcube\Wechat\Publics\Media;

//use Mpcube\Wechat\Publics\Common;
use Mpcube\Common\Common;
//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

class Material
{
    use Common, Singleton;

    private $_news = array();

    // region 永久素材

    //图文素材数组
    public function newsArray($title, $thumb_media_id, $author, $digest, $show_cover_pic,
                              $content, $content_source_url, $need_open_comment, $only_fans_can_comment)
    {
        $this->_news[] = compact("title","thumb_media_id", "author", "digest", "show_cover_pic",
            "content", "content_source_url", "need_open_comment", "only_fans_can_comment");

        return $this;
    }

    //新增永久图文素材
    public function addNews(array $news)
    {
        $arr['articles'] = $this->_news;

        $url = $this->WechatApiBaseURL.'cgi-bin/material/add_news?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::MATERIAL_ADD_NEWS_REQ, ParamsRemark::MATERIAL_ADD_NEWS_RES);

    }

    //新增临时素材
    // 在上传视频素材时需要POST另一个表单，id为description，包含素材的描述信息，内容格式为JSON，格式如下：
    public function add($type, $media_full_file_path, array $video_description = array('title'=>'', 'introduction'=>''))
    {
        if (!in_array($type, Media::getMediaTypeArray())) return false;

        $url = $this->WechatApiBaseURL.'cgi-bin/material/add_material?access_token='.$this->access_token.'&type='.$type;

        //video类型特殊处理
        $extra_field = array_filter($video_description);
        if ($type == MediaType::VIDEO) {
            $extra_field['description'] = json_encode($video_description, JSON_UNESCAPED_UNICODE);
        }

        return $this->httpRespToArray($this->curlPostWxMedia($url, $media_full_file_path, $extra_field), ParamsRemark::MEDIA_UPLOAD_RES, ParamsRemark::MEDIA_UPLOAD_RES);
    }

    //获取永久素材
    public function get($type, $media_id)
    {

        return 'todo'; //todo
//        $url = $this->WechatApiBaseURL.'cgi-bin/material/get_material?access_token='.$this->access_token;
//
//        $arr = array('media_id'=>$media_id);
//
//        if (in_array($type, array(MediaType::IMAGE, MediaType::THUMB, MediaType::VOICE))) {
//            return $url;
//        }
//
//        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::MEDIA_GET_REQ, ParamsRemark::MATERIAL_GET_RES);

    }

    public function del($media_id)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/material/del_material?access_token='.$this->access_token;
        $arr = array('media_id'=>$media_id);
        return $this->httpRespToArray($this->curlPost($url, $arr));
    }

    public function count()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/material/get_materialcount?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlGet($url), array(), ParamsRemark::MATERIAL_COUNT_RES);
    }

    //获取素材列表
    public function batchGet($type, $offset, $count)
    {
        $arr = compact('type','offset', 'count');

        $url = $this->WechatApiBaseURL.'cgi-bin/material/batchget_material?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::MATERIAL_BATCHGET_MATERIAL_REQ, ParamsRemark::MATERIAL_BATCHGET_MATERIAL_RES);
    }

    // endregion
}