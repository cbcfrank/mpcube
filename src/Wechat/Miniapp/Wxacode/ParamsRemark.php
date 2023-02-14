<?php
namespace Mpcube\Wechat\Miniapp\Wxacode;

class ParamsRemark
{
    const QRCODE_CREATE_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'path' => array('required'=>'是', 'memo'=>'扫码进入的小程序页面路径，最大长度 128 字节，不能为空；对于小游戏，可以只传入 query 部分，来实现传参效果，如：传入 "?foo=bar"，即可在 wx.getLaunchOptionsSync 接口中的 query 参数获取到 {foo:"bar"}。'),
        'width' => array('required'=>'否', 'memo'=>'二维码的宽度，单位 px。最小 280px，最大 1280px'),
    );

    const QRCODE_CREATE_RES = array(
        'contentType' => array('memo'=>'如 image/jpeg'),
        'buffer' => array('memo'=>'返回的图片 Buffer'),
    );


    const GET_WXACODE_UNLIMIT_REQ = array(
        'access_token / cloudbase_access_token' => array('required'=>'是', 'memo'=>'接口调用凭证，该参数为 URL 参数，非 Body 参数。access_token和cloudbase_access_token二选一其中access_token可通过getAccessToken接口获得；如果是第三方代调用请传入authorizer_access_token ；cloudbase_access_token可通过getOpenData 接口获得'),
        'scene' => array('required'=>'是', 'memo'=>'最大32个可见字符，只支持数字，大小写英文以及部分特殊字符：!#$&\'()*+,/:;=?@-._~，其它字符请自行编码为合法字符（因不支持%，中文无法使用 urlencode 处理，请使用其他编码方式）'),
        'page' => array('required'=>'否', 'memo'=>'默认是主页，页面 page，例如 pages/index/index，根路径前不要填加 /，不能携带参数（参数请放在 scene 字段里），如果不填写这个字段，默认跳主页面。'),
        'check_path' => array('required'=>'否', 'memo'=>'默认是true，检查page 是否存在，为 true 时 page 必须是已经发布的小程序存在的页面（否则报错）；为 false 时允许小程序未发布或者 page 不存在， 但page 有数量上限（60000个）请勿滥用。'),
        'env_version' => array('required'=>'否', 'memo'=>'要打开的小程序版本。正式版为 "release"，体验版为 "trial"，开发版为 "develop"。默认是正式版。'),
        'width' => array('required'=>'否', 'memo'=>'默认430，二维码的宽度，单位 px，最小 280px，最大 1280px'),
        'auto_color' => array('required'=>'否', 'memo'=>'自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调，默认 false'),
        'line_color' => array('required'=>'否', 'memo'=>'默认是{"r":0,"g":0,"b":0} 。auto_color 为 false 时生效，使用 rgb 设置颜色 例如 {"r":"xxx","g":"xxx","b":"xxx"} 十进制表示'),
        'is_hyaline' => array('required'=>'否', 'memo'=>'默认是false，是否需要透明底色，为 true 时，生成透明底色的小程序'),
    );

    const GET_WXACODE_UNLIMIT_RES = array(
        'contentType' => array('memo'=>'如 image/jpeg'),
        'buffer' => array('memo'=>'返回的图片 Buffer'),
//        'errcode' => array('memo'=>'失败时返回错误码'),
//        'errmsg' => array('memo'=>'	失败时返回错误信息'),
    );


    const QUERYSCHEME_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证，该参数为 URL 参数，非 Body 参数。使用access_token或者authorizer_access_token'),
        'scheme' => array('required'=>'是', 'memo'=>'小程序 scheme 码'),
    );

    const QUERYSCHEME_RES = array(
        'scheme_info' => array(
            'appid'=>'小程序 appid',
            'path'=>'小程序页面路径',
            'query'=>'小程序页面query',
            'create_time'=>'创建时间，为 Unix 时间戳',
            'expire_time'=>'到期失效时间，为 Unix 时间戳，0 表示永久生效',
            'env_version'=>'要打开的小程序版本。正式版为"release"，体验版为"trial"，开发版为"develop"',
        ),
        'scheme_quota' => array(
            'long_time_used'=>'长期有效 scheme 已生成次数',
            'long_time_limit'=>'长期有效 scheme 生成次数上限',
        ),
    );


    const GENERATE_SCHEME_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证，该参数为 URL 参数，非 Body 参数。使用access_token或者authorizer_access_token'),
        'jump_wxa' => array('required'=>'否', 'jump_wxa'=>array(
            'path' => array('required'=>'否', 'memo'=>'通过 scheme 码进入的小程序页面路径，必须是已经发布的小程序存在的页面，不可携带 query。path 为空时会跳转小程序主页。'),
            'query' => array('required'=>'否', 'memo'=>'通过 scheme 码进入小程序时的 query，最大1024个字符，只支持数字，大小写英文以及部分特殊字符：`!#$&\'()*+,/:;=?@-._~%``'),
            'env_version' => array('required'=>'否', 'memo'=>'默认值"release"。要打开的小程序版本。正式版为"release"，体验版为"trial"，开发版为"develop"，仅在微信外打开时生效。'),
        )),
        'is_expire' => array('required'=>'否', 'memo'=>'默认值false。生成的 scheme 码类型，到期失效：true，永久有效：false。注意，永久有效 scheme 和有效时间超过180天的到期失效 scheme 的总数上限为10万个，详见获取 URL scheme，生成 scheme 码前请仔细确认。'),
        'expire_time' => array('required'=>'否', 'memo'=>'到期失效的 scheme 码的失效时间，为 Unix 时间戳。生成的到期失效 scheme 码在该时间前有效。最长有效期为1年。is_expire 为 true 且 expire_type 为 0 时必填'),
        'expire_type' => array('required'=>'否', 'memo'=>'默认值0，到期失效的 scheme 码失效类型，失效时间：0，失效间隔天数：1'),
        'expire_interval' => array('required'=>'否', 'memo'=>'到期失效的 scheme 码的失效间隔天数。生成的到期失效 scheme 码在该间隔时间到达前有效。最长间隔天数为365天。is_expire 为 true 且 expire_type 为 1 时必填'),
    );

    const GENERATE_SCHEME_RES = array(
        'openlink' => array('memo'=>'生成的小程序 scheme 码'),
    );


    const QUERY_URLLINK_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证，该参数为 URL 参数，非 Body 参数。使用access_token或者authorizer_access_token'),
        'url_link' => array('required'=>'是', 'memo'=>'小程序 url_link'),
    );

    const QUERY_URLLINK_RES = array(
        'url_link_info' => array(
            'appid'=>'小程序 appid',
            'path'=>'小程序页面路径',
            'query'=>'小程序页面query',
            'create_time'=>'创建时间，为 Unix 时间戳',
            'expire_time'=>'到期失效时间，为 Unix 时间戳，0 表示永久生效',
            'env_version'=>'要打开的小程序版本。正式版为"release"，体验版为"trial"，开发版为"develop"',
        ),
        'url_link_quota' => array(
            'long_time_used'=>'长期有效 url_link 已生成次数',
            'long_time_limit'=>'长期有效 url_link 生成次数上限',
        ),
    );


    const GENERATE_URLLINK_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证，该参数为 URL 参数，非 Body 参数。使用access_token或者authorizer_access_token'),
        'path' => array('required'=>'否', 'memo'=>'通过 URL Link 进入的小程序页面路径，必须是已经发布的小程序存在的页面，不可携带 query 。path 为空时会跳转小程序主页'),
        'query' => array('required'=>'否', 'memo'=>'通过 URL Link 进入小程序时的query，最大1024个字符，只支持数字，大小写英文以及部分特殊字符：!#$&\'()*+,/:;=?@-._~%'),
        'env_version' => array('required'=>'否', 'memo'=>'默认值"release"。要打开的小程序版本。正式版为"release"，体验版为"trial"，开发版为"develop"，仅在微信外打开时生效。'),
        'is_expire' => array('required'=>'否', 'memo'=>'默认值false。生成的 URL Link 类型，到期失效：true，永久有效：false。注意，永久有效 Link 和有效时间超过180天的到期失效 Link 的总数上限为10万个，详见获取 URL Link，生成 Link 前请仔细确认。'),
        'expire_time' => array('required'=>'否', 'memo'=>'到期失效的 URL Link 的失效时间，为 Unix 时间戳。生成的到期失效 URL Link 在该时间前有效。最长有效期为1年。expire_type 为 0 必填'),
        'expire_type' => array('required'=>'否', 'memo'=>'默认值0.小程序 URL Link 失效类型，失效时间：0，失效间隔天数：1'),
        'expire_interval' => array('required'=>'否', 'memo'=>'到期失效的URL Link的失效间隔天数。生成的到期失效URL Link在该间隔时间到达前有效。最长间隔天数为365天。expire_type 为 1 必填'),
    );

    const GENERATE_URLLINK_RES = array(
        'url_link' => array('memo'=>'生成的小程序 URL Link'),
    );
}