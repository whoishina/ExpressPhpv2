<?php

(new Library)->base()->require("medoo");

use Medoo\Medoo; 

App::$db = new Medoo([
    // required
    'database_type' => 'mysql',
    'database_name' => 'anime_syncs',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    // [optional]
    'charset' => 'utf8mb4',
]);

