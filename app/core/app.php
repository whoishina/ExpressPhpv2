<?php

require __DIR__ . "/template/Miku.php";


class Route_Get {

    public function debug( $tab = true)
    {
        error_reporting(E_ALL);
        app::$routed= true ;
        $br = ($tab == true) ? '</br/>' : '';
        echo app::$path.$br;
        echo 'route count: '.app::$routercounting.$br;
        die();
    }
    public function die( $msg = '')
    {
        if(app::$routed == false)
        {
            die( $msg );
        }
    }
    public function diefunc($callback)
    {

        if(app::$routed == false)
        {
                $callback();
        }
    }
    public function withJson( $status = 200 ) {

    }
}

class Route_Request {

    public $params;
    public $header;
    public $client;

}
class Route_Response extends Miku {

    public function withJson( $array = []) {
        header("content-type: application/json");
        echo json_encode($array);
    }
    public function HttpStatus ( $code = 404 , $template = "" )
    {
        if( $code = 404 ) 
            header("HTTP/1.0 404 Not Found");
        
    }
    public $content ;
    public $status = 200;
    public $header;
    public $server;
}

class app 
{
    public static $blade ;
    # Router Counting
    public static $routercounting = 0;

    # Path data will be save here
    public static $path = '/' ;
    
    public static $request ;
    
    public static $response ;

    public static $debug = true ;

    public static $seo ;

    public static $page_title ;

    public static $once = false ;

    public static $grouping    = false;

    # Route controller
    public static $routed = false;

    # Get method
    public static $method = 'GET';

    # Regular expression default for all
    public static $regex = '([]\w\-\[\]\d]+[^\/]|[0-9]+|[a-zA-Z]+)';

    # save queries regex
    public static $query = '';

    #
    public static $args;

    public static $ptype;

    public static function group( $path , $callback )
    {
        self::$grouping = true ;
        preg_match_all( "/^\/{$path}\//" , app::$path , $___match );
        
        if (isset($___match[0][0]) &&($___match[0][0] == "/{$path}/")) {
            self::$path = explode(    "/{$path}" , app::$path )[1];
            $callback();
        };
        self::$grouping = false ;
    }
    public static function set_path()
    {
        if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '')
        {
            self::$path = $_SERVER['PATH_INFO'];

        }
    }
    public static function get( $queries , $callback )
    {

        self::$routercounting++;
        // echo $queries;
        if( !self::$grouping    )
        {
            self::set_path();
        }

        $args = func_get_args();

        # Unset query and callback varieble

        if(isset($args[3]))
        {
            self::$ptype = $args[3];
        }
        unset($args[0]);
        unset($args[1]);


        self::$args = ( isset(array_values($args)[0]) ) ?    array_values($args)[0] :    [];
        if( !self::$routed)
        {

            # @Set url to varieble
            # Save query
            self::$query = $queries;

            # Define some class

            $request = new class extends Route_Request {};

            $response = new class extends Route_Response {};

            if($queries == self::$path )
            {
                    
                    self::$routed = true;
                    self::$request = $request;
                    self::$response = $response;
                    
                    $callback($request,$response);

                    if(app::$once) die();

            }else{

                preg_match_all( '#\{(.+?)\}#' ,$queries ,$params);
                
                $count_preg = 0;
                $routed = [ ] ;
                $path_data = $queries;

                foreach( self::$args as $arg => $item )
                {
                    $path_data    =    ($count_preg==0) ? preg_replace( "#\{{$arg}\}#" , $item , $queries    ) : preg_replace( "#\{{$arg}\}#" , $item , $path_data    ) ;
                    $count_preg++;
                }

                $path_data = preg_replace( '#\{(.+?)\}#', self::$regex, $path_data);

                preg_match("#^{$path_data}$#",self::$path,$nani);

                unset($nani[0]);

                $nani = array_values($nani);

                $each = 0 ;

                foreach($nani as $arg => $item)
                {
                    $routed += array( $params[1][$each] => $item );
                    $each++;
                }
                
                if(!empty($routed))
                {
                    self::$routed = true;
                    $request->params = (object)$routed;
                    if(isset($_GET['getParamsJSON'])&&$_GET['getParamsJSON']=='true' && self::$debug == true)
                    {
                        header('Content-type: application/json');
                        // $request->params->php_parse_time = php_parse_time();
                        echo json_encode((array)$request->params);
                    }else {
                        self::$request = $request;
                        self::$response = $response;
                        $callback($request,$response);
                        if(app::$once) die();
                    }

            }
        }
    }
        return new class extends Route_Get {
        };

    }

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
            
            include TEMPLATE_PATH . 'index.php';

            if( method_exists( 'main', 'index') )
                main::index()
            ;else
                echo 'You must create a class "main" and a function named "index" in "index.php"';
        }else{
            
            preg_match_all( '/([\w]+)(\/?)/', app::$path , $matchs ) ;

            $__params = $matchs[1];

            include TEMPLATE_PATH . $__params[0]. '.php';

            if( isset($__params[1]) &&    method_exists( $__params[0] , $__params[1] ) )
            {
                $__params[0]::$__params[1]();
            }else{
                // $__params[0]::__construct();
            }

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