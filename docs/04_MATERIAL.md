#### [<<返回](../README.md)

#### 获取素材

> 返回的是素材的URL地址
> 另外传参数时需要了解素材的类型

```php
$token = AccessToken::getInstance();
$access_token = $token->setCacheDriver(AccessToken::CACHE_DRIVER_FILESYSTEM)->setFilePath()->getToken($GLOBALS["appid"], $GLOBALS["appsecret"]);

$media = Media::getInstance();
$ret = $media->setAccessToken($access_token)->get(MediaType::IMAGE, 'qH8hGboq7KAB-ebbRl0Jh6ZtoN96jry4zvW68movA9u7Hmqmk0zcRyLrg-UpJvUm');
var_dump($ret);

$ret = $media->setAccessToken($access_token)->get(MediaType::VIDEO, '5SmHJcUMzETUPbwylJ-C_pqamdz_cMM9407pPgHzl__y0fpefikxQ1cBmyDW6kYv');
var_dump($ret);
```
