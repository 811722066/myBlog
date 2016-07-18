<?php

use Phalcon\Config;

return new config([
    'tutorial' => [
        //'adapter' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'username' => 'root',
        'password' => '',
        'dbname' => 'tutorial'
    ],
    'invo' => [
        //'adapter' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'username' => 'root',
        'password' => '',
        'dbname' => 'invo'
    ],
    'application' => [
        'controllersDir' => APP_DIR . '/controllers/',
        'modelsDir' => APP_DIR . '/models/',
        'viewsDir' => APP_DIR . '/views/',
        'baseUri' => '/myBlog/'
    ]
]);