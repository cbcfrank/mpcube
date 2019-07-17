#### 创建菜单

```php
$token = AccessToken::getInstance();
$access_token = $token->setCacheDriver(AccessToken::CACHE_DRIVER_FILESYSTEM)->setFilePath()->getToken($GLOBALS["appid"], $GLOBALS["appsecret"]);

$btn = Button::getInstance();
$arr = $btn->ofClick('E菜单0_0', 'm_0_0')->ofView('E菜单0_1', 'https://m.163.com')->newSubButton('E菜单0')
    ->ofLocationSelect('E菜单1_0', 'm_1_0')->ofPicWeixin('E菜单1_1', 'm_1_1')->newSubButton('E菜单1')
    ->ofView('E菜单2', 'https://m.qq.com')->newButton()
    ->finish();

$menu = Menu::getInstance();
$ret = $menu->setAccessToken($access_token)->create($arr);
//exit(Menu::$access_token);
//$ret = Menu::create($arr);
var_dump($ret);
```
