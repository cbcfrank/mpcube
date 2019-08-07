<?php

namespace Mpcube\Wechat\Publics\Menu;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\Singleton;

class Menu
{
    use Common, Singleton;

    // region 通用菜单

    /**
     * 菜单创建
     * @param array $menus
     * @return mixed
     */
    public function create(array $menus)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/create?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $menus), ParamsRemark::NORMAL_MENU_RES);
    }

    /**
     * 菜单查询
     * @return string
     */
    public function get()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/get?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url), ParamsRemark::NORMAL_MENU_RES);
    }

    /**
     * 菜单删除
     * @return string
     */
    public function delete()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/delete?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url));
    }


    //获取自定义菜单配置接口
    public function get_current_selfmenu_info()
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/get_current_selfmenu_info?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlGet($url), array(),ParamsRemark::MENU_CONFIGURATION_RES);
    }

    // endregion

    // region 个性化菜单

    //创建个性化菜单
    public function addconditional(array $menus)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/addconditional?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, $menus), ParamsRemark::CONDITIONAL_MENU_RES);
    }

    /**
     * 删除个性化菜单
     * @param $menuid  - menuid为菜单id，可以通过自定义菜单查询接口获取。
     * @return mixed
     */
    public function delconditional($menuid)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/delconditional?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, array("menuid"=>$menuid)));
    }

    /**
     * 测试个性化菜单匹配结果
     * @param $user_id - user_id可以是粉丝的OpenID，也可以是粉丝的微信号。
     * @return mixed
     */
    public function trymatch($user_id)
    {
        $url = $this->WechatApiBaseURL.'cgi-bin/menu/trymatch?access_token='.$this->access_token;

        return $this->httpRespToArray($this->curlPost($url, array("user_id"=>$user_id)));
    }

    // endregion

}