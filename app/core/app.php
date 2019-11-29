<?php

require __DIR__ . "/template/Miku.php";
require __DIR__ . "/AppRoute.php";

class app extends AppRoute
{
    public static function error($status,$callback)
    {
        if($status == 404)
        {
            if(self::$routed == false)
            {
                $callback();
            }
        }
    }

    public static function checkinstall( $func )
    {
            if(DBNAME.DBHOST.DBUSER.DBPASS == '@example@example@example@example')
            {
                $func(true);
            }else{
                $func(false);
            }
    }

    public static function debug()
    {
        if( app::$routed==false ) {
            header("HTTP/1.0 404 Not Found");die();
        };
        $routercounting = app::$routercounting;
        echo ($routercounting==0) ? 'Route not working !' : "<p>Route count: {$routercounting} (GET)</p>";
        echo '<p>Render time: '.php_parse_time() . ' ms</p>';

    }

    public static function maintenance($text='maintenance')
    {
        app::get('/{all}',function(){},[ 'all'=>'(.*)' ])->die($text);
    }

    public static function include( $dir )
    {
        $filedir =    TEMPLATE_PATH.$dir.'.php';
        if(file_exists($filedir))
        {
            include $filedir;
        }else{
            $x = INSTALLED;
            echo "Cannot read file <strong>{$dir}.php</strong> from {$x}/public/template/";
        }

    }
    public static function use()
    {

    }

    public static function go( $dir )
    {
        header("location: $dir");
    }

    public static function get_template_directory_uri ( $dir )
    {
        return TEMPLATE_URI;
    }

    public static function once()
    {
        app::$once = true;
    }

    public static function is( $equal )
    {
        if( self::$ptype === $equal ) return true ; else return false;
    }
    private static function initBlade($views , $cache){
        vendor("blade");
        $views = __APPDIR.'/public/template'.$views ;
        $cache = __APPDIR.'/public/template'.$cache;
        self::$blade = new Blade($views, $cache);
    }
    public static function blade( $views = '/views' ,  $cache =  '/cache' ) {
        if( !self::$blade )
            self::initBlade( $views , $cache );
        return self::$blade ;
    }

}


class route extends app {

    public static function exit() {
        app::$routed = false ;
    }

}
function index() {
    
    $route_dir = TEMPLATE_PATH.'http.php' ;

    if(file_exists($route_dir))
    {
        include $route_dir;

    }else{
    
        if( app::$path === '/' )
        {
            require __DIR__ . "/errors/autoload.php";
        }



        
        // $query_data = $matchs[1];

        // // error_reporting(0);

        // if(app::$path[0] == '') {
            
        //     $query_data[0] = 'index';

        //     include TEMPLATE_PATH . ''. $query_data[0] . '.php';

        //     $query_data[0]::__construct();

        // }else{

        //     include TEMPLATE_PATH . ''. $query_data[0] . '.php';
            
        //     $func = $query_data[1];

        //     $query_data[0]::$func();
        // }
    }

}

function exit_route(){
    app::$routed = false ;
}

class Library {

    public   $lib_dir = "/core";

    public function core (  ) {
        $this->lib_dir = "/core";
        return $this ;
    }


    public function base () {
        $this->lib_dir = "/base";
        return $this ;
    }

    public function require ( $fdir ) {
        require __APPDIR . "/app". $this->lib_dir ."/{$fdir}.php";
    }

    public function return ( $fdir ) {
        return require __APPDIR . "/app". $this->lib_dir ."/{$fdir}.php";
    }

    public function module() {
        $this->lib_dir = "/modules";
        return $this ;
    }

    function import( $module_name )
    {
        require_once __APPDIR."/app{$this->lib_dir}/{$module_name}.php";
    }

    function load( $mod_name )
    {
        require __APPDIR."/app{$this->lib_dir}/{$mod_name}/vendor/autoload.php";
    }

}