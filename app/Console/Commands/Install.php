<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;

class Install extends Config
{
    /**
     * The name and signature of the console command.
     *
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!file_exists('.env')) {
            parent::handle();
        }
        if (config('database.default') === 'sqlite'
            && !file_exists(config('database.connections.sqlite.database'))) {
            file_put_contents(config('database.connections.sqlite.database'), '');
        }
        Artisan::call('migrate:fresh', ['--seed' => true]);
        Artisan::call('passport:install');
    }
}
