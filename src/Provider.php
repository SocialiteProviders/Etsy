<?php

namespace SocialiteProviders\Etsy;

use Laravel\Socialite\One\User;
use SocialiteProviders\Etsy\EtsyAbstractProvider;

class Provider extends EtsyAbstractProvider
{
    /**
     * {@inheritDoc}
     */
    public function user()
    {
        if (!$this->hasNecessaryVerifier()) {
            throw new \InvalidArgumentException('Invalid request. Missing OAuth verifier.');
        }

        $user = $this->server->getUserDetails($token = $this->getToken());

        return (new User())->map([
             'id' => $user->id,
             'nickname' => $user->nickname,
             'name' => $user->name,
             'email' => $user->email,
             'avatar' => $user->avatar,
        ])->setToken($token->getIdentifier(), $token->getSecret());
    }
}
