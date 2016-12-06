<?php

namespace SocialiteProviders\Etsy;

use SocialiteProviders\Manager\OAuth1\User;
use SocialiteProviders\Manager\OAuth1\AbstractProvider;

class Provider extends AbstractProvider
{
    /**
     * Unique Provider Identifier.
     */
    const IDENTIFIER = 'ETSY';

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->map([
             'id' => $user['id'],
             'nickname' => $user['nickname'],
             'name' => $user['name'],
             'email' => $user['email'],
             'avatar' => $user['avatar'],
        ]);
    }
}
