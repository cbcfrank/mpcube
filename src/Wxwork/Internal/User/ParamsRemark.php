<?php
namespace Mpcube\Wxwork\Internal\User;

class ParamsRemark
{
    const USER_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'userid' => array('required'=>'是', 'memo'=>'成员UserID。对应管理端的帐号，企业内必须唯一。不区分大小写，长度为1~64个字节'),
    );

    const USER_GET_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'userid' => array('memo'=>'成员UserID。对应管理端的帐号，企业内必须唯一。不区分大小写，长度为1~64个字节'),
        'name' => array('memo'=>'成员名称，此字段从2019年12月30日起，对新创建第三方应用不再返回，2020年6月30日起，对所有历史第三方应用不再返回，后续第三方仅通讯录应用可获取，第三方页面需要通过通讯录展示组件来展示名字'),
        'mobile' => array('memo'=>'手机号码，第三方仅通讯录应用可获取'),
        'department' => array('memo'=>'成员所属部门id列表，仅返回该应用有查看权限的部门id'),
        'order' => array('memo'=>'部门内的排序值，默认为0。数量必须和department一致，数值越大排序越前面。值范围是[0, 2^32)'),
        'position' => array('memo'=>'职务信息；第三方仅通讯录应用可获取'),
        'gender' => array('memo'=>'性别。0表示未定义，1表示男性，2表示女性'),
        'email' => array('memo'=>'邮箱，第三方仅通讯录应用可获取'),
        'is_leader_in_dept' => array('memo'=>'表示在所在的部门内是否为上级。；第三方仅通讯录应用可获取'),
        'avatar' => array('memo'=>'头像url。 第三方仅通讯录应用可获取'),
        'thumb_avatar' => array('memo'=>'头像缩略图url。第三方仅通讯录应用可获取'),
        'telephone' => array('memo'=>'座机。第三方仅通讯录应用可获取'),
        'enable' => array('memo'=>'成员启用状态。1表示启用的成员，0表示被禁用。注意，服务商调用接口不会返回此字段'),
        'alias' => array('memo'=>'别名；第三方仅通讯录应用可获取'),
        'extattr' => array('memo'=>'扩展属性，第三方仅通讯录应用可获取'),
        'status' => array('memo'=>'激活状态: 1=已激活，2=已禁用，4=未激活。已激活代表已激活企业微信或已关注微工作台（原企业号）。未激活代表既未激活企业微信又未关注微工作台（原企业号）。'),
        'qr_code' => array('memo'=>'员工个人二维码，扫描可添加为外部联系人(注意返回的是一个url，可在浏览器上打开该url以展示二维码)；第三方仅通讯录应用可获取'),
        'external_profile' => array('memo'=>'成员对外属性，字段详情见对外属性；第三方仅通讯录应用可获取'),
        'external_position' => array('memo'=>'对外职务，如果设置了该值，则以此作为对外展示的职务，否则以position来展示。'),
        'address' => array('memo'=>'地址。'),
    );










}