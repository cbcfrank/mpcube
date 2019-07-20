#### [<<返回](../README.md)

#### 如未指定 在运行时临时文件将存放在目录runtime，该目录及以下子目录请确保可写权限


#### 设置运行时文件存放目录

> $rt = Runtime::getInstance();
> $rt->dir = 'D:\git\github\minicub\runtime';
> var_dump($rt->dir);

#### 保存token文件

> $token = AccessToken::getInstance();
>$token->setCacheDriver('Filesystem')->setFilePath()->get('appid', 'appsecret');
