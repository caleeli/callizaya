<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class JddAutoloaddump extends Command
{
    /**
     * The name and signature of the console command.
     *
     *
     * @var string
     */
    protected $signature = 'jdd-package:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the installed jdd packages';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Artisan::all() as $name => $command) {
            if (substr($name, -11) === ':jdd-update') {
                $this->call($name);
            }
        }
    }
}
