<?php
/**
 * Created by PhpStorm.
 * User: FRANK
 * Date: 2019/7/8
 * Time: 15:59
 */

namespace Minicub\Wechat\Publics\Menu;

class ButtonType
{
    const CLICK = 'click';

    const VIEW= 'view';

    const SCANCODE_PUSH = 'scancode_push';

    const SCANCODE_WAITMSG = 'scancode_waitmsg';

    const PIC_SYSPHOTO = 'pic_sysphoto';

    const PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';

    const PIC_WEIXIN = 'pic_weixin';

    const LOCATION_SELECT = 'location_select';

    const MEDIA_ID = 'media_id';

    const VIEW_LIMITED = 'view_limited';

    const MINIPROGRAM = 'miniprogram';
}