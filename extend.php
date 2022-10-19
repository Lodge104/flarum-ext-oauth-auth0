<?php

/*
 * This file is part of lodge104/oauth-auth0.
 *
 * Copyright (c) 2022 Lodge104.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace Lodge104\OAuthAuth0;

use Flarum\Extend;
use FoF\OAuth\Extend as OAuthExtend;
use Lodge104\OAuthAuth0\Providers\Auth0;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/locale'),

    (new OAuthExtend\RegisterProvider(Auth0::class)),
];
