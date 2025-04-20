<?php

namespace IToXGmbH\LaravelSecurity;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IToXGmbH\LaravelSecurity\Commands\LaravelSecurityCommand;

class LaravelSecurityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-security')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_security_table')
            ->hasCommand(LaravelSecurityCommand::class);
    }
}
