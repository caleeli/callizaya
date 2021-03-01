<?php

// !!! Warning: for reference, not debugged

###################################################################
# PHP_Fourier 0.03b
# Original Fortran source by Numerical Recipies
# PHP port by Mathew Binkley (binkleym@nukote.com)
###################################################################

###################################################################
# Fourier($data, $sign) - Performs the FFT on the *complex*
#                         array $data
#
# Presumes that count($data) is an integer power of two (ie: 2^n)
# (hint: When your $data length is not a power of 2, pad with zeros to the next-higher power.)
#
# $data[even] holds the real portion
# $data[odd] hold the imaginary portion
#
# Example: (1 + 2i) ->  $data[0] = 1; $data[1] = 2;
#
# $sign = 1  performs the Fourier Transform
# $sign = -1 performs the Inverse Fourier Transform
#
# Use:
#      FFT operates on an array
#      $data = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16); # 16 = 2^4
#
#      Compute FFT of the `$data` array:
#      $FFT_array = Fourier($data, 1);
#
#      Compute inverse FFT, which should equal our original `$data` vector:
#      $Inverse_FFT_array = Fourier($FFT_array, -1);
#
###################################################################

function Fourier($input, $isign)
{

   #####################################################################
    # We need to shift the array up one because this script is a direct
    # port of the fortran program from NR.  Should fix in future.
    #####################################################################
    $data[0] = 0;
    for ($i = 0; $i < count($input); $i++) {
        $data[($i+1)] = $input[$i];
    }

    $n = count($input);

    $j = 1;

    for ($i = 1; $i < $n; $i += 2) {
        if ($j > $i) {
            list($data[($j+0)], $data[($i+0)]) = [$data[($i+0)], $data[($j+0)]];
            list($data[($j+1)], $data[($i+1)]) = [$data[($i+1)], $data[($j+1)]];
        }

        $m = $n >> 1;

        while (($m >= 2) && ($j > $m)) {
            $j -= $m;
            $m = $m >> 1;
        }

        $j += $m;
    }

    $mmax = 2;

    while ($n > $mmax) {  # Outer loop executed log2(nn) times
        $istep = $mmax << 1;

        $theta = $isign * 2*pi()/$mmax;

        $wtemp = sin(0.5 * $theta);
        $wpr   = -2.0*$wtemp*$wtemp;
        $wpi   = sin($theta);

        $wr = 1.0;
        $wi = 0.0;
        for ($m = 1; $m < $mmax; $m += 2) {  # Here are the two nested inner loops
            for ($i = $m; $i <= $n; $i+= $istep) {
                $j = $i + $mmax;

                $tempr = $wr * $data[$j]     - $wi * $data[($j+1)];
                $tempi = $wr * $data[($j+1)] + $wi * $data[$j];

                $data[$j]     = $data[$i]     - $tempr;
                $data[($j+1)] = $data[($i+1)] - $tempi;

                $data[$i]     += $tempr;
                $data[($i+1)] += $tempi;
            }
            $wtemp = $wr;
            $wr = ($wr * $wpr) - ($wi    * $wpi) + $wr;
            $wi = ($wi * $wpr) + ($wtemp * $wpi) + $wi;
        }
        $mmax = $istep;
    }

    $len = count($data);
    $sqr = sqrt(2/$n);
    for ($i = 1; $i < $len; $i++) {
        $data[$i] = $data[$i] * $sqr;                   # Normalize the data
        if (abs($data[$i]) < 1E-8) {
            $data[$i] = 0;
        }  # Let's round small numbers to zero
      $input[($i-1)] = $data[$i];                # We need to shift array back (see beginning)
    }

    return $input;
}


function FiltroAmplitud($data, $value = 0.02)
{
    $max = 0;
    foreach ($data as $v) {
        $max = max($max, abs($v));
    }
    $filtro = $max * $value;
    foreach ($data as $i => $v) {
        $data[$i] = abs($v) >= $filtro ? $v : 0;
    }
    return $data;
}


function Promediar($data, $steps = 2)
{
    $sum = 0;
    $n = 0;
    $last = count($data) - 1;
    foreach ($data as $i => $v) {
        $sum += $v;
        $n++;
        if (($i % $steps) === 0 || $i === $last) {
            $y1 = $data[$i - $n + 1];
            $y2 = $v;
            $B = ($y2 - $y1) / $n;
            $t = 0;
            for ($j = $i - $n + 1; $j <= $i; $j++) {
                $data[$j] = $y1 + $B * $t;
                $t++;
            }
            $sum = 0;
            $n = 0;
        }
    }
    return $data;
}

function Derivar($data)
{
    $dx = [];
    for ($i=1, $l=count($data); $i < $l; $i++) {
        $dx[] = $data[$i] - $data[$i - 1];
    }
    return $dx;
}

function Maximos($data)
{
    $derivada = Derivar($data);
    $prev = $derivada[0];
    $res = [];
    foreach ($derivada as $v) {
        $isMax = $v == 0 || ($prev * $v < 0);
        if ($isMax) {
            $res[] = $v;
        } else {
            $res[] = 0;
        }
    }
    return $res;
}
