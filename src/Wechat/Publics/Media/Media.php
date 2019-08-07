<?php
namespace Mpcube\Wechat\Publics\Media;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Singleton;

class Media
{
    use Common, Singleton;

    public static function getMediaTypeArray()
    {
        $rc = new \ReflectionClass(MediaType::class);
        return $rc->getConstants();
    }

    // region 临时素材

    //新增临时素材
    public function upload($type, $media_full_file_path)
    {
        if (!in_array($type, $this->getMediaTypeArray())) return false;

        $url = $this->WechatApiBaseURL.'cgi-bin/media/upload?access_token='.$this->access_token.'&type='.$type;

        return $this->httpRespToArray($this->curlPostWxMedia($url, $media_full_file_path), ParamsRemark::MEDIA_UPLOAD_RES, ParamsRemark::MEDIA_UPLOAD_RES);
    }

    //上传图文消息内的图片获取URL
    //本接口所上传的图片不占用公众号的素材库中图片数量的5000个的限制。图片仅支持jpg/png格式，大小必须在1MB以下。
    public function uploadimg($media_full_file_path, array $extra_field=array(), $file_field='media')
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/media/uploadimg?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPostWxMedia($url, $media_full_file_path, $extra_field, $file_field), ParamsRemark::MEDIA_UPLOADIMG_REQ, ParamsRemark::MEDIA_UPLOADIMG_RES);

    }

    //获取临时素材
    public function get($type, $media_id)
    {
        if (!in_array($type, $this->getMediaTypeArray())) return false;

        $url = $this->WechatApiBaseURL.'cgi-bin/media/get?access_token='.$this->access_token.'&media_id='.$media_id;

        if ($type == MediaType::VIDEO) {
            $video = $this->httpRespToArray($this->curlGet($url));
            return $video["video_url"];
        }

        return $url;
    }

    // endregion

}