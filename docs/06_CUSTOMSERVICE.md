#### 添加客服

```php
    $kf = KfAccountNew::getInstance();
    $ret = $kf->setAccessToken($access_token)->add('kf1@abc', '客服1');
    var_dump($ret);
```

#### 发送消息

```php
    $msg = Message::getInstance();
    $ret = $msg->setAccessToken($access_token)
               ->setImageMsg('openid', 'media_id')
               ->customSend();
    var_dump($ret);
```

#### 正在输入状态

```php
    $msg = Message::getInstance();
    //$ret = $msg->setAccessToken($access_token)->customTyping('oYRmUuEetrbelAbvEGIIREm_IoNg', 'Typing');
    $ret = $msg->setAccessToken($access_token)->customTyping('oYRmUuEetrbelAbvEGIIREm_IoNg', 'CancelTyping');
    var_dump($ret);
```