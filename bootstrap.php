<?php


// should be initialized from the environment
$staging = "development";

if($staging=="development") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);    
}

require_once dirname(__FILE__) . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

switch($staging) {
    case "production":
        include("config_production.php");
        break;
    case "development":
    default:
        include("config_development.php");
}

$app = new \Slim\Slim($config['app']);

$log = $app->getLog();

try {
    $capsule = new Capsule();
    $capsule->addConnection($config['db']);
    $capsule->setEventDispatcher(new Dispatcher(new Container));
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
} catch (\PDOException $e) {    
    $log->error($e->getMessage());
}

$app->add(new \Slim\Middleware\ContentTypes());


// print_r($x);