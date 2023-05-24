<?php

namespace TrafficCast\SocialiteClearGuide;

use GuzzleHttp\Exception\GuzzleException;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\User;

class SocialiteClearGuideProvider extends AbstractProvider
{
    /**
     * @var string[]
     */
    protected $scopes = ['openid'];

    /**
     * Indicates if PKCE should be used.
     *
     * @var bool
     */
    protected $usesPKCE = true;

    /**
     * @return string
     */
    public function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(config('services.clear-guide.base_uri').'/o/authorize/', $state);
    }

    /**
     * @return string
     */
    protected function getTokenUrl()
    {
        return config('services.clear-guide.base_uri').'/o/token/';
    }

    /**
     * @param  string  $token
     * @return array|mixed
     *
     * @throws GuzzleException
     */
    protected function getUserByToken($token)
    {
        $userUrl = config('services.clear-guide.base_uri').'/o/userinfo/';

        $response = $this->getHttpClient()->get($userUrl, [
            'headers' => [
                'cache-control' => 'no-cache',
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return User
     */
    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['sub'],
            'email' => $user['email'],
            'name' => $user['first_name'].' '.$user['last_name'],
            'is_staff' => $user['is_staff'],
            'is_superuser' => $user['is_superuser'],
            'organization' => $user['organization'],
            'user_profile' => $user['user_profile'],
        ]);
    }
}
