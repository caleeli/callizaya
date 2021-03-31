<?php

namespace App\Http\Controllers;

use DateTime;

class ZoeController extends Controller
{
    // Valores para ajustar el array FFT
    private $MaxVal = 600000;
    private $BaseVal = 100000;

    public function criptoProyection($coin, $days = '28')
    {
        $curl = curl_init();
        $coin = \strtoupper($coin);
        $date = new DateTime();
        $end_date = $date->format('Y-m-d');
        $date->modify("-{$days} days");
        $separacion = 16;
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
        return view('zoe.btc', \compact('points', 'start', 'inc', 'separacion'));
    }

    public function criptoHistory($coin)
    {
        return $this->criptoProyection($coin, '28');
    }

    private function getData($date, $coin, $period= '-28 days')
    {
        $curl = curl_init();
        $coin = \strtoupper($coin);
        $end_date = $date->format('Y-m-d');
        $date->modify($period);
        $start_date = $date->format('Y-m-d');
        curl_setopt_array($curl, [
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
        return \compact('points', 'start', 'inc');
    }

    public function pix2pix()
    {
        $img = \imagecreatefrompng(\base_path('output.png'));
        $L = [];
        $C = [];
        for ($x = 0; $x < 256; $x++) {
            $C[$x] = 0;
            for ($y = 0; $y < 256; $y++) {
                $C[$x] += \imagecolorat($img, $x, $y);
            }
        }
        $T = 0;
        for ($y = 0; $y < 256; $y++) {
            $L[$y] = 0;
            for ($x = 0; $x < 256; $x++) {
                $v = \imagecolorat($img, $x, $y);
                $L[$y] += $v;
                $T += $v;
            }
        }
        $t = $T / 511;
        $data = [];
        for ($i = 0; $i < 256; $i++) {
            $v1 = ($L[$i] + $C[$i] - 2 * $t) / (2*255);  // valor del mapa de bits
            $v = $v1 / 0xFFFFFF * $this->MaxVal - $this->BaseVal;
            $data[$i] = $v;
        }
        return \view('zoe.pix2pix', \compact('data'));
    }

    public function pix2pixTrainData()
    {
        $path = 'app/facades/test/';
        $k = 3;
        $index = 50 * $k + 1; //151;
        $ii = $k * 50 + 13;
        for ($j = 0; $j < 10; $j++) {
            $date = new DateTime();
            $date->modify("-" . ($j * 2 + $ii) . " days");
            $res = $this->getData($date, 'btc');
            for ($i = 0; $i < 5; $i++) {
                $this->prepareTrainData($index++, $res, $i * 10, $path);
            }
        }
        dump(glob(\base_path($path . '*')));
    }

    private function prepareTrainData($index, $res, $pos = 0, $path)
    {
        $img = \imagecreatetruecolor(512, 256);
        // data 1
        $data1 = \array_slice($res['points'], $pos, 256);
        $data1 = \Fourier($data1, 1);
        // data 2
        $data2 = \array_slice($res['points'], $pos + 50, 256);
        $data2 = \Fourier($data2, 1);
        // draw
        $this->draw($data1, $img, 0);
        $this->draw($data2, $img, 256);
        \imagejpeg($img, \base_path($path . $index . '.jpg'));
    }

    private function draw($data, $img, $x0 = 0)
    {
        //$maxVal = 60000; $baseVal = 0;
        $maxVal = $this->MaxVal;
        $baseVal = $this->BaseVal;
        for ($i = 0; $i < 256; $i++) {
            $v = $data[$i] + $baseVal;
            $x = $i;
            for ($y = 0; $y < 256; $y++) {
                $rgb = \imagecolorat($img, $x + $x0, $y);
                //$r = ($rgb >> 16) & 0xFF;
                //$g = ($rgb >> 8) & 0xFF;
                //$b = $rgb & 0xFF;
                $color = round($rgb + $v / $maxVal * 0xFFFFFF);
                imagesetpixel($img, $x + $x0, $y, $color);
            }
            $y = $i;
            for ($x = 0; $x < 256; $x++) {
                $rgb = \imagecolorat($img, $x + $x0, $y);
                //$r = ($rgb >> 16) & 0xFF;
                //$g = ($rgb >> 8) & 0xFF;
                //$b = $rgb & 0xFF;
                $color = round($rgb + $v / $maxVal * 0xFFFFFF);
                imagesetpixel($img, $x + $x0, $y, $color);
            }
        }
    }

    public function probarSubeBaja()
    {
        $date = new DateTime();
        $date->modify('-15 days');
        $data = $this->getData($date, 'BTC', '-28 days');
        /////
        $inc = 33;
        $minDiff = 1;
        $filtroAmplitud = 0.011;
        $nEntradas = 220;
        /////
        //for($inc = 1; $inc < 64; $inc+=2)
        //for($minDiff = 1; $minDiff < 300; $minDiff+=10)
        //for($filtroAmplitud = 0.026; $filtroAmplitud <= 0.03; $filtroAmplitud+=0.0005)
        //for($nEntradas = 100; $nEntradas <= 340; $nEntradas+=10)
        {
            list($res, $err, $real, $pred) = $this->trainSubeBaja($data, $inc, $minDiff, $filtroAmplitud, $nEntradas);
            //dump("filtroAmplitud: $filtroAmplitud   err: $err");
            //dump($res, "err: $err    nEntradas: $nEntradas");
            dump("err: $err    inc: $inc");
        }
        return view('zoe.sube_baja', \compact('real', 'pred', 'inc'));
    }

    private function trainSubeBaja($data, $inc, $minDiff, $filtroAmplitud, $nEntradas)
    {
        $real = \array_slice($data['points'], 0, 512);
        $input = \array_slice($data['points'], 0, $nEntradas);
        while (\count($input) < 512) {
            $input[] = $real[$nEntradas];
        }
        $fft = \Fourier($input, 1);
        $fft = FiltroAmplitud($fft, $filtroAmplitud);
        $pred = \Fourier($fft, -1);
        $prevReal = $real[0];
        $prevPred = $pred[0];
        $res = [];
        $first = true;
        $err = 0;
        $cmp = 0;
        $real0 = $real;
        $pred0 = $pred;
        for ($i = $nEntradas ; $i <512 ; $i+=$inc) {
            $sumReal = 0;
            $sumPred = 0;
            $n = 0;
            for ($j = 0 ; $j < $inc ; $j++) {
                if ($i + $j >= 512) break;
                $sumReal += $real[$i + $j];
                $sumPred += $pred[$i + $j];
                $n++;
            }
            for ($j = 0 ; $j < $inc ; $j++) {
                if ($i + $j > 512) break;
                $real[$i + $j] = $sumReal / $n;
                $pred[$i + $j] = $sumPred / $n;
            }
        }
        for ($i = $nEntradas ; $i <512 ; $i+=$inc) {
            if ($first) {
                $prevReal = $real[$i];
                $prevPred = $pred[$i];
                $first = false;
                continue;
            }
            $subeBajaReal = $this->checkSubeBaja($real[$i], $prevReal, $minDiff);
            $subeBajaPred = $this->checkSubeBaja($pred[$i], $prevPred, $minDiff);
            $cmp++;
            if ($subeBajaReal != $subeBajaPred) {
                $err++;
            }
            $res[] = \sprintf(
                "%d %d => %s %s %s",
                $real[$i] - $prevReal,
                $pred[$i] - $prevPred,
                $subeBajaReal,
                $subeBajaReal == $subeBajaPred ? '==' : '!=',
                $subeBajaPred
            );
            $prevReal = $real[$i];
            $prevPred = $pred[$i];
        }
        return [$res, $err / $cmp, $real0, $pred0];
    }

    private function checkSubeBaja($val, $prev, $minDiff = 300)
    {
        if ($minDiff === 1 ) {
            $subeBaja = $val - $prev;
        } else {
            $subeBaja = intdiv($val - $prev, $minDiff);
        }
        return $subeBaja == 0 ? 0 : ($subeBaja > 0 ? 1 : -1);
    }
}
