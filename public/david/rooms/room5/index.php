<div class="room__side room__side--back">
    <?php

    foreach(glob(__DIR__.'/back_*.*') as $file) {
        if (substr($file,-3, 3) === 'jpg') {
            echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
        } elseif (substr($file,-3, 3) === 'php') {
            @include(substr($file,0, -3) . 'php');
        }
    }
    ?>
</div>
<div class="room__side room__side--left">
    <?php
        foreach(glob(__DIR__.'/left_*.*') as $file) {
            if (substr($file,-3, 3) === 'jpg') {
                echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>"  style="margin-left:40em;"/>';
            } elseif (substr($file,-3, 3) === 'php') {
                @include(substr($file,0, -3) . 'php');
            }
        }
    ?>
</div>
<div class="room__side room__side--right">
    <?php
        foreach(glob(__DIR__.'/right_*.*') as $file) {
            if (substr($file,-3, 3) === 'jpg') {
                echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
            } elseif (substr($file,-3, 3) === 'php') {
                @include(substr($file,0, -3) . 'php');
            }
        }
    ?>
</div>
<div class="room__side room__side--bottom">
    <?php
        foreach(glob(__DIR__.'/bottom_*.*') as $file) {
            if (substr($file,-3, 3) === 'jpg') {
                echo '<img class="room__img" src="', substr($file, strlen(getcwd()) + 1) ,'?<?= time() ?>" />';
            } elseif (substr($file,-3, 3) === 'php') {
                @include(substr($file,0, -3) . 'php');
            }
        }
    ?>
</div>
