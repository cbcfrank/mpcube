<?php

namespace Mpcube\Wechat\Miniapp\Logistics;

class ActionTypeEnum
{
    static $at100001 = '揽件阶段 - 揽件成功';
    static $at100002 = '揽件阶段 - 揽件失败';
    static $at100003 = '揽件阶段 - 分配业务员';
    static $at200001 = '运输阶段 - 更新运输轨迹';
    static $at300002 = '派送阶段 - 开始派送';
    static $at300003 = '派送阶段 - 签收成功';
    static $at300004 = '派送阶段 - 签收失败';
    static $at400001 = '异常阶段 - 订单取消';
    static $at400002 = '异常阶段 - 订单滞留';
}
