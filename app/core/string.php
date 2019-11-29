<?php
return new class {
    public $content = '';   
    public $var ;


    public function get() {
        return $this->content;
    }

    public function exec() {
    }

    public function view() {
        echo  $this->content;
    }

    public function fetch () {
        $this->view();
    }

    public function let( $var ){
        global $var ;
        $this->var = $var ;
        $this->put($var);
        return $this;
    }

    public function put($ctn){
        $this->content = $ctn ;
        return $this ;
    }

    public function replace( $find , $rpl ){
        $this->content = str_replace( $find , $rpl , $this->content);
        return $this ;
    }
    
    public function uppercase() {
        $this->content = uppercase($this->content);
        return $this ;
    }

    public function lowercase() {
        $this->content = lowercase($this->content);
        return $this ;
    }

    public function strpos($string, $find, $start){
        $this->content = strpos($string, $find, $start);
        return $this ;
    }

    public function explode($find, $returns){
        $this->content = strpos($find, $returns);
        return $this ;
    }

    // public function ($find, $returns){
    //     $this->content = strpos($find, $returns);
    //     return $this ;
    // }
};