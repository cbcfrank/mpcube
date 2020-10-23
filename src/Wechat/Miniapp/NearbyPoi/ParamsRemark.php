<?php
namespace Mpcube\Wechat\Miniapp\NearbyPoi;

class ParamsRemark
{
    const NEARBYPOI_GETLIST_REQ = array(
        'access_token' => array('required'=>'是', 'memo'=>'接口调用凭证'),
        'page' => array('required'=>'是', 'memo'=>'起始页id（从1开始计数）'),
        'page_rows' => array('required'=>'否', 'memo'=>'每页展示个数（最多1000个）'),
    );

    const NEARBYPOI_GETLIST_RES = array(
        'data' => array(
            'left_apply_num'=>'剩余可添加地点个数',
            'max_apply_num'=>'最大可添加地点个数',
            'data'=>array(
                'poi_id'=>'附近地点 ID',
                'qualification_address'=>'资质证件地址',
                'qualification_num'=>'资质证件证件号',
                'audit_status'=>'地点审核状态, 3-审核中/4-审核失败/5-审核通过',
                'display_status'=>'地点展示在附近状态, 0-未展示/1-展示中',
                'refuse_reason'=>'审核失败原因，audit_status=4 时返回',
            ),
        ),
    );

}