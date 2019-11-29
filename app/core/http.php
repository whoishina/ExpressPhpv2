<?php

function having( $method , $data ){
    if( $method == 'post' )
    {
        foreach( $data as $item )
        {
            if( !isset($_POST[$item]) | ( isset($_POST[$item]) &&  $_POST[$item] == '') ) return false;
        }
        return true ;
    }else{
        foreach( $data as $item )
        {
            if( !isset($_GET[$item])  | ( isset($_GET[$item]) &&  $_GET[$item] == '')) return false;
        }
        return true ;
    }
}


function dead()
    {
        die ("<!DOCTYPE html><html><head><meta charset='utf-8'><title>Error</title></head><body><pre>Cannot GET  ". app::$path ." </pre></body></html>");
    }

function request( $url , $callback )
    {
        include_once __APPDIR.'/app/modules/curl.php';
        $curl = new cURL;
        $data = $curl->get( $url );

        if( !empty($data) )
        {
            $req = new class {
                public $uri = "OK";

                public function headers( Array $args )
                {

                }
            };

            $res = new class{

                public $status ;

            };

            $callback( $req , $res , $data );

        }
    }