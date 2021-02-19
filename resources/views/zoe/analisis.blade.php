<pre>
    <a href='/zoe/random{{$query}}'>RANDOM</a>
    <svg viewBox="0 0 {{$ejeX}} {{ $maxY - $minY}}" style="width: {{$width}}px; height: {{$height}}px">
    <polyline points="{{ $points }}" style="fill:none;stroke:black;stroke-width:100"></polyline>
    <polyline points="{{ $points2 }}" style="fill:none;stroke:blue;stroke-width:100"></polyline>
    <polyline points="{{ $points3 }}" style="fill:none;stroke:green;stroke-width:100"></polyline>
    @foreach($best['acciones'] as $i => $acc)
        <text x="{{ $i * $factorX}}" y="{{ $maxY - $acc[3] }}" fill="red" font-size="300">{{ $acc[0] }}</text>
    @endforeach
    </svg>
    ACCIONES REALIZADAS:
    @foreach($best['acciones'] as $i => $acc)
        {{ $controller->printMontoBTC($i, $maxI, ...$acc) }}
    @endforeach

    TOTAL COBRADO: {{ number_format($best['cobros'], 2) }}
    TOTAL BILLETERA: {{ number_format($best['billeteraUSD'], 2) }}
    TOTAL CAPITAL: {{ number_format($best['capitalUSD'], 2) }} {{ $best['capital'] }}
    <b>TOTAL: {{ number_format($total, 2) }}</b>
</pre>