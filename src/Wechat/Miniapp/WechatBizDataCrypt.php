<?php

namespace Mpcube\Wechat\Miniapp;

class WechatBizDataCrypt
{
//    use Singleton;

    /**
     * error code 说明.
     * <ul>

     *    <li>-41001: encodingAesKey 非法</li>
     *    <li>-41003: aes 解密失败</li>
     *    <li>-41004: 解密后得到的buffer非法</li>
     *    <li>-41005: base64加密失败</li>
     *    <li>-41016: base64解密失败</li>
     * </ul>
     */
    public static $OK = 0;
    public static $IllegalAesKey = -41001;
    public static $IllegalIv = -41002;
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;

//    private $appid;
//    private $sessionKey;
//
//    /**
//     * 构造函数
//     * @param $sessionKey string 用户在小程序登录后获取的会话密钥
//     * @param $appid string 小程序的appid
//     */
//    public function __construct( $appid, $sessionKey)
//    {
//        $this->sessionKey = $sessionKey;
//        $this->appid = $appid;
//    }
//
//    public function setAppid($appid)
//    {
//        $this->appid = $appid;
//    }
//
//    public function setSessionKey($sessionKey)
//    {
//        $this->sessionKey = $sessionKey;
//    }

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public static function decryptData( $appid, $sessionKey, $encryptedData, $iv, &$data )
    {
        if (strlen($sessionKey) != 24) return self::$IllegalAesKey;

        $aesKey = base64_decode($sessionKey);

        if (strlen($iv) != 24) return self::$IllegalIv;

        $aesIV = base64_decode($iv);

        $aesCipher = base64_decode($encryptedData);

        $result = openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

//        $dataObj = json_decode( $result );
        $dataArr = json_decode( $result, true );

//        if( $dataObj  == NULL ) return self::$IllegalBuffer;
        if( $dataArr  == NULL ) return self::$IllegalBuffer;

//        if( $dataObj->watermark->appid != $appid ) return self::$IllegalBuffer;
        if( $dataArr['watermark']['appid'] != $appid ) return self::$IllegalBuffer;

//        $data = $result;
        $data = $dataArr;

        return self::$OK;
    }

}
