#### [<<返回](../README.md)

#### 场景二维码

 * 创建场景二维码

```php
//临时场景
global $access_token;

$qrcode = Qrcode::getInstance();
$ret = $qrcode->setAccessToken($access_token)->createQrcodeByQRSCENE(360, '1001');
var_dump($ret);
```

 * 展示二维码

```php
global $access_token;

$qrcode = Qrcode::getInstance();
$ret = $qrcode->setAccessToken($access_token)->showQrcode('gQGn7zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyaDJsYTRTeHBha1UxOXJXT2h0MVkAAgTzuDJdAwRoAQAA');
var_dump($ret);
```

#### 长链接转短链接

```php
global $access_token;

$surl = ShortURL::getInstance();
$ret = $surl->setAccessToken($access_token)->urlShort('https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQGn7zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyaDJsYTRTeHBha1UxOXJXT2h0MVkAAgTzuDJdAwRoAQA');
var_dump($ret);
```