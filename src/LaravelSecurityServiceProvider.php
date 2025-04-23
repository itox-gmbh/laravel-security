<?php

namespace IToXGmbH\LaravelSecurity;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\URL;
use IToXGmbH\LaravelSecurity\Facades\LaravelSecurity;
use IToXGmbH\LaravelSecurity\Http\Middleware\SecurityMiddleware;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Congratulations! You made the web a little bit more secure.');
                    });
            });
        //            ->hasCommand(LaravelSecurityCommand::class);
    }

    public function register(): void
    {
        parent::register();

        $this->app->singleton('LaravelSecurity', function () {
            return new \IToXGmbH\LaravelSecurity\LaravelSecurity;
        });
    }

    public function boot(): void
    {
        parent::boot();

        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(SecurityMiddleware::class);

        $this->configureSecureUrls();
    }

    /**
     * Configure the secure URLs.
     */
    protected function configureSecureUrls(): void
    {
        if (! LaravelSecurity::isSSLEnforced()) {
            return;
        }

        URL::forceHttps(true);

        $this->app['request']->server->set('HTTPS', 'on');
    }
}
