<div>
    <svg viewBox="0 0 {{ $ejeX }} {{ $ejeY }}" style="width: {{ $width }}px; height: {{ $height }}px">
        <polyline points="{{ $points }}" style="fill:none;stroke:black;stroke-width:1" onmousemove="charMouseOver(event, {{$start}}, {{$inc}})"></polyline>
        @foreach($labels as $label)
        <circle cx="{{ $label['x'] }}" cy="{{ $label['y'] }}" fill="#ff000088" r="5">
            <title>{{ $label['title'] }}</title>
        </circle>
        @endforeach
        @foreach($maximos as $label)
        <circle cx="{{ $label['x'] }}" cy="{{ $label['y'] }}" fill="#ff000088" r="5">
            <title>{{ $label['title'] }}</title>
        </circle>
        <text x="{{ $label['x'] }}" y="{{ $label['y'] }}" fill="red" font-size="12" title="{{ $label['label'] }}">
            {{ $label['label'] }}
            <title>{{ $label['title'] }}</title>
        </text>
        @endforeach
    </svg>
</div>
<script>
function charMouseOver(event, start, inc) {

}
</script>