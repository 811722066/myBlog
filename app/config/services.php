<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Cache\Multiple;
use Phalcon\Cache\Frontend\Output as FrontendCache;
use Phalcon\Cache\Backend\File as BackendCache;
use Phalcon\Cache\Frontend\Data as DataCache;

$di = new FactoryDefault();

$di->set('config', $config);

$di->set('url', function() use($config){
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

$di->set('view', function() use($config){
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    return $view;
}, true);

$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Tutorial\Controllers');
    return $dispatcher;
});

//设置连接数据库信息--连接tutorial库
$di->set('tutorial', function () use ($config) {
    return new DbAdapter($config->tutorial->toArray());
});
//设置连接数据库信息--连接invo库
$di->set('invo', function () use ($config) {
    return new DbAdapter($config->invo->toArray());
});

//注入viewCache，可以缓存静态页面
$di->set('viewCache', function(){

    //设置缓存时间
    $frontCache = new FrontendCache(["lifetime" => 60*60*24]);

    $cache = new BackendCache($frontCache, ["cacheDir" => BASE_DIR ."/var/cache/",]);
    //设置多级缓存
    /*$cache = new Multiple([
        //设置页面缓存
        new BackendCache($frontCache, ["cacheDir" => BASE_DIR ."/var/cache/",]),
    ]);*/

    return $cache;
});
