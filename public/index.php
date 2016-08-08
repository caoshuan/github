<?php
define('APP_PATH',dirname(__DIR__)."/");
define('CONFIG_PATH',APP_PATH.'config/');
define('HEART_PATH',APP_PATH.'fastphp/');
define('VIEW_PATH',APP_PATH.'application/views/');
define('MODEL_PATH',APP_PATH.'application/models/');

require CONFIG_PATH.'config.php';
require APP_PATH.'route.php';
$route=new routes;
$route->runroute();