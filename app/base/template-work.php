<?php

function get_template_directory_uri() {
    return TEMPLATE_URI ;
}

function get_template_directory() {
    return TEMPLATE_PATH ;
}

function module( $name ) {
    require_once TEMPLATE_PATH . '/'. $name ;
}
