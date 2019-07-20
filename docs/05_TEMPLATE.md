#### [<<返回](../README.md)


#### 推送消息模板
```php
$token = AccessToken::getInstance();
$access_token = $token->setCacheDriver(AccessToken::CACHE_DRIVER_FILESYSTEM)->setFilePath()->getToken($appid, $appsecret);

/* TR1JSSiB5BOhzU9ungK27oZocbqTUZcYaZGnl2QATy0
{{first.DATA}}
商品名称：{{goods.DATA}}
消费金额：{{price.DATA}}
购买时间：{{date.DATA}}
{{remark.DATA}}
*/;

$template = Template::getInstance();
$toUserOpenid = '';
$templateId = 'TR1JSSiB5BOhzU9ungK27oZocbqTUZcYaZGnl2QATy0';

$data = array(
    "first"=>array("value"=>"恭喜你购买成功！!", "color"=>"#173177"),
    "goods"=>array("value"=>"巧克力", "color"=>"#173177"),
    "price"=>array("value"=>"39.8元", "color"=>"#173177"),
    "date"=>array("value"=>"2014年9月22日", "color"=>"#173177"),
    "remark"=>array("value"=>"欢迎再次购买！!", "color"=>"#173177")
);
$url = 'https://m.qq.com';
$ret = $template->setAccessToken($access_token)
                ->setMessageContent($toUserOpenid, $templateId, $data, $url)
                ->sendMessage();
var_dump($ret);

```