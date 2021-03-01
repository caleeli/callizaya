<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    private $points = '';
    private $width = 640;
    private $height = 320;
    private $ejeX = 640;
    private $ejeY = 320;
    private $maxY = 100;
    private $minY = 0;
    private $start = 0;
    private $inc = 1;
    private $labels = [];
    private $maximos = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $points, $operation="", $fftP1="up", $start=0, $inc=1, $separacion = 2, $showMax = false)
    {
        $this->fftP1 = $fftP1;
        $this->start = $start;
        $this->inc = $inc;
        $points = $this->doOperation($operation, $points);
        if (count($points) < 1) {
            return;
        }
        $factorX = $this->ejeX / count($points);
        $maxY = 0;
        $minY = 9999999999;
        foreach ($points as $i => $y) {
            $maxY = max($maxY, $y);
            $minY = min($minY, $y);
        }
        $maxY = $maxY * 1.1;
        $factorY = $this->ejeY / ($maxY - $minY);
        $result = [];
        $this->labels = [];
        foreach ($points as $i => $v) {
            $x = $i * $factorX;
            $y = ($maxY - $v)  * $factorY;
            $result[] = "$x, $y";
            if (($i % $separacion)===0) {
                $time = ($this->start + $this->inc * $i)/1000;
                $this->labels[] = [
                    'x' => $x,
                    'y' => $y,
                    'label' => ($i % ($separacion * 4))===0 ? date('M-d', $time) : '',
                    'title' => date('M-d', $time) . ': ' . number_format($v, 0),
                ];
            }
        }
        $this->points = implode(' ', $result);
        $this->width = 640;
        $this->height = round($this->width / $this->ejeX * ($maxY - $minY) * $factorY);
        $this->maxY = $maxY;
        $this->minY = $minY;
        $this->maximos = $showMax ? $this->maximos($points, $maxY, $factorX, $factorY) : [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.chart', [
            'points' => $this->points,
            'ejeX' => $this->ejeX,
            'ejeY' => $this->ejeY,
            'maxY' => $this->maxY,
            'minY' => $this->minY,
            'width' => $this->width,
            'height' => $this->height,
            'start' => $this->start,
            'inc' => $this->inc,
            'labels' => $this->labels,
            'maximos' => $this->maximos,
        ]);
    }

    private function doOperation($op, $data)
    {
        switch ($op) {
            case 'dx':
                return Derivar($data);
            case 'fft':
                // Transformada de Fourier
                $data = $this->prepareFFTData($data);
                return Fourier($data, 1);
            case 'ifft':
                // Transformada de Fourier
                //$data = $this->prepareFFTData($data);
                return Fourier($data, -1);
            case 'pfft':
                // Transformada de Fourier
                $data = $this->prepareFFTData($data);
                return $data;
            case 'filtro_mayor':
                // Transformada y filtrar solo grandes
                $data = $this->prepareFFTData($data);
                $data = Fourier($data, 1);
                $max = 0;
                foreach ($data as $v) {
                    $max = max($max, abs($v));
                }
                //$filtro = $max * 0.02;
                $filtro = $max * 0.011; // para -28 days
                $count = count($data);
                $filMin = $count * 0.0;
                $filMax = $count * 0.0;
                foreach ($data as $i => $v) {
                    $data[$i] = abs($v) >= $filtro && $i >= $filMin && $i <= ($count - $filMax) ? $v : 0;
                }
                $result = Fourier($data, -1);
                $result = Promediar(Promediar(Promediar(Promediar(Promediar($result, 2), 3), 4), 5), 6);
                return $result;
            }
        return $data;
    }

    private function prepareFFTData($data)
    {
        return $this->fftP1 === 'up' ? $this->completeFFTData($data) : $this->cutFFTData($data);
    }

    private function cutFFTData($data)
    {
        $size = pow(2, floor(log(count($data), 2)));
        return array_slice($data, 0, $size);
    }

    private function completeFFTData($data)
    {
        $size = pow(2, ceil(log(count($data), 2)) +0);
        $j = count($data)-0;
        $last = $data[$j-1];
        for ($i=$j; $i < $size; $i++) {
            $data[$i] = $last;//\rand(36000, 39000);
        }
        return $data;
    }

    private function maximos($data, $maxY, $factorX, $factorY)
    {
        $derivada = Derivar($data);
        $prev = $derivada[0];
        $res = [];
        foreach ($derivada as $i => $v) {
            $isMax = $v == 0 || ($prev * $v < 0);
            $prev = $v;
            if ($isMax) {
                $time = ($this->start + $this->inc * $i) / 1000;
                $y = ($maxY - $data[$i])  * $factorY;
                $label = date('M-d', $time);
                $title = date('M-d', $time) . ': ' . number_format($data[$i], 0);
                $x = $i * $factorX;
                $res[] = compact('x', 'y', 'label', 'title');
            }
        }
        return $res;
    }
}
