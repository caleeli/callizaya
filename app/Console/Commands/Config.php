<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

use function GuzzleHttp\json_encode;

class Config extends Command
{
    /**
     * The name and signature of the console command.
     *
     *
     * @var string
     */
    protected $signature = 'app:config';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $appUrl = $this->ask('(APP_URL) Application URL', config('app.url'));
        $parsed = parse_url($appUrl);
        $protocol = $parsed['scheme'];
        $broadcasterHost = $parsed['host'];
        $appDebug = $this->confirm('(APP_DEBUG) Enable debug mode?', config('app.debug'));
        $broadcasterHost = $this->ask('(BROADCASTER_HOST Host) Laravel Echo Host', $broadcasterHost);
        $broadcasterPort = $this->ask('(BROADCASTER_HOST Port) Laravel Echo Port', rand(9000, 9999));
        $protocol = $this->ask('(BROADCASTER_HOST Protocol) Laravel Echo Protocol', $protocol);
        $broadcasterId = $this->ask('(BROADCASTER_ID) Laravel Echo Host', uniqid());
        $broadcasterKey = $this->ask('(BROADCASTER_KEY) Laravel Echo Host', str_replace('.', '', uniqid('', true)));

        // Save .env
        $this->setEnv('APP_URL', $appUrl);
        $this->setEnv('APP_DEBUG', $appDebug);
        $this->setEnv('DB_DATABASE', base_path('database/database.sqlite'));
        $this->setEnv('BROADCASTER_HOST', "{$protocol}://{$broadcasterHost}:{$broadcasterPort}");
        $this->setEnv('BROADCASTER_ID', $broadcasterId);
        $this->setEnv('BROADCASTER_KEY', $broadcasterKey);

        // Save laravel-echo-server.json
        $config = [
            'authHost' => $appUrl,
            'authEndpoint' => '/broadcasting/auth',
            'clients' => [
                [
                    'appId' => $broadcasterId,
                    'key' => $broadcasterKey
                ]
            ],
            'database' => 'redis',
            'databaseConfig' => [
                'redis' => [],
                'sqlite' => [
                    'databasePath' => '/database/laravel-echo-server.sqlite'
                ]
            ],
            'devMode' => $appDebug,
            'host' => $broadcasterHost,
            'port' => $broadcasterPort,
            'protocol' => $protocol,
            'socketio' => [],
            'sslCertPath' => '',
            'sslKeyPath' => '',
            'sslCertChainPath' => '',
            'sslPassphrase' => '',
            'subscribers' => [
                'http' => true,
                'redis' => true
            ],
            'apiOriginAllow' => [
                'allowCors' => true,
                'allowOrigin' => $appUrl,
                'allowMethods' => 'GET, POST',
                'allowHeaders' => 'Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id'
            ]
        ];
        file_put_contents('laravel-echo-server.json', json_encode($config, JSON_PRETTY_PRINT));

        Artisan::call('key:generate');
        Artisan::call('storage:link');
    }

    /**
     * Set a .env configuration
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    private function setEnv($name, $value)
    {
        $config = file_exists('.env') ? file_get_contents('.env') : file_get_contents('.env.example');
        $newConfig = preg_replace('/^\s*' . preg_quote($name) . '\s*=.*$/m', "$name=$value", $config);
        file_put_contents('.env', $newConfig);
    }
}
