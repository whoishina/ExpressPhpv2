<?php
Class Anime extends Miku {
    function getInfo(){
        $this->views()->make("anime.miku",[
            "name" => "Hieu",
            "age" => 19 
        ]);
    }
}