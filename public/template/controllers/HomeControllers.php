<?php
/**
 * Home Controller
*/

class HomeControllers extends Miku {
    
    function default() {
        $this->views()->make("Welcome.miku",[
            'location' => '/public/template/views/Welcome.miku',
            'ver' => '2.0.0'
        ]);

    }
}