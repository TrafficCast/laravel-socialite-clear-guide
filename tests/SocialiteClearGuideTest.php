<?php

use Laravel\Socialite\Contracts\Factory;
use TrafficCast\SocialiteClearGuide\SocialiteClearGuideProvider;

it("can instantiate the clear guide driver", function () {
    $socialite = app(Factory::class);
    $driver = $socialite->driver('clear-guide');
    expect($driver)->toBeInstanceOf(SocialiteClearGuideProvider::class);
});
