<?php

namespace IToXGmbH\LaravelSecurity\Commands;

use Illuminate\Console\Command;

class LaravelSecurityCommand extends Command
{
    public $signature = 'laravel-security';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
