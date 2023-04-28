<?php

namespace TrafficCast\SocialiteClearGuide;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TrafficCast\SocialiteClearGuide\Commands\SocialiteClearGuideCommand;

class SocialiteClearGuideServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-socialite-clear-guide')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-socialite-clear-guide_table')
            ->hasCommand(SocialiteClearGuideCommand::class);
    }
}
