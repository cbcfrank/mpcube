<?php
namespace Mpcube\Wxwork\Internal\ExternalContact;

class ParamsRemark
{

    const EXTERNALCONTACT_LIST_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'userid' => array('required'=>'是', 'memo'=>'企业成员的userid'),
    );

    const EXTERNALCONTACT_LIST_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'external_userid' => array('memo'=>'外部联系人的userid列表'),
    );

    const EXTERNALCONTACT_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'external_userid' => array('required'=>'是', 'memo'=>'外部联系人的userid，注意不是企业成员的帐号'),
        'cursor' => array('required'=>'否', 'memo'=>'上次请求返回的next_cursor'),
    );

    const EXTERNALCONTACT_GET_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'external_userid' => array('memo'=>'外部联系人的userid。'),
        'name' => array('memo'=>'外部联系人的名称'),
        'avatar' => array('memo'=>'外部联系人头像，代开发自建应用需要管理员授权才可以获取，第三方不可获取，上游企业不可获取下游企业客户该字段'),
        'type' => array('memo'=>'外部联系人的类型，1表示该外部联系人是微信用户，2表示该外部联系人是企业微信用户'),
        'gender' => array('memo'=>'外部联系人性别 0-未知 1-男性 2-女性。第三方不可获取，上游企业不可获取下游企业客户该字段，返回值为0，表示未定义'),
        'unionid' => array('memo'=>'外部联系人在微信开放平台的唯一身份标识（微信unionid），通过此字段企业可将外部联系人与公众号/小程序用户关联起来。仅当联系人类型是微信用户，且企业绑定了微信开发者ID有此字段。查看绑定方法。第三方不可获取，上游企业不可获取下游企业客户的unionid字段'),
        'position' => array('memo'=>'外部联系人的职位，如果外部企业或用户选择隐藏职位，则不返回，仅当联系人类型是企业微信用户时有此字段'),
        'corp_name' => array('memo'=>'外部联系人所在企业的简称，仅当联系人类型是企业微信用户时有此字段'),
        'corp_full_name' => array('memo'=>'外部联系人所在企业的主体名称，仅当联系人类型是企业微信用户时有此字段。仅企业自建应用可获取；第三方应用、代开发应用、上下游应用不可获取，返回内容为企业名称，即corp_name。'),
        'external_profile' => array('memo'=>'外部联系人的自定义展示信息，可以有多个字段和多种类型，包括文本，网页和小程序，仅当联系人类型是企业微信用户时有此字段，字段详情见对外属性；'),
        'follow_user' => array(
            'userid' => array('memo'=>'外部联系人的自定义展示信息，可以有多个字段和多种类型，包括文本，网页和小程序，仅当联系人类型是企业微信用户时有此字段，字段详情见对外属性；'),
            'remark' => array('memo'=>'该成员对此外部联系人的备注'),
            'description' => array('memo'=>'该成员对此外部联系人的备注'),
            'createtime' => array('memo'=>'该成员添加此外部联系人的时间'),
            'group_name' => array('memo'=>'该成员添加此外部联系人所打标签的分组名称（标签功能需要企业微信升级到2.7.5及以上版本）'),
            'tag_name' => array('memo'=>'该成员添加此外部联系人所打标签名称'),
            'type' => array('memo'=>'该成员添加此外部联系人所打标签类型, 1-企业设置，2-用户自定义，3-规则组标签（仅系统应用返回）'),
            'tag_id' => array('memo'=>'该成员添加此外部联系人所打企业标签的id，用户自定义类型标签（type=2）不返回'),
            'remark_corp_name' => array('memo'=>'该成员对此微信客户备注的企业名称（仅微信客户有该字段）'),
            'remark_mobiles' => array('memo'=>'该成员对此客户备注的手机号码，代开发自建应用需要管理员授权才可以获取，第三方不可获取，上游企业不可获取下游企业客户该字段'),
            'add_way' => array('memo'=>'该成员添加此客户的来源，具体含义详见来源定义https://developer.work.weixin.qq.com/document/path/92114#%E6%9D%A5%E6%BA%90%E5%AE%9A%E4%B9%89'),
            'wechat_channels' => array(
                'nickname' => array('memo'=>'该成员添加此客户的来源add_way为10时，对应的视频号信息'),
                'source' => array('memo'=>'视频号添加场景，0-未知 1-视频号主页 2-视频号直播间（微信版本要求：iOS ≥ 8.0.20，Android ≥ 8.0.21，且添加时间不早于2022年4月21日。否则添加场景值为0）'),
            ),
            'oper_userid' => array('memo'=>'发起添加的userid，如果成员主动添加，为成员的userid；如果是客户主动添加，则为客户的外部联系人userid；如果是内部成员共享/管理员分配，则为对应的成员/管理员userid'),
            'state' => array('memo'=>'企业自定义的state参数，用于区分客户具体是通过哪个「联系我」添加，由企业通过创建「联系我」方式指定'),
        ),
        'next_cursor' => array('memo'=>'分页的cursor，当跟进人多于500人时返回'),
    );

    const BATCH_GET_BY_USER_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'userid_list' => array('required'=>'是', 'memo'=>'企业成员的userid列表，字符串类型，最多支持100个'),
        'cursor' => array('required'=>'否', 'memo'=>'用于分页查询的游标，字符串类型，由上一次调用返回，首次调用可不填'),
        'limit' => array('required'=>'否', 'memo'=>'返回的最大记录数，整型，最大值100，默认值50，超过最大值时取最大值'),
    );

    const BATCH_GET_BY_USER_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'external_contact_list' => array(
            'external_contact' => array('memo'=>'客户的基本信息，可以参考获取客户详情https://developer.work.weixin.qq.com/document/path/92994#13878'),
            'follow_info' => array('memo'=>'企业成员客户跟进信息，可以参考获取客户详情https://developer.work.weixin.qq.com/document/path/92994#13878，但标签信息只会返回企业标签和规则组标签的tag_id，个人标签将不再返回'),
        ),
        'next_cursor' => array('分页游标，再下次请求时填写以获取之后分页的记录，如果已经没有更多的数据则返回空'),
    );

    const REMARK_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'userid' => array('required'=>'是', 'memo'=>'企业成员的userid'),
        'external_userid' => array('required'=>'是', 'memo'=>'外部联系人userid'),
        'remark' => array('required'=>'否', 'memo'=>'此用户对外部联系人的备注，最多20个字符'),
        'description' => array('required'=>'否', 'memo'=>'此用户对外部联系人的描述，最多150个字符，remark，description，remark_company，remark_mobiles和remark_pic_mediaid不可同时为空。'),
        'remark_company' => array('required'=>'否', 'memo'=>'此用户对外部联系人备注的所属公司名称，最多20个字符，remark_company只在此外部联系人为微信用户时有效。'),
        'remark_mobiles' => array('required'=>'否', 'memo'=>'此用户对外部联系人备注的手机号，如果填写了remark_mobiles，将会覆盖旧的备注手机号。如果要清除所有备注手机号,请在remark_mobiles填写一个空字符串("")。'),
        'remark_pic_mediaid' => array('required'=>'否', 'memo'=>'备注图片的mediaid，remark_pic_mediaid可以通过素材管理https://developer.work.weixin.qq.com/document/path/92115#10112接口获得。'),
    );

    const REMARK_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
    );

    const GET_CORP_TAG_LIST_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'tag_id' => array('required'=>'否', 'memo'=>'要查询的标签id,若tag_id和group_id均为空，则返回所有标签。'),
        'group_id' => array('required'=>'否', 'memo'=>'要查询的标签组id，返回该标签组以及其下的所有标签信息,同时传递tag_id和group_id时，忽略tag_id，仅以group_id作为过滤条件。'),
    );

    const GET_CORP_TAG_LIST_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'tag_group' => array(
            'group_id' => array('memo'=>'标签组id'),
            'group_name' => array('memo'=>'标签组名称'),
            'create_time' => array('memo'=>'标签组创建时间'),
            'order' => array('memo'=>'标签组排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            'deleted' => array('memo'=>'标签组是否已经被删除，只在指定tag_id进行查询时返回'),
            'tag' => array(
                'id' => array('memo'=>'标签id'),
                'name' => array('memo'=>'标签名称'),
                'create_time' => array('memo'=>'标签创建时间'),
                'order' => array('memo'=>'标签排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
                'deleted' => array('memo'=>'标签是否已经被删除，只在指定tag_id/group_id进行查询时返回'),
            ),
        ),
    );

    const ADD_CORP_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'group_id' => array('required'=>'否', 'memo'=>'标签组id'),
        'group_name' => array('required'=>'否', 'memo'=>'标签组名称，最长为30个字符'),
        'order' => array('required'=>'否', 'memo'=>'标签组次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
        'tag' => array(
          'name' => array('required'=>'是', 'memo'=>'添加的标签名称，最长为30个字符'),
          'order' => array('required'=>'否', 'memo'=>'标签次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
        ),
        'agentid' => array('required'=>'否', 'memo'=>'授权方安装的应用agentid。仅旧的第三方多应用套件需要填此参数'),
    );

    const ADD_CORP_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'tag_group' => array(
            'group_id' => array('memo'=>'标签组id'),
            'group_name' => array('memo'=>'标签组名称'),
            'create_time' => array('memo'=>'标签组创建时间'),
            'order' => array('memo'=>'标签组排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            'tag' => array(
                'id' => array('memo'=>'	新建标签id'),
                'name' => array('memo'=>'新建标签名称'),
                'create_time' => array('memo'=>'标签创建时间'),
                'order' => array('memo'=>'标签排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            ),
        ),
    );

    const EDIT_CORP_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'id' => array('required'=>'是', 'memo'=>'标签或标签组的id'),
        'name' => array('required'=>'否', 'memo'=>'新的标签或标签组名称，最长为30个字符，修改后的标签组不能和已有的标签组重名，标签也不能和同一标签组下的其他标签重名。'),
        'order' => array('required'=>'否', 'memo'=>'标签/标签组的次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
        'agentid' => array('required'=>'否', 'memo'=>'授权方安装的应用agentid。仅旧的第三方多应用套件需要填此参数'),
    );

    const EDIT_CORP_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
    );

    const DEL_CORP_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'tag_id' => array('required'=>'是', 'memo'=>'标签的id列表,tag_id和group_id不可同时为空。'),
        'group_id' => array('required'=>'否', 'memo'=>'标签组的id列表,如果一个标签组下所有的标签均被删除，则标签组会被自动删除。'),
        'agentid' => array('required'=>'否', 'memo'=>'授权方安装的应用agentid。仅旧的第三方多应用套件需要填此参数'),
    );

    const DEL_CORP_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
    );

    const GET_STRATEGY_TAG_LIST_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'strategy_id' => array('required'=>'否', 'memo'=>'规则组id'),
        'tag_id' => array('required'=>'是', 'memo'=>'要查询的标签id，若tag_id和group_id均为空，则返回所有标签。'),
        'group_id' => array('required'=>'否', 'memo'=>'要查询的标签组id，返回该标签组以及其下的所有标签信息,同时传递tag_id和group_id时，忽略tag_id，仅以group_id作为过滤条件。'),
    );

    const GET_STRATEGY_TAG_LIST_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'tag_group' => array(
            'group_id' => array('memo'=>'标签组id'),
            'group_name' => array('memo'=>'标签组名称'),
            'create_time' => array('memo'=>'标签组创建时间'),
            'order' => array('memo'=>'标签组排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            'strategy_id' => array('memo'=>'标签组所属的规则组id'),
            'tag' => array(
                'id' => array('memo'=>'标签id'),
                'name' => array('memo'=>'标签名称'),
                'create_time' => array('memo'=>'标签创建时间'),
                'order' => array('memo'=>'标签排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            ),
        ),
    );

    const ADD_STRATEGY_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'strategy_id' => array('required'=>'是', 'memo'=>'规则组id'),
        'group_name' => array('required'=>'否', 'memo'=>'标签组名称，最长为30个字符，如果填写的group_name和此规则组下的其他标签组同名，则会将相关标签加入已存在的同名标签组下'),
        'group_id' => array('required'=>'否', 'memo'=>'标签组id，如果填写了group_id参数，则group_name和标签组的order参数会被忽略。不支持创建空标签组。'),
        'order' => array('required'=>'否', 'memo'=>'标签组次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
        'tag' => array(
            'name' => array('memo'=>'添加的标签名称，最长为30个字符，标签组内的标签不可同名，如果传入多个同名标签，则只会创建一个。'),
            'order' => array('memo'=>'标签次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
        ),
    );

    const ADD_STRATEGY_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'tag_group' => array(
            'group_id' => array('memo'=>'标签组id'),
            'group_name' => array('memo'=>'标签组名称'),
            'create_time' => array('memo'=>'标签组创建时间'),
            'order' => array('memo'=>'标签组排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
//            'strategy_id' => array('memo'=>'标签组所属的规则组id'),
            'tag' => array(
                'id' => array('memo'=>'标签id'),
                'name' => array('memo'=>'标签名称'),
                'create_time' => array('memo'=>'标签创建时间'),
                'order' => array('memo'=>'标签排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            ),
        ),
    );

    const EDIT_STRATEGY_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'id' => array('required'=>'是', 'memo'=>'标签或标签组的id'),
        'name' => array('required'=>'否', 'memo'=>'新的标签或标签组名称，最长为30个字符,修改后的标签组不能和已有的标签组重名，标签也不能和同一标签组下的其他标签重名'),
        'order' => array('required'=>'否', 'memo'=>'标签/标签组的次序值。order值大的排序靠前。有效的值范围是[0, 2^32)'),
    );

    const EDIT_STRATEGY_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'tag_group' => array(
            'group_id' => array('memo'=>'标签组id'),
            'group_name' => array('memo'=>'标签组名称'),
            'create_time' => array('memo'=>'标签组创建时间'),
            'order' => array('memo'=>'标签组排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
//            'strategy_id' => array('memo'=>'标签组所属的规则组id'),
            'tag' => array(
                'id' => array('memo'=>'标签id'),
                'name' => array('memo'=>'标签名称'),
                'create_time' => array('memo'=>'标签创建时间'),
                'order' => array('memo'=>'标签排序的次序值，order值大的排序靠前。有效的值范围是[0, 2^32)'),
            ),
        ),
    );

    const DEL_STRATEGY_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'tag_id' => array('required'=>'否', 'memo'=>'标签的id列表,tag_id和group_id不可同时为空'),
        'group_id' => array('required'=>'否', 'memo'=>'标签组的id列表,如果一个标签组下所有的标签均被删除，则标签组会被自动删除。'),
    );

    const DEL_STRATEGY_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
    );

    const MARK_TAG_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'userid' => array('required'=>'否', 'memo'=>'添加外部联系人的userid'),
        'external_userid' => array('required'=>'否', 'memo'=>'外部联系人userid'),
        'add_tag' => array('required'=>'否', 'memo'=>'要标记的标签列表'),
        'remove_tag' => array('required'=>'否', 'memo'=>'要移除的标签列表'),
    );

    const MARK_TAG_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
    );

    const CUSTOMER_STRATEGY_LIST_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'cursor' => array('required'=>'否', 'memo'=>'用于分页查询的游标，字符串类型，由上一次调用返回，首次调用可不填'),
        'limit' => array('required'=>'否', 'memo'=>'返回的最大记录数，整型，最大值100，默认值50，超过最大值时取最大值'),
    );

    const CUSTOMER_STRATEGY_LIST_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'strategy_id' =>  array('memo'=>'规则组id'),
        'next_cursor' => array('分页游标，用于查询下一个分页的数据，无更多数据时不返回'),
    );

    const CUSTOMER_STRATEGY_GET_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'调用接口凭据'),
        'strategy_id' => array('required'=>'是', 'memo'=>'规则组id'),
    );

    const CUSTOMER_STRATEGY_GET_RES = array(
        'errcode' => array('memo'=>'返回码'),
        'errmsg' => array('memo'=>'对返回码的文本描述内容'),
        'strategy_id' =>  array('memo'=>'规则组id'),
        'parent_id' => array('父规则组id， 如果当前规则组没父规则组，则为0'),
        'strategy_name' => array('规则组名称'),
        'create_time' => array('规则组创建时间戳'),
        'admin_list' => array('规则组管理员userid列表'),
        'privilege' => array(
            'view_customer_list' => array('查看客户列表，基础权限，不可取消'),
            'view_customer_data' => array('查看客户统计数据，基础权限，不可取消'),
            'view_room_list' => array('查看群聊列表，基础权限，不可取消'),
            'join_room' => array('可加入群聊，基础权限，不可取消'),
            'share_customer' => array('允许分享客户给其他成员，默认为true'),
            'oper_resign_customer' => array('允许分配离职成员客户，默认为true'),
            'oper_resign_group' => array('允许分配离职成员客户群，默认为true'),
            'send_customer_msg' => array('允许给企业客户发送消息，默认为true'),
            'edit_welcome_msg' => array('允许配置欢迎语，默认为true'),
            'view_behavior_data' => array('允许查看成员联系客户统计'),
            'view_room_data' => array('允许查看群聊数据统计，默认为true'),
            'send_group_msg' => array('允许发送消息到企业的客户群，默认为true'),
            'room_deduplication' => array('允许对企业客户群进行去重，默认为true'),
            'rapid_reply' => array('配置快捷回复，默认为true'),
            'onjob_customer_transfer' => array('转接在职成员的客户，默认为true'),
            'edit_anti_spam_rule' => array('编辑企业成员防骚扰规则，默认为true'),
            'export_customer_list' => array('导出客户列表，默认为true'),
            'export_customer_data' => array('导出成员客户统计，默认为true'),
            'export_customer_group_list' => array('导出成员客户统计，默认为true'),
            'manage_customer_tag' => array('导出成员客户统计，默认为true'),
        )
    );

}
