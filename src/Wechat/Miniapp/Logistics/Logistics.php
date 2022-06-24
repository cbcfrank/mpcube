<?php

namespace Mpcube\Wechat\Miniapp\Logistics;

use Mpcube\Common\Common;
use Mpcube\Common\Singleton;

class Logistics
{
    use Common, Singleton;

    /*
     属性	                                类型	默认值	必填	说明
    access_token / cloudbase_access_token	string		是	接口调用凭证
    add_source	                            number		是	订单来源，0为小程序订单，2为 App 或H5订单，填2则不发送物流服务通知
    wx_appid	                            string		否	App或H5的appid，add_source=2时必填，需和开通了物流助手的小程序绑定同一 open 帐号
    order_id	                            string		是	订单ID，须保证全局唯一，不超过512字节
    openid	                                string		否	用户openid，当add_source=2时无需填写（不发送物流服务通知）
    delivery_id	                            string		是	快递公司ID，参见getAllDelivery
    biz_id	                                string		是	快递客户编码或者现付编码
    custom_remark                       	string		否	快递备注信息，比如"易碎物品"，不超过1024字节
    tagid	                                number		否	订单标签id，用于平台型小程序区分平台上的入驻方，tagid须与入驻方账号一一对应，非平台型小程序无需填写该字段
    sender	                                Object		是	发件人信息
    receiver	                            Object		是	收件人信息
    cargo	                                Object		是	包裹信息，将传递给快递公司
    shop	                                Object		是	商品信息，会展示到物流服务通知和电子面单中
    insured	                                Object		是	保价信息
    service	                                Object		是	服务类型
    expect_time	                            number		否	Unix 时间戳, 单位秒，顺丰必须传。 预期的上门揽件时间，0表示已事先约定取件时间；否则请传预期揽件时间戳，需大于当前时间，收件员会在预期时间附近上门。例如expect_time为“1557989929”，表示希望收件员将在2019年05月16日14:58:49-15:58:49内上门取货。说明：若选择 了预期揽件时间，请不要自己打单，由上门揽件的时候打印。如果是下顺丰散单，则必传此字段，否则不会有收件员上门揽件。
    take_mode	                            number		否	分单策略，【0：线下网点签约，1：总部签约结算】，不传默认线下网点签约。目前支持圆通。
     */
    //public function addOrder($delivery_id, $sender, $receiver, $cargo, $shop, $insured, $service, $biz_id, $add_source, $wx_appid, $order_id, $openid, $custom_remark='',$expect_time=null, $take_mode=null, $tagid=null)
    public function addOrder($params)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/express/business/order/add?&access_token={$this->access_token}";
//        $arr = compact('delivery_id', 'sender', 'receiver', 'cargo', 'shop', 'insured', 'service', 'biz_id', 'add_source','wx_appid', 'order_id', 'openid', 'custom_remark', 'expect_time', 'take_mode', 'tagid');
        $arr = $params;
//        var_dump($arr);
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::LOGISTICS_ADDORDER_REQ, ParamsRemark::LOGISTICS_ADDORDER_RES);
    }

    public function getOrder($order_id, $delivery_id, $waybill_id, $openid=null, $print_type=null)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/express/business/order/get?access_token={$this->access_token}";
        $arr = compact('order_id', 'delivery_id', 'waybill_id', 'openid', 'print_type');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::LOGISTICS_GETORDER_REQ, ParamsRemark::LOGISTICS_GETORDER_RES);
    }

    public function cancelOrder($order_id, $delivery_id, $waybill_id, $openid=null)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/express/business/order/cancel?access_token={$this->access_token}";
        $arr = compact('order_id', 'delivery_id', 'waybill_id', 'openid');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::LOGISTICS_CANCELORDER_REQ, ParamsRemark::LOGISTICS_CANCELORDER_RES);
    }

    public function getPath($order_id, $delivery_id, $waybill_id, $openid=null)
    {
        $url = $this->WechatApiBaseURL."cgi-bin/express/business/path/get?access_token={$this->access_token}";
        $arr = compact('order_id', 'delivery_id', 'waybill_id', 'openid');
        $ret = $this->curlPost($url, $arr);
        return $this->httpRespToArray($ret, ParamsRemark::LOGISTICS_GETPATH_REQ, ParamsRemark::LOGISTICS_GETPATH_RES);
    }

    public function getAllDelivery()
    {
        $url = $this->WechatApiBaseURL."cgi-bin/express/business/delivery/getall?access_token={$this->access_token}";
        $ret = $this->curlGet($url);
//        var_dump($url);
//        var_dump($ret);
        return $this->httpRespToArray($ret, ParamsRemark::LOGISTICS_GETALLDELIVERY_REQ, ParamsRemark::LOGISTICS_GETALLDELIVERY_RES);
    }
}