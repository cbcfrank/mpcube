<?php
namespace Mpcube\Wechat\Publics\Template;

class ParamsRemark
{
    const API_SET_INDUSTRY_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭证'),
        'industry_id1' => array('required'=>'是', 'memo'=>'公众号模板消息所属行业编号'),
        'industry_id2' => array('required'=>'是', 'memo'=>'公众号模板消息所属行业编号'),
        'industry_memo' => array('required'=>'否', 'memo'=>array(
            '主行业/副行业/代码',
            'IT科技/互联网/电子商务/1',
            'IT科技/IT软件与服务/2',
            'IT科技/IT硬件与设备/3',
            'IT科技/电子技术/4',
            'IT科技/通信与运营商/5',
            'IT科技/网络游戏/6',
            '金融业/银行/7',
            '金融业/基金理财信托/8',
            '金融业/保险/9',
            '餐饮/餐饮/10',
            '酒店旅游/酒店/11',
            '酒店旅游/旅游/12',
            '运输与仓储/快递/13',
            '运输与仓储/物流/14',
            '运输与仓储/仓储/15',
            '教育/培训/16',
            '教育/院校/17',
            '政府与公共事业/学术科研/18',
            '政府与公共事业/交警/19',
            '政府与公共事业/博物馆/20',
            '政府与公共事业/公共事业非盈利机构/21',
            '医药护理/医药医疗/22',
            '医药护理/护理美容/23',
            '医药护理/保健与卫生/24',
            '交通工具/汽车相关/25',
            '交通工具/摩托车相关/26',
            '交通工具/火车相关/27',
            '交通工具/飞机相关/28',
            '房地产/建筑/29',
            '房地产/物业/30',
            '消费品/消费品/31',
            '商业服务/法律/32',
            '商业服务/会展/33',
            '商业服务/中介服务/34',
            '商业服务/认证/35',
            '商业服务/审计/36',
            '文体娱乐/传媒/37',
            '文体娱乐/体育/38',
            '文体娱乐/娱乐休闲/39',
            '印刷/印刷/40',
            '其它/其它/41',

        )),
    );

    const GET_INDUSTRY_RES = array(
        'primary_industry' => array('required'=>'是', 'memo'=>'帐号设置的主营行业'),
        'secondary_industry' => array('required'=>'是', 'memo'=>'帐号设置的副营行业'),
    );

    const API_ADD_TEMPLATE_RES = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'template_id_short' => array('required'=>'是', 'memo'=>'模板库中模板的编号，有“TM**”和“OPENTMTM**”等形式'),
    );

    const GET_ALL_PRIVATE_TEMPLATE_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
    );

    const GET_ALL_PRIVATE_TEMPLATE_RES = array(
        'template_id' => array('required'=>'是', 'memo'=>'模板ID'),
        'title' => array('required'=>'是', 'memo'=>'模板标题'),
        'primary_industry' => array('required'=>'是', 'memo'=>'模板所属行业的一级行业'),
        'deputy_industry' => array('required'=>'是', 'memo'=>'模板所属行业的二级行业'),
        'content' => array('required'=>'是', 'memo'=>'模板内容'),
        'example' => array('required'=>'是', 'memo'=>'模板示例'),
    );

    const DEL_PRIVATE_TEMPLATE_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'template_id_short' => array('required'=>'是', 'memo'=>'公众帐号下模板消息ID'),
    );

    const MESSAGE_TEMPLATE_SEND_REQ = array(
        'touser' => array('required'=>'是', 'memo'=>'接收者openid'),
        'template_id' => array('required'=>'是', 'memo'=>'模板ID'),
        'url' => array('required'=>'否', 'memo'=>'模板跳转链接（海外帐号没有跳转能力）'),
        'miniprogram' => array('required'=>'否', 'memo'=>'跳小程序所需数据，不需跳小程序可不用传该数据'),
        'appid' => array('required'=>'是', 'memo'=>'所需跳转到的小程序appid（该小程序appid必须与发模板消息的公众号是绑定关联关系，暂不支持小游戏）'),
        'pagepath' => array('required'=>'否', 'memo'=>'所需跳转到小程序的具体页面路径，支持带参数,（示例index?foo=bar），要求该小程序已发布，暂不支持小游戏'),
        'data' => array('required'=>'是', 'memo'=>'模板数据'),
        'color' => array('required'=>'否', 'memo'=>'模板内容字体颜色，不填默认为黑色'),
    );
}