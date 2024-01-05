<?php


use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => defined('DB_HOST') ? DB_HOST : 'localhost', 
    'database'  => defined('DB_NAME') ? DB_NAME : 'ahli5',
    'username'  => defined('DB_USER') ? DB_USER : 'root',
    'password'  => defined('DB_PASSWORD') ? DB_PASSWORD : 'luqman1234',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();