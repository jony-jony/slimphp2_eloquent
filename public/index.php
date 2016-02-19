<?php

/**
 * Default timezone
 */
date_default_timezone_set('America/Mexico_City');

/**
 * Define some constants
 */
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__DIR__)) . DS);
define("VENDOR_DIR", ROOT . "vendor" . DS);

/**
 * Include autoload file
 */
require_once VENDOR_DIR . "autoload.php";
use Illuminate\Database\Capsule\Manager as DB;

$capsule = new DB;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'ymprod2',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$app = new Slim\Slim(array(
    'debug' => true,
    'mode'  => 'development',
));

$app->get('/', function(){
    $users1 = DB::table('users')->get();
    $users2 = Users::find(1);
    echo "Slim Framework and Eloquent of Laravel Framawork";
 });

$app->run();
