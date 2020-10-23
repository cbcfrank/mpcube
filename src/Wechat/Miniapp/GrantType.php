<?php

namespace Mpcube\Wechat\Miniapp;

/**
 * 授权类型
 */
class GrantType
{
    // auth.code2Session
    const AUTHORIZATION_CODE = 'authorization_code';

    // auth.getAccessToken
    const CLIENT_CREDENTIAL = 'client_credential';
}