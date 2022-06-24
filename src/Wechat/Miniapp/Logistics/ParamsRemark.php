<?php
namespace Mpcube\Wechat\Miniapp\Logistics;

class ParamsRemark
{
    const LOGISTICS_ADDORDER_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'add_source' => array('required'=>'是', 'memo'=>'订单来源，0为小程序订单，2为 App 或H5订单，填2则不发送物流服务通知'),
        'wx_appid' => array('required'=>'否', 'memo'=>'App或H5的appid，add_source=2时必填，需和开通了物流助手的小程序绑定同一 open 帐号'),
        'order_id' => array('required'=>'是', 'memo'=>'订单ID，须保证全局唯一，不超过512字节'),
        'openid' => array('required'=>'否', 'memo'=>'用户openid，当add_source=2时无需填写（不发送物流服务通知）'),
        'delivery_id' => array('required'=>'是', 'memo'=>'快递公司ID，参见getAllDelivery'),
        'biz_id' => array('required'=>'是', 'memo'=>'快递客户编码或者现付编码'),
        'custom_remark' => array('required'=>'否', 'memo'=>'快递备注信息，比如"易碎物品"，不超过1024字节'),
        'tagid' => array('required'=>'否', 'memo'=>'订单标签id，用于平台型小程序区分平台上的入驻方，tagid须与入驻方账号一一对应，非平台型小程序无需填写该字段'),
        'sender' => array('required'=>'是', 'memo'=>'发件人信息'),
        'receiver' => array('required'=>'是', 'memo'=>'收件人信息'),
        'cargo' => array('required'=>'是', 'memo'=>'包裹信息，将传递给快递公司'),
        'shop' => array('required'=>'是', 'memo'=>'商品信息，会展示到物流服务通知和电子面单中'),
        'insured' => array('required'=>'是', 'memo'=>'保价信息'),
        'service' => array('required'=>'是', 'memo'=>'服务类型'),
        'expect_time' => array('required'=>'否', 'memo'=>'Unix 时间戳, 单位秒，顺丰必须传。 预期的上门揽件时间，0表示已事先约定取件时间；否则请传预期揽件时间戳，需大于当前时间，收件员会在预期时间附近上门。例如expect_time为“1557989929”，表示希望收件员将在2019年05月16日14:58:49-15:58:49内上门取货。说明：若选择 了预期揽件时间，请不要自己打单，由上门揽件的时候打印。如果是下顺丰散单，则必传此字段，否则不会有收件员上门揽件。'),
        'take_mode' => array('required'=>'否', 'memo'=>'分单策略，【0：线下网点签约，1：总部签约结算】，不传默认线下网点签约。目前支持圆通。'),
    );

    const LOGISTICS_ADDORDER_RES = array(
        'order_id' => '订单ID，下单成功时返回',
        'waybill_id' => '运单ID，下单成功时返回',
        //'Array.<Object>	运单信息，下单成功时返回',
        'waybill_data' => array(
            'key' => '运单信息',
            'value' =>	'运单信息',
        ),
        'errcode' => '微信侧错误码，下单失败时返回',
        'errmsg' =>	'微信侧错误信息，下单失败时返回',
        'delivery_resultcode' => '快递侧错误码，下单失败时返回',
        'delivery_resultmsg' =>	'快递侧错误信息，下单失败时返回',
    );

    const LOGISTICS_GETORDER_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'order_id' => array('required'=>'是', 'memo'=>'订单 ID，需保证全局唯一'),
        'openid' => array('required'=>'否', 'memo'=>'用户openid，当add_source=2时无需填写（不发送物流服务通知）'),
        'delivery_id' => array('required'=>'是', 'memo'=>'快递公司ID，参见getAllDelivery'),
        'waybill_id' => array('required'=>'是', 'memo'=>'运单ID'),
        'print_type' => array('required'=>'否', 'memo'=>'获取打印面单类型【1：一联单，0：二联单】，默认获取二联单返回值'),
    );

    const LOGISTICS_GETORDER_RES = array(
        'print_html' => '运单 html 的 BASE64 结果',
        //'运单信息'
        'waybill_data' => array(
            'key' => '运单信息 key',
            'value' => '运单信息 value',
        ),
        'delivery_id' => '快递公司ID',
        'order_id' => '订单ID',
        'waybill_id' =>	'运单号',
        'order_status' => '运单状态, 0正常，1取消',
    );

    const LOGISTICS_CANCELORDER_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'order_id' => array('required'=>'是', 'memo'=>'订单 ID，需保证全局唯一'),
        'openid' => array('required'=>'否', 'memo'=>'用户openid，当add_source=2时无需填写（不发送物流服务通知）'),
        'delivery_id' => array('required'=>'是', 'memo'=>'快递公司ID，参见getAllDelivery'),
        'waybill_id' => array('required'=>'是', 'memo'=>'运单ID'),
    );

    const LOGISTICS_CANCELORDER_RES = array(
        'errcode' => '错误码',
        'errmsg' =>	'错误信息',
        'delivery_resultcode' => '运力返回的错误码',
        'delivery_resultmsg' =>	'运力返回的错误信息',
    );

    const LOGISTICS_GETPATH_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'order_id' => array('required'=>'是', 'memo'=>'订单 ID，需保证全局唯一'),
        'openid' => array('required'=>'否', 'memo'=>'用户openid，当add_source=2时无需填写（不发送物流服务通知）'),
        'delivery_id' => array('required'=>'是', 'memo'=>'快递公司ID，参见getAllDelivery'),
        'waybill_id' => array('required'=>'是', 'memo'=>'运单ID'),
    );

    const LOGISTICS_GETPATH_RES = array(
        'openid' => '用户openid',
        'delivery_id' => '快递公司 ID',
        'waybill_id' => '运单 ID',
        'path_item_num' =>	'轨迹节点数量',
        //'轨迹节点列表',
        'path_item_list' => array(
            'action_time' => '轨迹节点 Unix 时间戳',
            'action_type' => '轨迹节点类型',
            'action_msg' => '轨迹节点详情',
        ),
    );

    const LOGISTICS_GETALLDELIVERY_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
    );

    const LOGISTICS_GETALLDELIVERY_RES = array(
        'count' => '快递公司数量',
        'data' => array(
            'delivery_id'=>'快递公司 ID',
            'delivery_name'=>'快递公司名称',
            'can_use_cash'=>'是否支持散单, 1表示支持',
            'can_get_quota'=>'是否支持查询面单余额, 1表示支持',
            'cash_biz_id'=>'散单对应的bizid，当can_use_cash=1时有效',
            'service_type'=>array(
                'service_type'=>'服务类型ID',
                'service_name'=>'服务类型名称',
            ),
        ),
    );

}