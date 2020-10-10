<?php

namespace Tests\Performance;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use Tests\Feature\ChartJsTrait;
use Tests\TestCase;

/**
 * Workflow
 */
class ApiTest extends TestCase
{
    use DatabaseMigrations;
    use ChartJsTrait;

    private $recordsIncrement = 2;
    private $repetitions = 100;

    /**
     * Test api routes speed.
     *
     * @diagram canvas 150 300
     */
    public function testApiSpeed()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        Passport::actingAs(
            $user,
            ['users']
        );

        // Create a test route with auth:api
        $testRoute = 'test-route';
        Route::middleware('auth:api')->get($testRoute, function () {return '{}';});
        //$base = $this->performRouteTest($testRoute);

        // Time the api response time for different number of records
        $labels = [];
        $speed = [];
        $times = [];
        $top = [];
        $medidas = [];
        for ($j = 0;$j < 24;$j++) {
            $path = '/api/data/users';
            $class = User::class;
            $test = $this->performRouteTest($path);
            factory($class, $this->recordsIncrement)->create();
            $labels[] = $j * $this->recordsIncrement;
            $speed[] = $test['requestsPerSecond'];
            $times[] = $test['time'];
            //$top[] = $base['requestsPerSecond'];
            foreach ($test['times'] as $i => $time) {
                $medidas[$i][] = $time;
            }
        }

        $this->saveLineChart('API response time for different number of records', '# records', 'request/sec', $labels, ...$medidas);
    }

    private function performRouteTest($path)
    {
        $fn = 'call';
        $times = $this->repetitions;
        $t = microtime(true);
        $medidas = [];
        for ($i = 0;$i < $times;$i++) {
            timeMes(0);
            $this->$fn('GET', $path);
            timeMes();
            $medidas = timeMes(2, $medidas);
        }
        $time = microtime(true) - $t;
        $requestsPerSecond = round($times / $time * 10) / 10;
        array_walk($medidas, function (&$time) use ($times) {$time = $time / $times;});
        return [
            'route' => $path,
            'requestsPerSecond' => $requestsPerSecond,
            'time' => round($time / $times * 100000) / 100,
            'times' => $medidas,
        ];
    }
}

function timeMes($action = 1, array $medidas = [])
{
    static $times;
    if ($action === 0) {
        $times = [microtime(true)];
    } elseif ($action === 1) {
        $times[] = microtime(true);
    } elseif ($action === 2) {
        $meds = array_slice($times, 1);
        foreach ($meds as $i => $time) {
            if (!isset($medidas[$i])) {
                $medidas[$i] = 0;
            }
            $medidas[$i] += $time - $times[0];
        }
        return $medidas;
    }
}
