<?php

namespace TrafficCast\SocialiteClearGuide;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;
use Spatie\LaravelPackageTools\Package;

class SocialiteClearGuideServiceProvider extends ServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-socialite-clear-guide');
    }

    /**
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $socialite = $this->app->make(Factory::class);

        $socialite->extend('clear-guide', function () use ($socialite) {
            $config = config('services.clear-guide');

            return $socialite->buildProvider(SocialiteClearGuideProvider::class, $config);
        });
    }
}
