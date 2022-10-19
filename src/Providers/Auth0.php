<?php

/*
 * This file is part of lodge104/oauth-auth0.
 *
 * Copyright (c) 2022 Lodge104.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace Lodge104\OAuthAuth0\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Riskio\OAuth2\Client\Provider\Auth0 as Auth0Provider;

class Auth0 extends Provider
{
    /**
     * @var Auth0Provider
     */
    protected $provider;

    public function name(): string
    {
        return 'auth0';
    }

    public function link(): string
    {
        return 'https://auth0.com/docs/get-started/applications/application-settings';
    }

    public function fields(): array
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
            'custom_domain' => 'required',
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new Auth0Provider([
            'customDomain' => $this->getSetting('custom_domain'),
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri'  => $redirectUri,
        ]);
    }

    public function suggestions(Registration $registration, $user, string $token)
    {
        $this->verifyEmail($email = $user->getEmail());

        $registration
            ->provideTrustedEmail($email)
            ->setPayload($user->toArray());
    }
}
