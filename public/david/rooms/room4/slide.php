<h2 class="slide__name"></h2>
<h3 class="slide__title">
    Transformación material
    <div style="font-size: 12pt">
        <button onclick="playVideo('haydn')"> &#x25B6; Haydn 's Masterpiece-Emporor's Hymn,from String Quartet in C</button>
        <button onclick="stopTv('room5_audio')"> &#x25A0; </button>
    </div>
    <div class="slide__number">El arte y los procesos de transformación</div>
</h3>
<p class="slide__date"></p>
<div id="room5_audio" class="youtube-player-audio" style="width:1px;height:1px;display:none;"></div>
<?php
youtube('haydn', '1', '1', 'L_chH88_--A', 'room5_audio', 'youtube-player-audio');
