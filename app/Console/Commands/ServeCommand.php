<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ServeCommand as Command;
use Symfony\Component\Console\Input\InputOption;

class ServeCommand extends Command
{


    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        $config = parse_url(config('app.url'));
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', $config['host']],

            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on', $config['port'] ?? ''],

            ['tries', null, InputOption::VALUE_OPTIONAL, 'The max number of ports to attempt to serve from', 10],
        ];
    }
}
