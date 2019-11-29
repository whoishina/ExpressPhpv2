<?php

Route::get('/s',function($req,$res){
    echo $res->views()->make("Welcome.miku", [
        'location' => '/public/template/views/Welcome.miku',
        'ver' => '2.0.0'
    ]);
});

