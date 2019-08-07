#### [<<返回](../README.md)

#### 第一步：用户同意授权，获取code
#### 第二步：通过code换取网页授权access_token
####  （网页授权接口调用凭证,注意：此access_token与基础支持的access_token不同）

```php
function testAuthorize()
{
    global $appid;

    $auth = Oauth2::getInstance();
    $redirect_url = 'http://www.youdomain.com/mpcube/test/Wechat/Publics/web.php?_ijt=du8vh3rtpbi64dmhf87b9952qs';
    
    //只想获取openid，静默
    //$auth->authorize($appid, $redirect_url, Oauth2Scope::snsapi_base, array('im'=>'state'));
    
    //希望获取用户详细信息，需用户授权
    $auth->authorize($appid, $redirect_url, Oauth2Scope::snsapi_userinfo, array('im'=>'state'));
}

function testGetOpenid($code)
{
    global $appid, $appsecret;

    //获取并缓存网页access_token
    $auth = Oauth2::getInstance();
    $ret = $auth->setCacheDriver(Oauth2::CACHE_DRIVER_FILESYSTEM)->setFilePath()->getFullWebAccessToken($appid, $appsecret, $code);
    var_dump($ret);

    //后续获得openid后逻辑处理
    $redirecturl = 'https://www.youdomain.com/index.html?abc=def';
    $state = json_decode(urldecode($_GET['state']), true);
    $statestr = http_build_query($state);
    $openid = $ret['openid'];
    
    //此处为跳转至下一个页面处理
    var_dump("{$redirecturl}&{$statestr}&openid={$openid}");
    header("location:{$redirecturl}&{$statestr}&openid=".$openid);
    exit();
}

if(empty($_GET['code'])) {
    testAuthorize();
} else {
    testGetOpenid($_GET['code']);
}

```

#### 刷新access_token

```php
$auth = Oauth2::getInstance();
$refresh_token = '';
$ret = $auth->refreshToken($appid, $refresh_token);
var_dump($ret);
```

#### 拉取用户信息(需scope为 snsapi_userinfo)
  * 如果网页授权作用域为snsapi_userinfo，则此时开发者可以通过access_token和openid拉取用户信息了。     

```php
$auth = Oauth2::getInstance();
$web_access_token = '';
$openid = '';
$ret = $auth->getUserinfo($web_access_token, $openid);
var_dump($ret);
```

#### 检验授权凭证（access_token）是否有效
```php
$auth = Oauth2::getInstance();
$web_access_token = '';
$openid = '';
$ret = $auth->auth($web_access_token, $openid);
var_dump($ret);
```