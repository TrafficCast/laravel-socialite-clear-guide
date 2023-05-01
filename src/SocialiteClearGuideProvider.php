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
    protected $scopes = [];

    /**
     * @var string
     */
    protected $scopeSeparator = ' ';

    /**
     * @return string
     */
    public function getClearGuideUrl()
    {
        return config('services.clear-guide.base_uri').'/api';
    }

    /**
     * @param  string  $state
     * @return string
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->getClearGuideUrl().'/token', $state);
    }

    /**
     * @return string
     */
    protected function getTokenUrl()
    {
        return $this->getClearGuideUrl().'/token';
    }

    /**
     * @param  string  $token
     * @return array|mixed
     *
     * @throws GuzzleException
     */
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->post($this->getClearGuideUrl().'/o/userinfo/', [
            'headers' => [
                'cache-control' => 'no-cache',
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
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
