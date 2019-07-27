#### [<<返回](../README.md)

#### 获取用户列表

```php
function testUserGet()
{
    global $access_token;

    $user = User::getInstance();
    $ret = $user->setAccessToken($access_token)->get();
    var_dump($ret);
}

```

#### 获取用户基本信息
  
```php
function testUserInfo()
 {
     global $access_token;
 
     $user = User::getInstance();
     $ret = $user->setAccessToken($access_token)->info('oYRmUuEetrbelAbvEGIIREm_IoNg');
     var_dump($ret);
 }
 ```

#### 批量获取用户基本信息

```php
function testUserInfoBatchget()
{
    global $access_token;

    $user = User::getInstance();
    $ret = $user->setAccessToken($access_token)->clearUserList()->setUserList('oYRmUuEetrbelAbvEGIIREm_IoNg')->infoBatchGet();
    var_dump($ret);
}  
 ```

#### 获取公众号的黑名单列表

```php
function testTagsGetBlackList()
{
    global $access_token;

    $tags = Tags::getInstance();
    $ret = $tags->setAccessToken($access_token)->membersGetBlackList();
    var_dump($ret);
}
```

#### 拉黑用户

```php
function testTagsBatchBlackList()
{
    global $access_token;

    $tags = Tags::getInstance();
    $ret = $tags->setAccessToken($access_token)->clearBlackOpenidList()->setBlackOpenidList('oYRmUuEetrbelAbvEGIIREm_IoNg')->membersBatchBlackList();
    var_dump($ret);
}
```

#### 取消拉黑用户

```php
function testTagsBatchUnBlackList()
{
    global $access_token;

    $tags = Tags::getInstance();
    $ret = $tags->setAccessToken($access_token)->clearBlackOpenidList()->setBlackOpenidList('oYRmUuEetrbelAbvEGIIREm_IoNg')->membersBatchBlackUnBlackList();
    var_dump($ret);
}
```
