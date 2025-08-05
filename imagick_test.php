<?php
    $image = new Imagick();
    $image->newImage(1, 1, new ImagickPixel('#ffffff'));
    $image->setImageFormat('png');
    $pngData = $image->getImagesBlob();
    echo strpos($pngData, "\x89PNG\r\n\x1a\n") === 0 ? 'Ok' : 'Failed';