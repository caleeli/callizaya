<div class="room__side room__side--back">
    <?php

    foreach(glob(__DIR__.'/back_*.jpg') as $file) {
        echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
        @include(substr($file,0, -3) . 'php');
    }
    ?>
</div>
<div class="room__side room__side--left">
    <?php
        foreach(glob(__DIR__.'/left_*.jpg') as $file) {
            echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
            @include(substr($file,0, -3) . 'php');
        }
    ?>
</div>
<div class="room__side room__side--right">
    <?php
        foreach(glob(__DIR__.'/right_*.jpg') as $file) {
            echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
            @include(substr($file,0, -3) . 'php');
        }
    ?>
</div>
<div class="room__side room__side--bottom">
    <?php
        foreach(glob(__DIR__.'/bottom_*.jpg') as $file) {
            echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
            @include(substr($file,0, -3) . 'php');
        }
    ?>
</div>
