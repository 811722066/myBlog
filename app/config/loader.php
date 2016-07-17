<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces([
    'Tutorial\Controllers' => $config->application->controllersDir,
    'Tutorial\Models' => $config->application->modelsDir,
]);

$loader->register();