<?php

# Request Class
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

class AppRoute {
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
                    
                    if(!is_callable($callback)){
                        $route_view = new Miku ;

                        $route_view->controller($callback);
                        
                    }else 
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
                        if(!is_callable($callback)){
                            $route_view = new Miku ;

                            $route_view->controller($callback);
                            
                        }else 
                            $callback($request,$response);
                        if(app::$once) die();
                    }

            }
        }
    }
        return new class extends Route_Get {
        };

    }
   
}