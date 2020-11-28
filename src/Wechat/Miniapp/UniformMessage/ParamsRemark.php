<?php
namespace Mpcube\Wechat\Miniapp\UniformMessage;

class ParamsRemark
{
    const UNIFORMMESSAGE_WEAPPTEMPLATEMSG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'touser' => array('required'=>'是', 'memo'=>'用户openid，可以是小程序的openid，也可以是mp_template_msg.appid对应的公众号的openid'),
        'weapp_template_msg' => array('required'=>'否', 'memo'=>'小程序模板消息相关的信息，可以参考小程序模板消息接口; 有此节点则优先发送小程序模板消息'),
        'weapp_template_msg.template_id' => array('required'=>'否', 'memo'=>'小程序模板ID'),
        'weapp_template_msg.page' => array('required'=>'否', 'memo'=>'小程序页面路径'),
        'weapp_template_msg.form_id' => array('required'=>'否', 'memo'=>'小程序模板消息formid'),
        'weapp_template_msg.data' => array('required'=>'否', 'memo'=>'小程序模板数据'),
        'weapp_template_msg.emphasis_keyword' => array('required'=>'否', 'memo'=>'小程序模板放大关键词'),
    );

    const UNIFORMMESSAGE_MPTEMPLATEMSG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'touser' => array('required'=>'是', 'memo'=>'用户openid，可以是小程序的openid，也可以是mp_template_msg.appid对应的公众号的openid'),
        'mp_template_msg' => array('required'=>'否', 'memo'=>'公众号模板消息相关的信息，可以参考公众号模板消息接口；有此节点并且没有weapp_template_msg节点时，发送公众号模板消息'),
        'mp_template_msg.template_id' => array('required'=>'否', 'memo'=>'公众号模板id'),
        'mp_template_msg.appid' => array('required'=>'否', 'memo'=>'公众号appid，要求与小程序有绑定且同主体'),
        'mp_template_msg.url' => array('required'=>'否', 'memo'=>'公众号模板消息所要跳转的url'),
        'mp_template_msg.data' => array('required'=>'否', 'memo'=>'公众号模板消息的数据'),
        'mp_template_msg.miniprogram' => array('required'=>'否', 'memo'=>'公众号模板消息所要跳转的小程序，小程序的必须与公众号具有绑定关系'),
    );

    const UNIFORMMESSAGE_RES = array(
        'errcode' => '错误码',
        'errmsg' => '错误信息',
    );

}
