<?php

require __DIR__ . '/../vendor/autoload.php';

use eftec\bladeone\BladeOne;

$layouts = __DIR__ . '/layouts';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($layouts, $cache, BladeOne::MODE_AUTO);

/*
echo $blade->run('index', [
    'title' => '',
    'content' => ''
]);
*/
echo $blade->run('index');
//echo $layouts;