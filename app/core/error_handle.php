<?php

set_error_handler('wfc_error_handler');

function wfc_error_handler($errno, $errstr){
    // int $errno , string $errstr [, string $errfile [, int $errline [, array $errcontext ]]]
    die('
        <p>[ hinaExpress Framework] :   $errstr </p>
        <style>
            body {
            background: rgba(0,0,0,.01);
            }

            p {
            width: 80%;
            margin: auto;
            margin-top: 20px;
            border: 1px solid rgba(0,0,0,.1);
            color: #000;
            border-radius: 5px;
            padding: 10px;
            background: #fff;
        }
        </style>
  ');
}

