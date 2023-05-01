<?php

namespace TrafficCast\SocialiteClearGuide\Tests;

use Laravel\Socialite\SocialiteServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use TrafficCast\SocialiteClearGuide\SocialiteClearGuideServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SocialiteServiceProvider::class,
            SocialiteClearGuideServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.clear-guide', [
            'client_id' => 'clear-guide-client-id',
            'client_secret' => 'clear-guide-secret',
            'redirect' => 'https://your-callback-url',
        ]);
    }
}
