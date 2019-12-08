<?php

require "env.php";

require "database.php";

Route::get('/',"HomeControllers\HomeControllers:default");

Route::get('/anime',"Anime\Anime:getInfo");

Route::group("api",function(){
    Route::group("v2",function(){
        Route::get("/episode/{id}", "Episode\Episode:getPlayer" );
    });

});