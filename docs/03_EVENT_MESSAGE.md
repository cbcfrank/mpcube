#### 接受消息处理

> 如果默认接收所有推送消息，只需要在需要处理的地方设置回掉函数即可

```php
$message = Message::getInstance();
$message->receive();

// 文本消息回调处理， msgTextCallback 为固定的回调名称
function msgTextCallback($msgarr)
{
    var_dump($msgarr);
}

// 事件消息回调处理，msgEventCallback 为固定的回调名称

```

> 如果设置单独特定的回调信息的函数 或者 静态类方法，则需单独处理

```php
$message = Message::getInstance();
$mtos = MsgTextObserver::getInstance();
$mtos->setCallback('TestMsg::msgTextCallback');
$message->attach($mtos)->receive();
class TestMsg
{
    public static function msgTextCallback($msgarr)
    {
        var_dump($msgarr);
    }
}
``` 

> 或者实例对象方法

```php
class TestMsg
{
    public function msgTextCallback($msgarr)
    {
        var_dump($msgarr);
    }
}

$message = Message::getInstance();
$mtos = MsgTextObserver::getInstance();
$mtos->setCallback(array('TestMsg', 'msgTextCallback'));
$message->attach($mtos)->receive();
```
