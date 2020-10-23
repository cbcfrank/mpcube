<?php
//
//namespace Mpcube\Wepay;
//
//class BankCardType
//{
////8、银行类型
//
////字符型银行编码	银行名称
//
//    /** 工商银行（借记卡） */
//    const ICBC_DEBIT = 'ICBC_DEBIT';
//
//    /** 工商银行（信用卡） */
//    const ICBC_CREDIT ;
//
//    /** 农业银行（借记卡） */
//    const ABC_DEBIT;
//
//    /** 农业银行（信用卡） */
//    const ABC_CREDIT;
//
//    /** 邮储银行（信用卡） */
//    const PSBC_CREDIT;
//
//    /** 邮储银行（借记卡） */
//    const PSBC_DEBIT;
//
//    /** 建设银行（借记卡） */
//    const CCB_DEBIT;
//
//    /** 建设银行（信用卡） */
//    const CCB_CREDIT;
//
//    /** 招商银行（借记卡） */
//    const CMB_DEBIT;
//
//    /** 招商银行（信用卡） */
//    const  CMB_CREDIT;
//
//    /** 中国银行（借记卡） */
//    const BOC_DEBIT;
//
//    /** 中国银行（信用卡） */
//    const BOC_CREDIT;
//
//    /** 交通银行（借记卡） */
//    const COMM_DEBIT;
//
//    /** 交通银行（信用卡） */
//    const COMM_CREDIT;
//
//    /** 浦发银行（借记卡） */
//    const SPDB_DEBIT;
//
//    /** 浦发银行（信用卡） */
//    const SPDB_CREDIT;
//
//    /** 广发银行（借记卡） */
//    const GDB_DEBIT;
//
//    /** 广发银行（信用卡） */
//    const GDB_CREDIT;
//
//    /** 民生银行（借记卡） */
//    const CMBC_DEBIT;
//
//    const CMBC_CREDIT; //民生银行（信用卡）
//
//    const PAB_DEBIT; //平安银行（借记卡）
//
//    const PAB_CREDIT; //平安银行（信用卡）
//
//    const CEB_DEBIT; //光大银行（借记卡）
//
//    const CEB_CREDIT; //光大银行（信用卡）
//    const CIB_DEBIT; //兴业银行（借记卡）
//    const CIB_CREDIT; //兴业银行（信用卡）
//    const CITIC_DEBIT; //中信银行（借记卡）
//    const CITIC_CREDIT; //中信银行（信用卡）
//    const BOSH_DEBIT; //上海银行（借记卡）
//    const BOSH_CREDIT; //上海银行（信用卡）
//    const AHRCUB_CREDIT; //安徽省农村信用社联合社（信用卡）
//    const AHRCUB_DEBIT; //安徽省农村信用社联合社（借记卡）
//    const AIB_DEBIT; //百信银行（借记卡）
//    const ASCB_DEBIT; //鞍山银行（借记卡）
//    const ATRB_DEBIT; //盘山安泰村镇银行（借记卡）
//    const BCZ_CREDIT;//沧州银行（信用卡）
//    const BCZ_DEBIT; //沧州银行（借记卡）
//    const BDB_DEBIT; //保定银行（借记卡）
//    const BEEB_CREDIT; //鄞州银行（信用卡）
//    const BEEB_DEBIT; //鄞州银行（借记卡）
//    const BGZB_DEBIT; //贵州银行（借记卡）
//    const BHB_CREDIT; //河北银行（信用卡）
//    const BHB_DEBIT; //河北银行（借记卡）
//    const BJRCB_CREDIT; //北京农商行（信用卡）
//    const BJRCB_DEBIT; //北京农商行（借记卡）
//    const BNC_CREDIT; //江西银行（信用卡）
//    const BNC_DEBIT; //江西银行（借记卡）
//    const BOB_CREDIT; //北京银行（信用卡）
//    const BOB_DEBIT; //北京银行（借记卡）
//    const BOBBG_CREDIT; //北部湾银行（信用卡）
//    const BOBBG_DEBIT;//北部湾银行（借记卡）
//    const BOCD_DEBIT; //成都银行（借记卡）
//    const BOCDB_DEBIT; //承德银行（借记卡）
//    const BOCFB_DEBIT; //中银富登村镇银行（借记卡）
//    const BOCTS_DEBIT; //焦作中旅银行（借记卡）
//    const BOD_CREDIT; //东莞银行（信用卡）
//    const BOD_DEBIT; //东莞银行（借记卡）
//    const BOFS_DEBIT;//抚顺银行（借记卡）
//    const BOHN_DEBIT; //海南银行（借记卡）
//    const BOIMCB_CREDIT; //内蒙古银行（信用卡）
//    const BOIMCB_DEBIT; //内蒙古银行（借记卡）
//    const BOJN_DEBIT; //济宁银行（借记卡）
//    const BOJX_DEBIT; //嘉兴银行（借记卡）
//    const BOLB_DEBIT; //洛阳银行（借记卡）
//    const BOLFB_DEBIT; //廊坊银行（借记卡）
//    const BONX_CREDIT; //宁夏银行（信用卡）
//    const BONX_DEBIT; //宁夏银行（借记卡）
//    const BOPDS_DEBIT; //平顶山银行（借记卡）
//    const BOPJ_DEBIT; //盘锦银行（借记卡）
//    const BOQHB_CREDIT; //青海银行（信用卡）
//    const BOQHB_DEBIT; //青海银行（借记卡）
//    const BOSXB_DEBIT; //绍兴银行（借记卡）
//    const BOSZS_DEBIT; //石嘴山银行（借记卡）
//    const BOTSB_DEBIT; //唐山银行（借记卡）
//    const BOZ_CREDIT; //张家口银行（信用卡）
//    const BOZ_DEBIT; //张家口银行（借记卡）
//    const BSB_CREDIT; //包商银行（信用卡）
//    const BSB_DEBIT;//包商银行（借记卡）
//    const BYK_DEBIT; //营口银行（借记卡）
//    const CBHB_DEBIT; //渤海银行（借记卡）
//    const CCAB_CREDIT; //长安银行（信用卡）
//    const CCAB_DEBIT; //长安银行（借记卡）
//    const CDRCB_DEBIT; //成都农商银行（借记卡）
//    const CITIB_CREDIT;//花旗银行（信用卡）
//    const CITIB_DEBIT; //花旗银行（借记卡）
//    const CJCCB_DEBIT; //江苏长江商业银行（借记卡）
//    const CQB_CREDIT; //重庆银行（信用卡）
//    const CQB_DEBIT; //重庆银行（借记卡）
//    const CQRCB_CREDIT; //重庆农村商业银行（信用卡）
//    const CQRCB_DEBIT; //重庆农村商业银行（借记卡）
//    const CQTGB_DEBIT; //重庆三峡银行（借记卡）
//    const CRB_CREDIT;//珠海华润银行（信用卡）
//    const CRB_DEBIT; //珠海华润银行（借记卡）
//    const CSCB_CREDIT; //长沙银行（信用卡）
//    const CSCB_DEBIT; //长沙银行（借记卡）
//    const CSRCB_CREDIT; //常熟农商银行（信用卡）
//    const CSRCB_DEBIT; //常熟农商银行（借记卡）
//    const CSXB_DEBIT; //三湘银行（借记卡）
//    const CYCB_CREDIT; //朝阳银行（信用卡）
//    const CYCB_DEBIT; //朝阳银行（借记卡）
//    const CZB_CREDIT; //浙商银行（信用卡）
//    const CZB_DEBIT; //浙商银行（借记卡）
//    const CZCB_CREDIT; //稠州银行（信用卡）
//    const CZCB_DEBIT; //稠州银行（借记卡）
//    const CZCCB_DEBIT; //长治银行（借记卡）
//    const DANDONGB_CREDIT; //丹东银行（信用卡）
//    const DANDONGB_DEBIT; //丹东银行（借记卡）
//    const DBSB_DEBIT; //星展银行（借记卡）
//    const DCSFRB_DEBIT; //大城舜丰村镇银行（借记卡）
//    const DHDYB_DEBIT; //德惠敦银村镇银行（借记卡）
//    const DHRB_DEBIT;//调兵山惠民村镇银行（借记卡）
//    const DLB_CREDIT; //大连银行（信用卡）
//    const DLB_DEBIT; //大连银行（借记卡）
//    const DLRCB_DEBIT; //大连农商行（借记卡）
//    const DRCB_CREDIT; //东莞农商银行（信用卡）
//    const DRCB_DEBIT; //东莞农商银行（借记卡）
//    const DSB_DEBIT; //大新银行（借记卡）
//    const DTCCB_DEBIT; //大同银行（借记卡）
//    const DYB_CREDIT; //东营银行（信用卡）
//    const DYB_DEBIT; //东营银行（借记卡）
//    const DYCCB_DEBIT; //长城华西银行（借记卡）
//    const DYLSB_DEBIT; //东营莱商村镇银行（借记卡）
//    const DZB_DEBIT; //德州银行（借记卡）
//    const DZCCB_DEBIT; //达州银行（借记卡）
//    const EDRB_DEBIT; //鼎业村镇银行（借记卡）
//    const ESUNB_DEBIT; //玉山银行（借记卡）
//    const FBB_DEBIT; //富邦华一银行（借记卡）
//    const FDB_CREDIT; //富滇银行（信用卡）
//    const FDB_DEBIT;//富滇银行（借记卡）
//    const FJHXB_CREDIT; //福建海峡银行（信用卡）
//    const FJHXB_DEBIT; //福建海峡银行（借记卡）
//    const FJNX_CREDIT; //福建农信银行（信用卡）
//    const FJNX_DEBIT; //福建农信银行（借记卡）
//    const FUXINB_CREDIT; //阜新银行（信用卡）
//    const FUXINB_DEBIT;//阜新银行（借记卡）
//    const FXLZB_DEBIT; //费县梁邹村镇银行（借记卡）
//    const GADRB_DEBIT; //贵安新区发展村镇银行（借记卡）
//    const GDHX_DEBIT; //广东华兴银行（借记卡）
//    const GDNYB_CREDIT; //南粤银行（信用卡）
//    const GDNYB_DEBIT; //南粤银行（借记卡）
//    const GDRCU_DEBIT; //广东农信银行（借记卡）
//    const GLB_CREDIT;//桂林银行（信用卡）
//    const GLB_DEBIT;//桂林银行（借记卡）
//    const GLGMCB_DEBIT; //桂林国民村镇银行（借记卡）
//    const GRCB_CREDIT;//广州农商银行（信用卡）
//    const GRCB_DEBIT; //广州农商银行（借记卡）
//    const GSB_DEBIT; //甘肃银行（借记卡）
//    const GSNX_DEBIT; //甘肃农信（借记卡）
//    const GSRB_DEBIT; //广阳舜丰村镇银行（借记卡）
//    const GXNX_CREDIT; //广西农信（信用卡）
//    const GXNX_DEBIT; //广西农信（借记卡）
//    const GYCB_CREDIT; //贵阳银行（信用卡）
//    const GYCB_DEBIT; //贵阳银行（借记卡）
//    const GZCB_CREDIT; //广州银行（信用卡）
//    const GZCB_DEBIT;//广州银行（借记卡）
//    const GZCCB_CREDIT; //赣州银行（信用卡）
//    const GZCCB_DEBIT; //赣州银行（借记卡）
//    const GZNX_DEBIT;//贵州农信（借记卡）
//    const HAINNX_CREDIT;//海南农信（信用卡）
//    const HAINNX_DEBIT; //海南农信（借记卡）
//    const HANAB_DEBIT;//韩亚银行（借记卡）
//    const HBCB_CREDIT; //湖北银行（信用卡）
//    const HBCB_DEBIT; //湖北银行（借记卡）
//    const HBNX_CREDIT; //湖北农信（信用卡）
//    const HBNX_DEBIT; //湖北农信（借记卡）
//    const HDCB_DEBIT;//邯郸银行（借记卡）
//    const HEBNX_DEBIT; //河北农信（借记卡）
//    const HFB_CREDIT; //恒丰银行（信用卡）
//    const HFB_DEBIT; //恒丰银行（借记卡）
//    const HKB_CREDIT; //汉口银行（信用卡）
//    const HKB_DEBIT;//汉口银行（借记卡）
//    const HKBEA_CREDIT;//东亚银行（信用卡）
//    const HKBEA_DEBIT; //东亚银行（借记卡）
//    const HKUB_DEBIT; //海口联合农商银行（借记卡）
//    const HLDCCB_DEBIT; //葫芦岛银行（借记卡）
//    const HLDYB_DEBIT; //和龙敦银村镇银行（借记卡）
//    const HLJRCUB_DEBIT; //黑龙江农信社（借记卡）
//    const HMCCB_DEBIT; //哈密银行（借记卡）
//    const HNNX_DEBIT; //河南农信（借记卡）
//    const HRBB_CREDIT; //哈尔滨银行（信用卡）
//    const HRBB_DEBIT; //哈尔滨银行（借记卡）
//    const HRCB_DEBIT; //保德慧融村镇银行（借记卡）
//    const HRXJB_CREDIT; //华融湘江银行（信用卡）
//    const HRXJB_DEBIT; //华融湘江银行（借记卡）
//    const HSB_CREDIT; //徽商银行（信用卡）
//    const HSB_DEBIT; //徽商银行（借记卡）
//    const HSBC_DEBIT; //恒生银行（借记卡）
//
//HSBCC_CREDIT
//
//汇丰银行（信用卡）
//
//HSBCC_DEBIT
//
//汇丰银行（借记卡）
//
//HSCB_DEBIT
//
//衡水银行（借记卡）
//
//HUIHEB_DEBIT
//
//新疆汇和银行（借记卡）
//
//HUNNX_DEBIT
//
//湖南农信（借记卡）
//
//HUSRB_DEBIT
//
//湖商村镇银行（借记卡）
//
//HXB_CREDIT
//
//华夏银行（信用卡）
//
//HXB_DEBIT
//
//华夏银行（借记卡）
//
//HZB_CREDIT
//
//杭州银行（信用卡）
//
//HZB_DEBIT
//
//杭州银行（借记卡）
//
//HZCCB_DEBIT
//
//湖州银行（借记卡）
//
//IBKB_DEBIT
//
//企业银行（借记卡）
//
//JCB_DEBIT
//
//晋城银行（借记卡）
//
//JCBK_CREDIT
//
//晋城银行（信用卡）
//
//JDHDB_DEBIT
//
//上海嘉定洪都村镇银行（借记卡）
//
//JDZCCB_DEBIT
//
//景德镇市商业银行（借记卡）
//
//JHCCB_CREDIT
//
//金华银行（信用卡）
//
//JHCCB_DEBIT
//
//金华银行（借记卡）
//
//JJCCB_CREDIT
//
//九江银行（信用卡）
//
//JJCCB_DEBIT
//
//九江银行（借记卡）
//
//JLB_CREDIT
//
//吉林银行（信用卡）
//
//JLB_DEBIT
//
//吉林银行（借记卡）
//
//JLNX_DEBIT
//
//吉林农信（借记卡）
//
//JNRCB_CREDIT
//
//江南农商行（信用卡）
//
//JNRCB_DEBIT
//
//江南农商行（借记卡）
//
//JRCB_CREDIT
//
//江阴农商行（信用卡）
//
//JRCB_DEBIT
//
//江阴农商行（借记卡）
//
//JSB_CREDIT
//
//江苏银行（信用卡）
//
//JSB_DEBIT
//
//江苏银行（借记卡）
//
//JSHB_CREDIT
//
//晋商银行（信用卡）
//
//JSHB_DEBIT
//
//晋商银行（借记卡）
//
//JSNX_CREDIT
//
//江苏农信（信用卡）
//
//JSNX_DEBIT
//
//江苏农信（借记卡）
//
//JUFENGB_DEBIT
//
//临朐聚丰村镇银行（借记卡）
//
//JXB_DEBIT
//
//西昌金信村镇银行（借记卡）
//
//JXNXB_DEBIT
//
//江西农信（借记卡）
//
//JZB_CREDIT
//
//晋中银行（信用卡）
//
//JZB_DEBIT
//
//晋中银行（借记卡）
//
//JZCB_CREDIT
//
//锦州银行（信用卡）
//
//JZCB_DEBIT
//
//锦州银行（借记卡）
//
//KCBEB_DEBIT
//
//天津金城银行（借记卡）
//
//KLB_CREDIT
//
//昆仑银行（信用卡）
//
//KLB_DEBIT
//
//昆仑银行（借记卡）
//
//KRCB_DEBIT
//
//昆山农商（借记卡）
//
//KSHB_DEBIT
//
//梅州客商银行（借记卡）
//
//KUERLECB_DEBIT
//
//库尔勒市商业银行（借记卡）
//
//LCYRB_DEBIT
//
//陵城圆融村镇银行（借记卡）
//
//LICYRB_DEBIT
//
//历城圆融村镇银行（借记卡）
//
//LJB_DEBIT
//
//龙江银行（借记卡）
//
//LLB_DEBIT
//
//山东兰陵村镇银行（借记卡）
//
//LLHZCB_DEBIT
//
//柳林汇泽村镇银行（借记卡）
//
//LNNX_DEBIT
//
//辽宁农信（借记卡）
//
//LPCB_DEBIT
//
//凉山州商业银行（借记卡）
//
//LPSBLVB_DEBIT
//
//钟山凉都村镇银行（借记卡）
//
//LSB_CREDIT
//
//临商银行（信用卡）
//
//LSB_DEBIT
//
//临商银行（借记卡）
//
//LSCCB_DEBIT
//
//乐山市商业银行（借记卡）
//
//LUZB_DEBIT
//
//柳州银行（借记卡）
//
//LWB_DEBIT
//
//莱商银行（借记卡）
//
//LYYHB_DEBIT
//
//辽阳银行（借记卡）
//
//LZB_CREDIT
//
//兰州银行（信用卡）
//
//LZB_DEBIT
//
//兰州银行（借记卡）
//
//LZCCB_DEBIT
//
//泸州市商业银行（借记卡）
//
//MHBRB_DEBIT
//
//闵行上银村镇银行（借记卡）
//
//MINTAIB_CREDIT
//
//民泰银行（信用卡）
//
//MINTAIB_DEBIT
//
//民泰银行（借记卡）
//
//MPJDRB_DEBIT
//
//牟平胶东村镇银行（借记卡）
//
//MYCCB_DEBIT
//
//绵阳市商业银行（借记卡）
//
//NBCB_CREDIT
//
//宁波银行（信用卡）
//
//NBCB_DEBIT
//
//宁波银行（借记卡）
//
//NCB_DEBIT
//
//宁波通商银行（借记卡）
//
//NCBCB_DEBIT
//
//南洋商业银行（借记卡）
//
//NCCB_DEBIT
//
//四川天府银行（借记卡）
//
//NJCB_CREDIT
//
//南京银行（信用卡）
//
//NJCB_DEBIT
//
//南京银行（借记卡）
//
//NJJDRB_DEBIT
//
//宁津胶东村镇银行（借记卡）
//
//NJXLRB_DEBIT
//
//内江兴隆村镇银行（借记卡）
//
//NMGNX_DEBIT
//
//内蒙古农信（借记卡）
//
//NNGMB_DEBIT
//
//南宁江南国民村镇银行（借记卡）
//
//NUB_DEBIT
//
//辽宁振兴银行（借记卡）
//
//NYCCB_DEBIT
//
//南阳村镇银行（借记卡）
//
//OCBCWHCB_DEBIT
//
//华侨永亨银行（借记卡）
//
//OHVB_DEBIT
//
//鄂托克旗汇泽村镇银行（借记卡）
//
//ORDOSB_CREDIT
//
//鄂尔多斯银行（信用卡）
//
//ORDOSB_DEBIT
//
//鄂尔多斯银行（借记卡）
//
//PBDLRB_DEBIT
//
//平坝鼎立村镇银行（借记卡）
//
//PJDWHFB_DEBIT
//
//大洼恒丰村镇银行（借记卡）
//
//PJJYRB_DEBIT
//
//浦江嘉银村镇银行（借记卡）
//
//PZHCCB_DEBIT
//
//攀枝花银行（借记卡）
//
//QDCCB_CREDIT
//
//青岛银行（信用卡）
//
//QDCCB_DEBIT
//
//青岛银行（借记卡）
//
//QHDB_DEBIT
//
//秦皇岛银行（借记卡）
//
//QHJDRB_DEBIT
//
//齐河胶东村镇银行（借记卡）
//
//QHNX_DEBIT
//
//青海农信（借记卡）
//
//QJSYB_DEBIT
//
//衢江上银村镇银行（借记卡）
//
//QLB_CREDIT
//
//齐鲁银行（信用卡）
//
//QLB_DEBIT
//
//齐鲁银行（借记卡）
//
//QLVB_DEBIT
//
//青隆村镇银行（借记卡）
//
//QSB_CREDIT
//
//齐商银行（信用卡）
//
//QSB_DEBIT
//
//齐商银行（借记卡）
//
//QZCCB_CREDIT
//
//泉州银行（信用卡）
//
//QZCCB_DEBIT
//
//泉州银行（借记卡）
//
//RHCB_DEBIT
//
//长子县融汇村镇银行（借记卡）
//
//RQCZB_DEBIT
//
//任丘村镇银行（借记卡）
//
//RXYHB_DEBIT
//
//瑞信村镇银行（借记卡）
//
//RZB_DEBIT
//
//日照银行（借记卡）
//
//SCB_CREDIT
//
//渣打银行（信用卡）
//
//SCB_DEBIT
//
//渣打银行（借记卡）
//
//SCNX_DEBIT
//
//四川农信（借记卡）
//
//SDEB_CREDIT
//
//顺德农商行（信用卡）
//
//SDEB_DEBIT
//
//顺德农商行（借记卡）
//
//SDRCU_DEBIT
//
//山东农信（借记卡）
//
//SHHJB_DEBIT
//
//商河汇金村镇银行（借记卡）
//
//SHINHAN_DEBIT
//
//新韩银行（借记卡）
//
//SHRB_DEBIT
//
//上海华瑞银行（借记卡）
//
//SJB_CREDIT
//
//盛京银行（信用卡）
//
//SJB_DEBIT
//
//盛京银行（借记卡）
//
//SNB_DEBIT
//
//苏宁银行（借记卡）
//
//SNCCB_DEBIT
//
//遂宁银行（借记卡）
//
//SPDYB_DEBIT
//
//四平铁西敦银村镇银行（借记卡）
//
//SRB_DEBIT
//
//上饶银行（借记卡）
//
//SRCB_CREDIT
//
//上海农商银行（信用卡）
//
//SRCB_DEBIT
//
//上海农商银行（借记卡）
//
//SUZB_CREDIT
//
//苏州银行（信用卡）
//
//SUZB_DEBIT
//
//苏州银行（借记卡）
//
//SXNX_DEBIT
//
//山西农信（借记卡）
//
//SXXH_DEBIT
//
//陕西信合（借记卡）
//
//SZRCB_CREDIT
//
//深圳农商银行（信用卡）
//
//SZRCB_DEBIT
//
//深圳农商银行（借记卡）
//
//TACCB_CREDIT
//
//泰安银行（信用卡）
//
//TACCB_DEBIT
//
//泰安银行（借记卡）
//
//TCRCB_DEBIT
//
//太仓农商行（借记卡）
//
//TJB_CREDIT
//
//天津银行（信用卡）
//
//TJB_DEBIT
//
//天津银行（借记卡）
//
//TJBHB_CREDIT
//
//天津滨海农商行（信用卡）
//
//TJBHB_DEBIT
//
//天津滨海农商行（借记卡）
//
//TJHMB_DEBIT
//
//天津华明村镇银行（借记卡）
//
//TJNHVB_DEBIT
//
//天津宁河村镇银行（借记卡）
//
//TLB_DEBIT
//
//铁岭银行（借记卡）
//
//TLVB_DEBIT
//
//铁岭新星村镇银行（借记卡）
//
//TMDYB_DEBIT
//
//图们敦银村镇银行（借记卡）
//
//TRCB_CREDIT
//
//天津农商（信用卡）
//
//TRCB_DEBIT
//
//天津农商（借记卡）
//
//TZB_CREDIT
//
//台州银行（信用卡）
//
//TZB_DEBIT
//
//台州银行（借记卡）
//
//UOB_DEBIT
//
//大华银行（借记卡）
//
//URB_DEBIT
//
//联合村镇银行（借记卡）
//
//VBCB_DEBIT
//
//村镇银行（借记卡）
//
//WACZB_DEBIT
//
//武安村镇银行（借记卡）
//
//WB_DEBIT
//
//友利银行（借记卡）
//
//WEB_DEBIT
//
//微众银行（借记卡）
//
//WEGOB_DEBIT
//
//蓝海银行（借记卡）
//
//WFB_CREDIT
//
//潍坊银行（信用卡）
//
//WFB_DEBIT
//
//潍坊银行（借记卡）
//
//WHB_CREDIT
//
//威海商业银行（信用卡）
//
//WHB_DEBIT
//
//威海商业银行（借记卡）
//
//WHRC_CREDIT
//
//武汉农商行（信用卡）
//
//WHRC_DEBIT
//
//武汉农商行（借记卡）
//
//WHRYVB_DEBIT
//
//芜湖圆融村镇银行（借记卡）
//
//WJRCB_CREDIT
//
//吴江农商行（信用卡）
//
//WJRCB_DEBIT
//
//吴江农商行（借记卡）
//
//WLMQB_CREDIT
//
//乌鲁木齐银行（信用卡）
//
//WLMQB_DEBIT
//
//乌鲁木齐银行（借记卡）
//
//WRCB_CREDIT
//
//无锡农商行（信用卡）
//
//WRCB_DEBIT
//
//无锡农商行（借记卡）
//
//WUHAICB_DEBIT
//
//乌海银行（借记卡）
//
//WZB_CREDIT
//
//温州银行（信用卡）
//
//WZB_DEBIT
//
//温州银行（借记卡）
//
//WZMSB_DEBIT
//
//温州民商（借记卡）
//
//XAB_CREDIT
//
//西安银行（信用卡）
//
//XAB_DEBIT
//
//西安银行（借记卡）
//
//XCXPB_DEBIT
//
//许昌新浦村镇银行（借记卡）
//
//XHB_DEBIT
//
//大连鑫汇村镇银行（借记卡）
//
//XHNMB_DEBIT
//
//安顺西航南马村镇银行（借记卡）
//
//XIB_DEBIT
//
//厦门国际银行（借记卡）
//
//XINANB_DEBIT
//
//安徽新安银行（借记卡）
//
//XJB_DEBIT
//
//新疆银行（借记卡）
//
//XJJDRB_DEBIT
//
//夏津胶东村镇银行（借记卡）
//
//XJRCCB_DEBIT
//
//新疆农信银行（借记卡）
//
//XMCCB_CREDIT
//
//厦门银行（信用卡）
//
//XMCCB_DEBIT
//
//厦门银行（借记卡）
//
//XRTB_DEBIT
//
//元氏信融村镇银行（借记卡）
//
//XTB_CREDIT
//
//邢台银行（信用卡）
//
//XTB_DEBIT
//
//邢台银行（借记卡）
//
//XWB_DEBIT
//
//新网银行（借记卡）
//
//XXCB_DEBIT
//
//新乡银行（借记卡）
//
//XXHZCB_DEBIT
//
//兴县汇泽村镇银行（借记卡）
//
//XXRB_DEBIT
//
//新乡新兴村镇银行（借记卡）
//
//XYPQZYCB_DEBIT
//
//信阳平桥中原村镇银行（借记卡）
//
//XZB_DEBIT
//
//西藏银行（借记卡）
//
//YACCB_DEBIT
//
//雅安市商业银行（借记卡）
//
//YBCCB_DEBIT
//
//宜宾商业银行（借记卡）
//
//YKCB_DEBIT
//
//营口沿海银行（借记卡）
//
//YLB_DEBIT
//
//亿联银行（借记卡）
//
//YNHTB_CREDIT
//
//云南红塔银行（信用卡）
//
//YNHTB_DEBIT
//
//云南红塔银行（借记卡）
//
//YNRCCB_CREDIT
//
//云南农信（信用卡）
//
//YNRCCB_DEBIT
//
//云南农信（借记卡）
//
//YQCCB_DEBIT
//
//阳泉市商业银行（借记卡）
//
//YQMYRB_DEBIT
//
//玉泉蒙银村镇银行（借记卡）
//
//YRRCB_CREDIT
//
//黄河农商银行（信用卡）
//
//YRRCB_DEBIT
//
//黄河农商银行（借记卡）
//
//YTB_DEBIT
//
//烟台银行（借记卡）
//
//YYBSCB_DEBIT
//
//沂源博商村镇银行（借记卡）
//
//ZCRB_DEBIT
//
//遵义新蒲长征村镇银行（借记卡）
//
//ZGB_DEBIT
//
//自贡银行（借记卡）
//
//ZGCB_DEBIT
//
//北京中关村银行（借记卡）
//
//ZHCB_DEBIT
//
//庄河汇通村镇银行（借记卡）
//
//ZHQYTB_DEBIT
//
//沾化青云村镇银行（借记卡）
//
//ZJB_DEBIT
//
//紫金农商银行（借记卡）
//
//ZJLXRB_DEBIT
//
//兰溪越商银行（借记卡）
//
//ZJRCUB_CREDIT
//
//浙江农信（信用卡）
//
//ZJRCUB_DEBIT
//
//浙江农信（借记卡）
//
//ZJTLCB_CREDIT
//
//浙江泰隆银行（信用卡）
//
//ZJTLCB_DEBIT
//
//浙江泰隆银行（借记卡）
//
//ZRCB_CREDIT
//
//张家港农商行（信用卡）
//
//ZRCB_DEBIT
//
//张家港农商行（借记卡）
//
//ZSXKCCB_DEBIT
//
//中山小榄村镇银行（借记卡）
//
//ZYB_CREDIT
//
//中原银行（信用卡）
//
//ZYB_DEBIT
//
//中原银行（借记卡）
//
//ZZB_CREDIT
//
//郑州银行（信用卡）
//
//ZZB_DEBIT
//
//郑州银行（借记卡）
//
//ZZCCB_DEBIT
//
//枣庄银行（借记卡）
//
//DINERSCLUD
//
//DINERSCLUD
//
//MASTERCARD
//
//MASTERCARD
//
//VISA
//
//VISA
//
//AMERICANEXPRESS
//
//AMERICANEXPRESS
//
//DISCOVER
//
//DISCOVER
//
//OTHERS
//
//其他（银行卡以外）
//}