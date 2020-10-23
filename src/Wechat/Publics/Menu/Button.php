<?php
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 2019/7/8
 * Time: 17:40
 */

namespace Mpcube\Wechat\Publics\Menu;

//use Mpcube\Wechat\Publics\Singleton;
use Mpcube\Common\Singleton;

/**
 * 自定义菜单接口可实现多种类型按钮
 * @see https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1421141013
 * 请注意，3到8的所有事件，仅支持微信iPhone5.4.1以上版本，和Android5.4以上版本的微信用户，
 * 旧版本微信用户点击后将没有回应，开发者也不能正常接收到事件推送。
 * 9和10，是专门给第三方平台旗下未微信认证（具体而言，是资质认证未通过）的订阅号准备的事件类型，
 * 它们是没有事件推送的，能力相对受限，其他类型的公众号不必使用。
 * @author cbcfrank
 * @date 2019-07-08
 */
class Button
{
    use Singleton;

    // region 类变量

    private $_buttons = array();
    private $_menus = array();
    private $_matchrule = array();

    // endregion

    // region 菜单按钮生成

    /**
     * 1、点击推事件用户点击click类型按钮后，微信服务器会通过消息接口推送消息类型为event的结构给开发者（参考消息接口指南），
     * 并且带上按钮中开发者填写的key值，开发者可以通过自定义的key值与用户进行交互；
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofClick($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::CLICK, "name"=>$name, "key"=>$key);
        return $this;
    }

    /**
     * 2、跳转URL用户点击view类型按钮后，微信客户端将会打开开发者在按钮中填写的网页URL，
     * 可与网页授权获取用户基本信息接口结合，获得用户基本信息。
     *
     * @param string $name
     * @param string $url
     * @return $this
     */
    public function ofView($name, $url)
    {
        $this->_buttons[] = array("type"=>ButtonType::VIEW, "name"=>$name, "url"=>$url);
        return $this;
    }

    /**
     * 3、扫码推事件用户点击按钮后，微信客户端将调起扫一扫工具，
     * 完成扫码操作后显示扫描结果（如果是URL，将进入URL），
     * 且会将扫码的结果传给开发者，开发者可以下发消息。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofScancodePush($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::SCANCODE_PUSH, "name"=>$name, "key"=>$key, "sub_button"=>array());
        return $this;
    }

    /**
     * 4、扫码推事件且弹出“消息接收中”提示框用户点击按钮后，微信客户端将调起扫一扫工具，
     * 完成扫码操作后，将扫码的结果传给开发者，同时收起扫一扫工具，然后弹出“消息接收中”提示框，
     * 随后可能会收到开发者下发的消息。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofScancodeWaitmsg($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::SCANCODE_WAITMSG, "name"=>$name, "key"=>$key, "sub_button"=>array());
        return $this;
    }

    /**
     * 5、弹出系统拍照发图用户点击按钮后，微信客户端将调起系统相机，
     * 完成拍照操作后，会将拍摄的相片发送给开发者，并推送事件给开发者，
     * 同时收起系统相机，随后可能会收到开发者下发的消息。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofPicSysphoto($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::PIC_SYSPHOTO, "name"=>$name, "key"=>$key, "sub_button"=>array());
        return $this;
    }

    /**
     * 6、弹出拍照或者相册发图用户点击按钮后，微信客户端将弹出选择器供用户选择“拍照”或者“从手机相册选择”。用户选择后即走其他两种流程。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofPicPhotoOrAlbum($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::PIC_PHOTO_OR_ALBUM, "name"=>$name, "key"=>$key, "sub_button"=>array());
        return $this;
    }

    /**
     * 7、弹出微信相册发图器用户点击按钮后，微信客户端将调起微信相册，完成选择操作后，
     * 将选择的相片发送给开发者的服务器，并推送事件给开发者，同时收起相册，随后可能会收到开发者下发的消息。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofPicWeixin($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::PIC_WEIXIN, "name"=>$name, "key"=>$key, "sub_button"=>array());
        return $this;
    }

    /**
     * 8、弹出地理位置选择器用户点击按钮后，微信客户端将调起地理位置选择工具，完成选择操作后，
     * 将选择的地理位置发送给开发者的服务器，同时收起位置选择工具，随后可能会收到开发者下发的消息。
     *
     * @param string $name
     * @param string $key
     * @return $this
     */
    public function ofLocationSelect($name, $key)
    {
        $this->_buttons[] = array("type"=>ButtonType::LOCATION_SELECT, "name"=>$name, "key"=>$key);
        return $this;
    }

    /**
     * 9、下发消息（除文本消息）用户点击media_id类型按钮后，微信服务器会将开发者填写的永久素材id对应的素材下发给用户，
     * 永久素材类型可以是图片、音频、视频、图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
     *
     * @param string $name
     * @param string $media_id
     * @return $this
     */
    public function ofMediaId($name, $media_id)
    {
        $this->_buttons[] = array("type"=>ButtonType::MEDIA_ID, "name"=>$name, "media_id"=>$media_id);
        return $this;
    }

    /**
     * 10、跳转图文消息URL用户点击view_limited类型按钮后，微信客户端将打开开发者在按钮中填写的永久素材id对应的图文消息URL，
     * 永久素材类型只支持图文消息。请注意：永久素材id必须是在“素材管理/新增永久素材”接口上传后获得的合法id。
     *
     * @param string $name
     * @param string $media_id
     * @return $this
     */
    public function ofViewLimited($name, $media_id)
    {
        $this->_buttons[] = array("type"=>ButtonType::VIEW_LIMITED, "name"=>$name, "media_id"=>$media_id);
        return $this;
    }

    /**
     * 打开小程序
     *
     * @param string $name
     * @param string $url
     * @param string $appid
     * @param string $pagepath
     * @return $this
     */
    public function ofMiniprogram($name, $url, $appid, $pagepath)
    {
        $this->_buttons[] = array("type"=>ButtonType::MINIPROGRAM, "name"=>$name, "url"=>$url, "appid"=>$appid, "pagepath"=>$pagepath);
        return $this;
    }

    // endregion

    // region 菜单按钮组合

    public function newSubButton($name)
    {
        $this->_menus[] = array("name"=>$name, "sub_button"=>$this->_buttons);

        $this->_buttons = array();
        return $this;
    }

    public function newButton()
    {
        $this->_menus[] = $this->_buttons[0];

        $this->_buttons = array();
        return $this;
    }

    public function matchrule($tag_id='', $sex='', $country='', $province='', $city='', $client_platform_type='', $language='')
    {
        $this->_matchrule = array_filter(compact("tag_id", "sex", "country", "province", "city", "client_platform_type", "language"));
        return $this;
    }

    public function finish()
    {
        return array_filter(array("button"=>$this->_menus, "matchrule"=>$this->_matchrule));
    }

    // endregion

}