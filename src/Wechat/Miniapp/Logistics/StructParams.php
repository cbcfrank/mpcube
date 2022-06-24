<?php

namespace Mpcube\Wechat\Miniapp\Logistics;

use Mpcube\Common\Singleton;

class StructParams
{
    use Singleton;

    private $_params = array();

    /* sender 的结构
    属性	         类型	  默认值	必填	说明
    name	    string		    是	发件人姓名，不超过64字节
    tel	        string	     	否	发件人座机号码，若不填写则必须填写 mobile，不超过32字节
    mobile	    string	    	否	发件人手机号码，若不填写则必须填写 tel，不超过32字节
    company	    string	    	否	发件人公司名称，不超过64字节
    post_code	string	    	否	发件人邮编，不超过10字节
    country	    string	    	否	发件人国家，不超过64字节
    province	string	    	是	发件人省份，比如："广东省"，不超过64字节
    city	    string	    	是	发件人市/地区，比如："广州市"，不超过64字节
    area	    string	    	是	发件人区/县，比如："海珠区"，不超过64字节
    address	    string	    	是	发件人详细地址，比如："XX路 XX 号XX大厦XX"，不超过512字节
     */
    public function senderOfAddOrder($name, $tel, $mobile, $company, $post_code, $country, $province, $city, $area, $address)
    {
        $this->_params['sender'] = compact('name', 'tel', 'mobile', 'company', 'post_code', 'country', 'province', 'city', 'area', 'address');
        return $this;
    }

    /* receiver 的结构
    属性	        类型	    默认值	必填	说明
    name	    string	    	是	收件人姓名，不超过64字节
    tel	        string		    否	收件人座机号码，若不填写则必须填写 mobile，不超过32字节
    mobile	    string	    	否	收件人手机号码，若不填写则必须填写 tel，不超过32字节
    company	    string		    否	收件人公司名，不超过64字节
    post_code	string  		否	收件人邮编，不超过10字节
    country	    string	    	否	收件人所在国家，不超过64字节
    province	string		    是	收件人省份，比如："广东省"，不超过64字节
    city	    string	    	是	收件人地区/市，比如："广州市"，不超过64字节
    area	    string	    	是	收件人区/县，比如："天河区"，不超过64字节
    address	    string		    是	收件人详细地址，比如："XX路 XX 号XX大厦XX"，不超过512字节
    */
    public function receiverOfAddOrder($name, $tel, $mobile, $company, $post_code, $country, $province, $city, $area, $address)
    {
        $this->_params['receiver'] = compact('name', 'tel', 'mobile', 'company', 'post_code', 'country', 'province', 'city', 'area', 'address');
        return $this;
    }

    /* cargo 的结构
    属性	        类型	            默认值	必填	说明
    count	    number		            是	包裹数量, 默认为1
    weight	    number		            是	包裹总重量，单位是千克(kg)
    space_x	    number	            	是	包裹长度，单位厘米(cm)
    space_y	    number	            	是	包裹宽度，单位厘米(cm)
    space_z	    number		            是	包裹高度，单位厘米(cm)
    detail_list	Array.<Object>		    是	包裹中商品详情列表
    */

    public function cargoOfAddOrder($count, $weight, $space_x=1, $space_y=1, $space_z=1, array $detail_list=[])
    {
        $this->_params['cargo'] = compact('count', 'weight', 'space_x', 'space_y', 'space_z', 'detail_list');
        return $this;
    }

    /* cargo.detail_list 的结构
    属性	    类型	    默认值	必填	说明
    name	string	    	是	商品名，不超过128字节
    count	number		    是	商品数量
     */
    public function detailListCargoOfAddOrder($name, $count)
    {
        $this->_params['cargo']['detail_list'][] = compact('name', 'count');
        return $this;
    }

    /* shop 的结构
    属性	        类型	        默认值	必填	说明
    wxa_path	string		        是	商家小程序的路径，建议为订单页面
    img_url	    string		        否	商品缩略图 url；shop.detail_list为空则必传，shop.detail_list非空可不传。
    goods_name	string		        否	商品名称, 不超过128字节；shop.detail_list为空则必传，shop.detail_list非空可不传。
    goods_count	number		        否	商品数量；shop.detail_list为空则必传。shop.detail_list非空可不传，默认取shop.detail_list的size
    detail_list	Array.<Object>		否	商品详情列表，适配多商品场景，用以消息落地页展示。（新规范，新接入商家建议用此字段）
    */
    public function shopOfAddOrder($wxa_path, $img_url=null, $goods_name=null, $goods_count=null, array $detail_list=[])
    {
        $this->_params['shop'] = array_filter(compact('wxa_path', 'img_url', 'goods_name', 'goods_count', 'detail_list'));
        return $this;
    }

    /*shop.detail_list 的结构
    属性	            类型	    默认值	必填	说明
    goods_name	    string	    	否	商品名称, 最多40汉字
    goods_img_url	string		    否	商品图片url
    goods_desc	    string		    否	商品详情描述, 最多40汉字
    */
    public function detailListShopOfAddOrder($goods_name, $goods_img_url, $goods_desc)
    {
        $this->_params['shop']['detail_list'][] = compact('goods_name', 'goods_img_url', 'goods_desc');
        return $this;
    }

    /* insured 的结构
    属性	            类型	    默认值	必填	说明
    use_insured	    number	    	是	是否保价，0 表示不保价，1 表示保价
    insured_value	number		    是	保价金额，单位是分，比如: 10000 表示 100 元（注：如果不保价，那保价金额填 0 即可）
    */
    public function insuredOfAddOrder($use_insured, $insured_value)
    {
        $this->_params['insured'] = compact('use_insured', 'insured_value');
        return $this;
    }

    /* service 的结构
    属性	            类型	    默认值	必填	说明
    service_type	number	    	是	服务类型ID，详见已经支持的快递公司基本信息
    service_name	string		    是	服务名称，详见已经支持的快递公司基本信息
    */
    public function serviceOfAddOrder($service_type, $service_name)
    {
        $this->_params['service'] = compact('service_type', 'service_name');
        return $this;
    }

    public function deliveryIdOfAddOrder($delivery_id)
    {
        $this->_params['delivery_id'] = $delivery_id;
        return $this;
    }

    public function bizIdOfAddOrder($biz_id)
    {
        $this->_params['biz_id'] = $biz_id;
        return $this;
    }

    public function addSourceOfAddOrder($add_source)
    {
        $this->_params['add_source'] = $add_source;
        return $this;
    }

    public function wxAppidOfAddOrder($wx_appid)
    {
        $this->_params['wx_appid'] = $wx_appid;
        return $this;
    }

    public function orderIdOfAddOrder($order_id)
    {
        $this->_params['order_id'] = $order_id;
        return $this;
    }

    public function openIdOfAddOrder($openid)
    {
        $this->_params['openid'] = $openid;
        return $this;
    }

    public function customRemarkOfAddOrder($custom_remark)
    {
        $this->_params['custom_remark'] = $custom_remark;
        return $this;
    }

    public function expectTimeOfAddOrder($expect_time)
    {
        $this->_params['expect_time'] = $expect_time;
        return $this;
    }

    public function takeModeOfAddOrder($take_mode)
    {
        $this->_params['take_mode'] = $take_mode;
        return $this;
    }

    public function tagidOfAddOrder($tagid)
    {
        $this->_params['tagid'] = $tagid;
        return $this;
    }

    public function finish()
    {
        return $this->_params;
    }
}