<?php

namespace Mpcube\Wechat\Miniapp\Wxacode;

use Mpcube\Common\Singleton;
use Mpcube\Common\Common;

class Wxacode
{
    use Common, Singleton;

    //todo
    /**
     * 获取小程序二维码
     * 适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制，详见获取二维码。
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/qr-code/createQRCode.html
     * @param $path
     * @param int $width
     * @return mixed
     */
    public function createQRCode($path, $width=430)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/wxaapp/createwxaqrcode?access_token={$this->access_token}";
        $arr = compact('path', 'width');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::QRCODE_CREATE_REQ, ParamsRemark::QRCODE_CREATE_RES);
    }

    /**
     * 获取不限制的小程序码
     * 该接口用于获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制。 更多用法详见 获取小程序码。
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/qr-code/getUnlimitedQRCode.html
     * 注意事项: @link https://developers.weixin.qq.com/miniprogram/dev/framework/open-ability/qr-code.html
     * @param $scene
     * @param string $page
     * @param bool $check_path
     * @param string $env_version
     * @param int $width
     * @param bool $auto_color
     * @param int[] $line_color
     * @param bool $is_hyaline
     * @return mixed
     */
    public function getWxaCodeUnlimit($scene, $page='pages/index/index', $check_path=true, $env_version='release',
                                      $width=430, $auto_color=false, $line_color=["r"=>0,"g"=>0,"b"=>0], $is_hyaline=false)
    {
        $url = $this->WechatApiBaseURL."wxa/getwxacodeunlimit?access_token={$this->access_token}";
        $arr = compact('scene', 'page', 'check_path', 'env_version', 'width', 'auto_color', 'line_color', 'is_hyaline');
//        var_dump($url, $arr);
        $ret = $this->curlPost($url, $arr);
//        var_dump($ret);
//        file_put_contents('abc.txt', $ret, FILE_APPEND);

        $arr = json_decode($ret, true);
        if (!isset($arr['errcode'])) {
            $ret = json_encode([
                'errcode' => 0,
                'buffer_base64' => base64_encode($ret),
                'tips' => '<img width="430" height="430" src="data:image/jpg;base64,{buffer_base64} />'
            ]);
        }

        return $this->httpRespToArray($ret, ParamsRemark::GET_WXACODE_UNLIMIT_REQ, ParamsRemark::GET_WXACODE_UNLIMIT_RES);
    }

    /**
     * 查询 scheme 码
     * 该接口用于查询小程序 scheme 码，及长期有效 quota
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-scheme/queryScheme.html
     * @param $scheme
     * @return mixed
     */
    public function queryScheme($scheme)
    {
        $url = $this->WechatApiBaseURL."wxa/queryscheme?access_token={$this->access_token}";
        $arr = compact('scheme');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::QUERYSCHEME_REQ, ParamsRemark::QUERYSCHEME_RES);
    }

    /**
     * 获取 scheme 码
     * 该接口用于获取小程序 scheme 码，适用于短信、邮件、外部网页、微信内等拉起小程序的业务场景。通过该接口，可以选择生成到期失效和永久有效的小程序码，有数量限制，目前仅针对国内非个人主体的小程序开放，详见获取 URL scheme。
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-scheme/generateScheme.html
     * @param string $path
     * @param string $query
     * @param string $env_version
     * @param bool $is_expire
     * @param int $expire_type
     * @param int $expire_interval
     * @param int $expire_time
     * @return mixed
     */
    public function generateScheme($path='', $query='', $env_version='release', $is_expire=true, $expire_type=1, $expire_interval=30, $expire_time=9000000009)
    {
        $jump_wxa = compact('path', 'query', 'env_version');

        $url = $this->WechatApiBaseURL."wxa/generatescheme?access_token={$this->access_token}";
        $arr = compact('jump_wxa', 'is_expire', 'expire_type', 'expire_interval', 'expire_time');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::GENERATE_SCHEME_REQ, ParamsRemark::GENERATE_SCHEME_RES);
    }

    //todo 获取 NFC 的小程序 scheme

    /**
     * 查询 URL Link
     * 该接口用于查询小程序 url_link 配置，及长期有效 quota
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-link/queryUrlLink.html
     * @param $url_link
     * @return mixed
     */
    public function queryUrllink($url_link)
    {
        $url = $this->WechatApiBaseURL."wxa/query_urllink?access_token={$this->access_token}";
        $arr = compact('url_link');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::QUERY_URLLINK_REQ, ParamsRemark::QUERY_URLLINK_RES);
    }

    /**
     * 获取 URL Link
     * 适用于短信、邮件、网页、微信内等拉起小程序的业务场景。通过该接口，可以选择生成到期失效和永久有效的小程序链接，有数量限制，目前仅针对国内非个人主体的小程序开放，详见获取 URL Link
     * @link https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-link/generateUrlLink.html
     * @param string $path
     * @param string $query
     * @param string $env_version
     * @param bool $is_expire
     * @param int $expire_type
     * @param int $expire_interval
     * @param int $expire_time
     * @return mixed
     */
    public function generateUrllink($path='', $query='', $env_version='release', $is_expire=true, $expire_type=1, $expire_interval=30, $expire_time=9000000009)
    {
        $url = $this->WechatApiBaseURL."wxa/generate_urllink?access_token={$this->access_token}";
        $arr = compact('path', 'query', 'env_version', 'is_expire', 'expire_type', 'expire_interval', 'expire_time');
        $ret = $this->curlPost($url, $arr);
//        var_dump($url, $ret);
        return $this->httpRespToArray($ret, ParamsRemark::GENERATE_URLLINK_REQ, ParamsRemark::GENERATE_URLLINK_RES);
    }

}