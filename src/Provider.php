<?php

namespace SocialiteProviders\Etsy;

use SocialiteProviders\Manager\OAuth1\User;

class Provider extends EtsyAbstractProvider
{
    /**
     * Unique Provider Identifier.
     */
    const IDENTIFIER = 'ETSY';

    /**
     * {@inheritdoc}
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
