<?php 
// Initialise your autoloader (this example is using Composer)
require 'autoload.php';

use WebPConvert\WebPConvert;

$source = __DIR__ . '/logo.png';
$destination = $source . '.webp';
$options = [
    'png' => [
        'encoding' => 'auto',    /* Try both lossy and lossless and pick smallest */
        'near-lossless' => 60,   /* The level of near-lossless image preprocessing (when trying lossless) */
        'quality' => 85,         /* Quality when trying lossy. It is set high because pngs is often selected to ensure high quality */
    ],
    'jpeg' => [
        'encoding' => 'auto',     /* If you are worried about the longer conversion time, you could set it to "lossy" instead (lossy will often be smaller than lossless for jpegs) */
        'quality' => 'auto',      /* Set to same as jpeg (requires imagick or gmagick extension, not necessarily compiled with webp) */
        'max-quality' => 80,      /* Only relevant if quality is set to "auto" */
        'default-quality' => 75,  /* Fallback quality if quality detection isnt working */
    ]
];
WebPConvert::convert($source, $destination, $options);
?>