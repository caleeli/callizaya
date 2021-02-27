<?php

namespace App\Http\Controllers;

use DateTime;

class ZoeController extends Controller
{
    public function criptoHistory($coin)
    {
        $curl = curl_init();
        $coin = \strtoupper($coin);
        $date = new DateTime();
        $end_date = $date->format('Y-m-d');
        $date->modify('-3 month');
        $start_date = $date->format('Y-m-d');
        curl_setopt_array($curl, [
            //CURLOPT_URL => 'https://production.api.coindesk.com/v2/price/values/BTC?start_date=2020-02-27T17:32&end_date=2021-02-27T23:59&ohlc=false',
            CURLOPT_URL => "https://production.api.coindesk.com/v2/price/values/{$coin}?start_date={$start_date}T00:00&end_date={$end_date}T23:59&ohlc=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:85.0) Gecko/20100101 Firefox/85.0',
                'Accept: application/json, text/plain, */*',
                'Accept-Language: en-US,en;q=0.5',
                'Origin: https://www.coindesk.com',
                'Connection: keep-alive',
                'Referer: https://www.coindesk.com/price/bitcoin',
                'TE: Trailers'
            ],
        ]);

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        $start = $response->data->entries[0][0];
        $inc = $response->data->entries[1][0] - $start;
        $points = \array_map(function ($data) {
            return $data[1];
        }, $response->data->entries);
        return view('zoe.btc', \compact('points', 'start', 'inc'));
    }
}
