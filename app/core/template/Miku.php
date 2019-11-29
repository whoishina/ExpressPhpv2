<?php

class Miku {

    public $template_subdir  = '';

    public $template_content = "";

    public $views = ( MIKU['views'] ) ? MIKU['views'] : "/views/";

    public $controllers = ( MIKU['controllers'] ) ? MIKU['controllers'] : "/controllers/";
    
    public $request ;

    public $content = '';

    public $viewData ;

    public function views() {
        $this->template_subdir = $this->views;
        return $this ;
    }

    public function controllers() {
        $this->template_subdir = $this->controllers;
        return $this ;
    }


    public function render( $path ,$inputs = [] ) {
        $this->viewData = $inputs;
        require (TEMPLATE_PATH . $this->template_subdir. $path);
    }

    public function addVars(){
        // $this->viewData
    }

    
    public function make( $path ,$inputs = [] ) {
        
        $this->content =  file_get_contents (TEMPLATE_PATH . $this->template_subdir. $path);
        
        $this->viewData = ($inputs);

        $this->MikuRender();
        
        return $this->content;
    }

    public function MikuRender () {
        if( count($this->viewData) != 0  )
            foreach( $this->viewData as $viewDataItem => $thisItem ) {
                if( is_array($thisItem) ){
                    foreach( $thisItem as $subData => $theData ){
                        if( is_array($theData) ){
                            foreach( $theData as $subData1 => $theData1 ){
                                $this->content = str_replace( '{{'.$viewDataItem.'.'.  $subData.'.'.$subData1.'}}', $theData1 , $this->content );
                            }
                        }else 
                        $this->content = str_replace( '{{'. $viewDataItem .'.'.$subData.'}}' , $theData , $this->content );
                    }
                }else 
                $this->content = str_replace( '{{'. $viewDataItem .'}}' , $thisItem , $this->content );
            }
    }

    public function jsonCalll ($var)
    {
        return null ;
    }

    public function assets( $dir ) {
        return TEMPLATE_URI . "/assets/" . $dir ;
    }


    public function path( ) {
        return TEMPLATE_PATH . $this->template_subdir ;
    }

    
    public function uri( ) {
        return TEMPLATE_URI . $this->template_subdir ;
    }

    public function die($msg = "Template rendering has been stopped" ) {
        die($msg) ;
    }

    public function Miku() {
        $this->template_subdir = "";
        return $this ;
    }



}