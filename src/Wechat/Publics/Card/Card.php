<?php
namespace Mpcube\Wechat\Publics\Card;

use Mpcube\Wechat\Publics\Common;
use Mpcube\Wechat\Publics\MagicGetSet;
use Mpcube\Wechat\Publics\Singleton;

class Card
{
    use Common, Singleton, MagicGetSet;

    private $_card_info = array();
    private $_base_info = array();
    private $_advanced_info = array();

    // region base_info

    public function setBaseInfo($logo_url, $code_type, $brand_name, $title, $color, $notice, $description, $sku, $quantity,
                                $date_info, $type, $begin_timestamp, $end_timestamp, $fixed_term, $fixed_begin,
                                $use_custom_code=false, $get_custom_code_mode='', $bind_openid=false, $service_phone='',
                                array $location_id_list=array(), $use_all_locations=true, $center_title='', $center_sub_title='',
                                $center_url='', $center_app_brand_user_name='', $center_app_brand_pass='', $custom_url_name='',
                                $custom_url='', $custom_url_sub_title='', $custom_app_brand_user_name='', $custom_app_brand_pass='',
                                $promotion_url_name='', $promotion_url='', $promotion_url_sub_title='', $promotion_app_brand_user_name='',
                                $promotion_app_brand_pass='', $get_limit=50, $use_limit=50, $can_share=false, $can_give_friend=false)
    {
        $arr = compact('logo_url', 'code_type', 'brand_name', 'title', 'color', 'notice',
                                    'description', 'sku', 'quantity', 'date_info', 'type', 'begin_timestamp', 'end_timestamp',
                                    'fixed_term', 'fixed_begin', 'use_custom_code', 'get_custom_code_mode',
                                    'bind_openid', 'service_phone', 'location_id_list', 'use_all_locations', 'center_title',
                                    'center_sub_title', 'center_url', 'center_app_brand_user_name', 'center_app_brand_pass',
                                    'custom_url_name', 'custom_url', 'custom_url_sub_title', 'custom_app_brand_user_name',
                                    'custom_app_brand_pass', 'promotion_url_name', 'promotion_url', 'promotion_url_sub_title',
                                    'promotion_app_brand_user_name', 'promotion_app_brand_pass', 'get_limit', 'use_limit',
                                    'can_share', 'can_give_friend');

        $arr = array_filter($arr);

        //设置本卡券支持全部门店，与location_id_list互斥
        if (!empty($location_id_list)) {
            $arr['use_all_locations'] = false;
        }

        $this->_base_info = array("base_info" => $arr);

        return $this;
    }

    // endregion

    // region advanced_info

//    public function setAdvancedInfo(array $advanced_info=array())
//    {
//        $this->_advanced_info = array("advanced_info" => $advanced_info);
//
//        return $this;
//    }

//    public function setAdvancedInfo($accept_category='', $reject_category='', $least_cost='', $object_use_for='',
//                                    $can_use_with_other_discount='', $abstract='', $icon_url_list='', array $text_image_list=array(),
//                                    array $business_service=array(), array $time_limit=array())
//    {
//        $arr = array(
//            "use_condition" => array_filter(compact('accept_category', 'reject_category', 'least_cost', 'object_use_for', 'can_use_with_other_discount')),
//            "abstract" => array(
//                "abstract" => $abstract,
//                "icon_url_list" => $icon_url_list,
//            ),
//            "text_image_list" => $text_image_list,
//            "time_limit" => $time_limit,
////                array(
////                   array(
////                       "type" => "MONDAY",
////                       "begin_hour" => 0,
////                       "end_hour" => 10,
////                       "begin_minute" => 10,
////                       "end_minute" => 59
////                    ),
////                   array(
////                       "type" => "HOLIDAY"
////                    )
////                ),
//            "business_service" => $business_service,
//        );
//
//        $this->_advanced_info = array("advanced_info" => $arr);
//
//        return $this;
//    }


    // endregion

    // region 券

    /**
     * 团购券
     * @param string $deal_detail //团购券专用，团购详情。
     * @return $this
     */
    public function setGroupon($deal_detail)
    {
        $this->_card_info = array(
            "card" => array(
                "card_type" => CardType::GROUPON,
                strtolower(CardType::GROUPON) => array(
                    "base_info" => $this->_base_info,
                    "advanced_info" => $this->_advanced_info,
                    "deal_detail" => $deal_detail,
                    ),
            )
        );
        return $this;
    }

    /**
     * 代金券
     * @param int $least_cost 代金券专用，表示起用金额（单位为分）,如果无起用门槛则填0。
     * @param int $reduce_cost 代金券专用，表示减免金额。（单位为分）
     * @return $this
     */
    public function setCash($least_cost, $reduce_cost)
    {
        $this->_card_info = array(
            "card" => array(
                "card_type" => CardType::CASH,
                strtolower(CardType::CASH) => array(
                    "base_info" => $this->_base_info,
                    "advanced_info" => $this->_advanced_info,
                    "least_cost" => $least_cost,
                    "reduce_cost" => $reduce_cost,
                ),
            )
        );
        return $this;
    }

    /**
     * 折扣券
     * @param int $discount 折扣券专用，表示打折额度（百分比）。填30就是七折。
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->_card_info = array(
            "card" => array(
                "card_type" => CardType::DISCOUNT,
                strtolower(CardType::DISCOUNT) => array(
                    "base_info" => $this->_base_info,
                    "advanced_info" => $this->_advanced_info,
                    "discount" => $discount
                ),
            )
        );
        return $this;
    }

    /**
     * 兑换券
     * @param string $gift 兑换券专用，填写兑换内容的名称。
     * @return $this
     */
    public function setGift($gift)
    {
        $this->_card_info = array(
            "card" => array(
                "card_type" => CardType::GIFT,
                strtolower(CardType::GIFT) => array(
                    "base_info" => $this->_base_info,
                    "advanced_info" => $this->_advanced_info,
                    "discount" => $gift
                ),
            )
        );
        return $this;
    }

    /**
     * 优惠券
     * @param string $default_detail 优惠券专用，填写优惠详情。
     * @return $this
     */
    public function setGeneralCoupon($default_detail)
    {
        $this->_card_info = array(
            "card" => array(
                "card_type" => CardType::GIFT,
                strtolower(CardType::GIFT) => array(
                    "base_info" => $this->_base_info,
                    "advanced_info" => $this->_advanced_info,
                    "default_detail" => $default_detail
                ),
            )
        );
        return $this;
    }

    // endregion

    // region 创建卡券

    //步骤一：上传卡券图片素材
    //步骤二：设置卡券适用门店
    //步骤三：选取卡券背景颜色
    //步骤四：创建卡券
    public function create()
    {
        $url = $this->WechatApiBaseURL.'card/create?access_token='.$this->access_token;
        return $this->httpRespToArray($this->curlPost($url, $this->_card_info));
    }

    //设置买单接口
    //创建卡券之后，开发者可以通过设置微信买单接口设置该card_id支持微信买单功能。值得开发者注意的是，设置买单的card_id必须已经配置了门店，否则会报错。
    //注意事项：
    //1.设置快速买单的卡券须支持至少一家有核销员门店，否则无法设置成功；
    //2.若该卡券设置了center_url（居中使用跳转链接）,须先将该设置更新为空后再设置自快速买单方可生效。
    public function setPaycell($card_id, $is_open)
    {
        $url = $this->WechatApiBaseURL.'card/paycell/set?access_token='.$this->access_token;

        $arr = compact('card_id', 'is_open');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CARD_PAYCELL_SET_REQ);
    }

    //设置自助核销接口
    //创建卡券之后，开发者可以通过设置微信买单接口设置该card_id支持自助核销功能。值得开发者注意的是，设置自助核销的card_id必须已经配置了门店，否则会报错。
    //注意事项：
    //1.设置自助核销的卡券须支持至少一家门店，否则无法设置成功；
    //2.若该卡券设置了center_url（居中使用跳转链接）,须先将该设置更新为空后再设置自助核销功能方可生效。
    public function setSelfConsumeCell($card_id, $is_open, $need_verify_cod=false, $need_remark_amount=false)
    {
        $url = $this->WechatApiBaseURL.'card/selfconsumecell/set?access_token='.$this->access_token;

        $arr = compact('card_id', 'is_open', 'need_verify_cod', 'need_remark_amount');

        return $this->httpRespToArray($this->curlPost($url, $arr), ParamsRemark::CARD_SELFCONSUMECELL_SET_REQ);
    }

    // endregion
}