<?php

class Router {

    private $get_routes = [];
    private $post_routes = [];
    private $notFound;




    public function __construct() {
        $this->notFound = function($url) {
            echo "404 - $url was not found!";
            echo '<a href="/"><img src="assets/helaas.png" width="1000" height="1000" title="404 Pagina niet gevonden" alt="404"></a>';
        };
    }


    public function get($url, $action) {
        $this->get_routes[LOCALHOSTURI.$url] = $action;
    }


    public function post($url, $action) {
        $this->post_routes[LOCALHOSTURI.$url] = $action;
    }


    public function setNotFound($action) {
        $this->notFound = $action;
    }

    
    public function run() {
        console_log("ROUTER ".$_SERVER['REQUEST_METHOD'].": ".$_SERVER['REQUEST_URI']);        

        // We make a big assumption here. 
        // We only handle GET and POST requests. All other requests will be seen as POST request.
        // to make other requests like PATCH and DELETE work you should rewrite them as POST requests.
        $routes = ($_SERVER['REQUEST_METHOD'] === 'GET')? $this->get_routes : $this->post_routes;  
        $request = explode('/', $_SERVER['REQUEST_URI']);        


        foreach ($routes as $url => $action) {
            $url = explode('/', $url);

            // var_dump($request); echo "<br/><br/>";
            // var_dump($url); echo "<br/><br/>";

            if (count($request) == count($url)) {
                $matchAll = true;
                $args = [];
                for ($i=0; $i < count($request); $i++) { 
                    if (empty($url[$i]) == false and $url[$i][0] === ":") {
                        // If we find a : in the routes URL we store it and later pass it on
                        array_push($args, $request[$i]);  
                    } elseif ($request[$i] === $url[$i]) {
                        continue;
                    } else { 
                        $matchAll = false;
                        continue 2; // Nice php +1
                    }  
                }

                if( $matchAll ){ 
                    if(is_callable($action)) return $action(); 

                    // in our routes file we specify our routes like so  ($URL, "Controller#Function")
                    $actionArr = explode('#', $action); 
                    $controller = $actionArr[0];
                    $method = $actionArr[1];

                    // Create a new Controller and call its function with our gathered arguments
                    return call_user_func_array( array((new $controller), $method), $args ); 
                }
            }
        }

        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);  // 404 if there is no match
    }
}