<h3>proyección</h3>
<x-chart :points="$points" :separacion="$separacion" operation="filtro_mayor" :start="$start" :inc="$inc" />
<h3>actual</h3>
<x-chart :points="$points" :separacion="$separacion" operation="pfft" :start="$start" :inc="$inc" />
