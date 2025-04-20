<?php

namespace IToXGmbH\LaravelSecurity;

use IToXGmbH\LaravelSecurity\Commands\LaravelSecurityCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\Concerns;


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
            ->hasConfigFile(['security'])
            ->hasRoute('web')
//            ->hasCommand(LaravelSecurityCommand::class)
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->endWith(function(InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
//            ->hasCommand(LaravelSecurityCommand::class);
    }
}
