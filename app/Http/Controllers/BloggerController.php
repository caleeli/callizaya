<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloggerController extends Controller
{
    const ACTIONS = 4;

    public function prepare()
    {
        return view('blogger.prepare');
    }

    public function random(Request $request)
    {
        $cobro = $request->input('cobro', 800) * 1;
        $T= 9;
        $this->preciosBTC = $this->randPreciosBTC($T);
        file_put_contents(\storage_path('app/precios.json'), json_encode($this->preciosBTC));
        return \redirect('/zoe?cobro=' . $cobro);
    }

    public function zoe(Request $request)
    {
        $cobro = $request->input('cobro', 800) * 1;
        $this->preciosBTC = json_decode(file_get_contents(\storage_path('app/precios.json')));
        return $this->optimizar($cobro);
    }

    private function optimizar($minCobro)
    {
        $max = -1;
        $best = null;
        $N = pow(self::ACTIONS, count($this->preciosBTC));
        // probar...
        for ($i=0; $i<$N; $i++) {
            $res = $this->simular($i);
            if ($res['cobros'] < $minCobro) {
                //continue;
                $value = $res['cobros'];
            } else {
                $value = $res['cobros'] + $res['billeteraUSD'] + $res['capitalUSD'];
            }
            if ($value > $max) {
                $best = $res;
                $max = $value;
                $maxI = $i;
            }
        }
        return $this->printBest($best, $max, $maxI);
    }

    private function printBest($best, $max, $maxI)
    {
        $query = request()->input('cobro') ? '?cobro=' . request()->input('cobro') : '';
        $total = $best['cobros'] + $best['billeteraUSD'] + $best['capitalUSD'];
        $controller = $this;
        $ejeX = 24000;
        $factorX = $ejeX / count($best['acciones']);
        $maxY = 0;
        $minY = 9999999999;
        foreach ($best['acciones'] as $i => $acc) {
            $maxY = max($maxY, $acc[3]);
            $minY = min($minY, $acc[3]);
        }
        $maxY += 1000;
        $points = [];
        foreach ($best['acciones'] as $i => $acc) {
            $x = $i * $factorX;
            $y = $maxY - $acc[3];
            $points[] = "$x, $y";
        }
        $points = implode(' ', $points);
        $points2 = [];
        foreach ($best['acciones'] as $i => $acc) {
            $x = $i * $factorX;
            $y = $maxY - $minY - round($acc[4]);
            $points2[] = "$x, $y";
        }
        $points2 = implode(' ', $points2);
        $points3 = [];
        $cobros = 0;
        foreach ($best['acciones'] as $i => $acc) {
            $x = $i * $factorX;
            if ($acc[0] === 'COBRAR') {
                $cobros += $acc[2];
            }
            $y = $maxY - $minY - $cobros;
            $points3[] = "$x, $y";
        }
        $points3 = implode(' ', $points3);
        $width = 640;
        $height = round($width / $ejeX * ($maxY - $minY));
        return \view('zoe.analisis', compact('controller', 'query', 'total', 'best', 'max', 'maxI', 'points', 'maxY', 'minY', 'width', 'height', 'ejeX', 'factorX', 'points2', 'points3'));
    }

    private function simular($seed)
    {
        $tasa = 0.07;//0.00233;
        $capital = 0.02788024;
        $billetera = 0.00149646 + 0.00224519;
        $cobros = 0;
        $acciones = [];
        $moneda = 'BTC';
        foreach ($this->preciosBTC as $precioBTC) {
            $usrAction = $seed % self::ACTIONS;
            $seed = intdiv($seed, self::ACTIONS);
            $billetera += $capital * $tasa;
            $billeteraUSD = $moneda === 'BTC' ? $billetera * $precioBTC : $billetera;
            $capitalUSD = $moneda === 'BTC' ? $capital * $precioBTC : $capital;
            $total = $capitalUSD + $billeteraUSD + $cobros;
            if ($usrAction === 3) {
                $acciones[] = ['CAPITALIZAR', $billetera, $billeteraUSD, $precioBTC, $total];
                // capitalizar
                $capital += $billetera;
                $billetera = 0;
            } elseif ($usrAction === 2) {
                $acciones[] = ['COBRAR', $billetera, $billeteraUSD, $precioBTC, $total];
                // cobrar
                $cobros += $billeteraUSD;
                $billetera = 0;
            } elseif ($usrAction === 1) {
                $acciones[] = ['CONVERTIR', $billetera, $billeteraUSD, $precioBTC, $total];
                $moneda = $moneda === 'BTC' ? 'USD' : 'BTC';
                if ($moneda === 'USD') {
                    $capital = $capital * $precioBTC;
                    $billetera = $billetera * $precioBTC;
                } else {
                    $capital = $capital / $precioBTC;
                    $billetera = $billetera / $precioBTC;
                }
            } else {
                $acciones[] = ['MANTENER', $billetera, $billeteraUSD, $precioBTC, $total];
            }
        }
        return compact('cobros', 'capital', 'billeteraUSD', 'capitalUSD', 'acciones');
    }

    private function randPreciosBTC($T)
    {
        $precioBTC = 39000;
        $preciosBTC = [];
        for ($i=0; $i<$T; $i++) {
            $btcAction = rand(-10, 10); // -1=baja 0=se mantiene 1=sube
            $precioBTC = min(80000, max(9000, $precioBTC+ 300 * $btcAction));
            $preciosBTC[] = $precioBTC;
        }
        return $preciosBTC;
    }
    public function printMontoBTC($i, $N, $label, $btc, $usd, $precioBTC, $total)
    {
        echo sprintf(
            "<a href='/zoe/replay/%s/%s'>%16s</a> %22s ($%s) (BTC=%s) (TOTAL=%s)\n",
            $N,
            $i,
            $label,
            $btc,
            number_format($usd, 2),
            number_format($precioBTC, 2),
            number_format($total, 2),
        );
    }

    // 12 = (0,1,1,0,0)
    // n=12 i=1
    // pos = 3  pos2=9
    // m = 4 //1
    // val = 1 -> 2
    // n1 = 0
    // new = val * pos + m * pos + n1 = 2*3 + 1*9 +0
    // 15 = (0,2,1)
    public function replay($n, $i)
    {
        $pos = pow(self::ACTIONS, $i);
        $pos2 = $pos * self::ACTIONS;
        $m = intdiv($n, $pos);
        $m2 = intdiv($n, $pos2);
        $val = $m % self::ACTIONS;
        $val = ($val + 1) % self::ACTIONS;
        $n1 = $n % $pos;
        $new = $n1 + $val * $pos + $m2 * $pos2;
        $this->preciosBTC = json_decode(file_get_contents(\storage_path('app/precios.json')));
        $best = $this->simular($new);
        $value = $best['cobros'];//max(1, $res['cobros']/ 200) + $res['billeteraUSD'] + $res['capitalUSD'];
        return $this->printBest($best, $value, $new);
    }
}
