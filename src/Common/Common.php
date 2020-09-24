<?php

namespace Mpcube\Common;

trait Common
{
    private $WechatApiBaseURL = 'https://api.weixin.qq.com/';
    private $WechatMpBaseURL = 'https://mp.weixin.qq.com/';
    private $WxworkApiBaseURL = 'https://qyapi.weixin.qq.com/';
    private $access_token = '';

    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
        return $this;
    }

    private function httpRespToArray($resp='', array $params_remark_req=array(), array $params_remark_res=array())
    {
        $arr = Errcode::parseErrcodeByString($resp);

        if (!empty($params_remark_req)) {
            $arr['_remark']['fields']['request'] = $params_remark_req;
        }

        if (!empty($params_remark_res)) {
            $arr['_remark']['fields']['response'] = $params_remark_res;
        }

        return $arr;
    }

    // region curl工具函数

    private function curlGet($url)
    {
        //初始化
        $ch = curl_init();

        //设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);

        //设置头文件的信息作为数据流输出
        //curl_setopt($ch, CURLOPT_HEADER, 1);

        //忽略SSL验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //执行命令
        $data = curl_exec($ch);

        //错误提示
        if (curl_errno($ch)) {
            print curl_error($ch);
        }

        //关闭URL请求
        curl_close($ch);

        //显示获得的数据
        return $data;
    }

    private function curlPost($url, array $post_data)
    {
        //初始化
        $ch = curl_init();

        //设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);

        //设置头文件的信息作为数据流输出
        //curl_setopt($ch, CURLOPT_HEADER, 1);

        //忽略SSL验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //设置post方式提交
        curl_setopt($ch, CURLOPT_POST, 1);

        //设置post数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data, JSON_UNESCAPED_UNICODE));

        //执行命令
        $data = curl_exec($ch);

        //错误提示
        if (curl_errno($ch)) {
            print curl_error($ch);
        }

        //关闭URL请求
        curl_close($ch);

        //显示获得的数据
        return $data;
    }

    private function curlPostWxMedia($url, $full_file_path, array $extra_field=array(), $file_field='media')
    {
        //初始化
        $ch = curl_init();

        //设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);

        //告知php是容忍还是禁止旧的@语法
        curl_setopt ($ch, CURLOPT_SAFE_UPLOAD, false);

        //设置头文件的信息作为数据流输出
        //curl_setopt($ch, CURLOPT_HEADER, 1);

        //忽略SSL验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //设置post方式提交
        curl_setopt($ch, CURLOPT_POST, 1);

        //post数据，使用@符号，curl就会认为是有文件上传
        $post_data = array($file_field=>new \CURLFile(realpath($full_file_path)));

        //如果需要加入其他字段
        if ($extra_field) {
            $post_data = array_merge($post_data, $extra_field);
        }

        //设置post数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        //执行命令
        $data = curl_exec($ch);

        //错误提示
        if (curl_errno($ch)) {
            print curl_error($ch);
        }

        //关闭URL请求
        curl_close($ch);

        //显示获得的数据
        return $data;
    }


//    public function saveMediaToServer($url)
//    {
//        // 要存在你服务器哪个位置？
//        $savePathFile = '/' . date('YmdHis') . '.jpg';
//        $targetName = $savePathFile;
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
//        $fp = fopen($targetName, 'wb');
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_FILE, $fp);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_exec($ch);
//        curl_close($ch);
//        fclose($fp);
//
//        return PubCommon::serverDomain() . $savePathFile;
//    }

    // endregion

}