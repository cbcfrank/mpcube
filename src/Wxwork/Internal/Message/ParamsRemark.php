<?php
namespace Mpcube\Wxwork\Internal\Message;

class ParamsRemark
{

    const MESSAGE_SEND_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
    );

    const MESSAGE_SEND_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'invaliduser' => array('memo'=>'不合法的userid，不区分大小写，统一转为小写'),
        'invalidparty' => array('memo'=>'不合法的partyid'),
        'invalidtag' => array('memo'=>'不合法的标签id'),
        'unlicenseduser' => array('memo'=>'没有基础接口许可(包含已过期)的userid'),
        'msgid' => array('memo'=>'消息id，用于撤回应用消息'),
        'response_code' => array('memo'=>'仅消息类型为“按钮交互型”，“投票选择型”和“多项选择型”的模板卡片消息返回，应用可使用response_code调用更新模版卡片消息接口，72小时内有效，且只能使用一次'),
    );

//    const DEPARTMENT_SIMPLE_LIST_REQ = array(
//        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
//        'id' => array('required'=>'否', 'memo'=>'部门id。获取指定部门及其下的子部门（以及子部门的子部门等等，递归）。 如果不填，默认获取全量组织架构'),
//    );
//
//    const DEPARTMENT_SIMPLE_LIST_RES = array(
//        'errcode' => array('memo'=>'返回码'),
//        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
//        'department_id' => array('memo'=>'部门列表数据。'),
//        'id' => array('memo'=>'创建的部门id'),
//        'parentid' => array('memo'=>'父部门id。根部门为1'),
//        'order' => array('memo'=>'在父部门中的次序值。order值大的排序靠前。值范围是[0, 2^32)'),
//    );
//
//
//    const DEPARTMENT_GET_REQ = array(
//        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
//        'id' => array('required'=>'是', 'memo'=>'部门id。获取指定部门及其下的子部门（以及子部门的子部门等等，递归）。 如果不填，默认获取全量组织架构'),
//    );
//
//    const DEPARTMENT_GET_RES = array(
//        'errcode' => array('memo'=>'返回码'),
//        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
//        'department' => array('memo'=>'部门列表数据。'),
//        'id' => array('memo'=>'创建的部门id'),
//        'name' => array('memo'=>'部门名称，代开发自建应用需要管理员授权才返回；此字段从2019年12月30日起，对新创建第三方应用不再返回，2020年6月30日起，对所有历史第三方应用不再返回name，返回的name字段使用id代替，后续第三方仅通讯录应用可获取，未返回名称的情况需要通过通讯录展示组件来展示部门名称'),
//        'name_en' => array('memo'=>'英文名称，此字段从2019年12月30日起，对新创建第三方应用不再返回，2020年6月30日起，对所有历史第三方应用不再返回该字段'),
//        'department_leader' => array('memo'=>'部门负责人的UserID；第三方仅通讯录应用可获取'),
//        'parentid' => array('memo'=>'父部门id。根部门为1'),
//        'order' => array('memo'=>'在父部门中的次序值。order值大的排序靠前。值范围是[0, 2^32)'),
//    );

}
