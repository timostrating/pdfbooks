<?php

/**
 *  This class is responsible for handeling everything that has to do with the database.
 * 
 *  TODO: add 'updated_at' and 'created_at'
 *      updated_at - When any data is change in the row we will fill in the current timestemp
 *      created_at - When we create the row we will fill in the current timestemp
 *  TODO: add the database options to the config file.
 */

class Router {

    private $get_routes = [];
    private $get_user_routes = [];
    private $get_admin_routes = [];

    private $post_routes = [];
    private $post_user_routes = [];
    private $post_admin_routes = [];

    private $notFound;

    private $DB;

    public $echoGenerateGlobalConstant = false;

    

    public function __construct() {
        $this->notFound = function($url) {
            echo "404 - $url was not found!";
            echo '<a href="/"><img src="assets/helaas.png" width="1000" height="1000" title="404 Pagina niet gevonden" alt="404"></a>';
        };

        $this->DB = Database::Instance();
        $this->DB->connect();
    }

    
    /** Mark url as valid for GET requests */
    public function get($url, $action, $permission=0, $generateConstant=true) {
        if($generateConstant){ $this->generateGlobalConstant($url, $action); }
        if($permission == 0) { $this->get_routes[ROOT_PATH.$url] = $action; }
        if($permission == 1) { $this->get_user_routes[ROOT_PATH.$url] = $action; }
        if($permission == 2) { $this->get_admin_routes[ROOT_PATH.$url] = $action; }
    }


    /** Mark url as valid for POST requests */
    public function post($url, $action, $permission=0, $generateConstant=true) {
        if($generateConstant){ $this->generateGlobalConstant($url, $action); }
        if($permission == 0) { $this->post_routes[ROOT_PATH.$url] = $action; }
        if($permission == 1) { $this->post_user_routes[ROOT_PATH.$url] = $action; }
        if($permission == 2) { $this->post_admin_routes[ROOT_PATH.$url] = $action; }
    }
    

    /** Mark url as valid for POST and GET requests */
    public function both($url, $action, $permission=0) {
        $this->generateGlobalConstant($url, $action);        
        $this->get($url, $action, $permission, false);
        $this->post($url, $action, $permission, false);
    }


    /** Mark all crud urls as valid for there standard scaffold POST and GET requests */
    public function resource($url, $action, $permission=0) {
        $this->get($url,                $action."#index",   $permission);
        $this->get($url."/:ID/show",    $action."#show",    $permission);
        $this->get($url."/new",         $action."#new",     $permission);
        $this->get($url."/:ID/edit",    $action."#edit",    $permission);

        $this->post($url."/create",     $action."#create",  $permission);
        $this->post($url."/:ID/update", $action."#update",  $permission);
        $this->post($url."/:ID/delete", $action."#delete",  $permission);;
    }


    /** 
     * This is a internall function that will generate a superglobal based on a route defined in the routes 
     * 
     *                                     |||||||          _||||  + _PATH
     * $router->get('/products/:ID/show', 'ProductController#show');
     *                      $url                   $action  
     * 
     * define(PRODUCT_SHOW_PATH , $url);
     */
        //  
    private function generateGlobalConstant($url, $action) {
        if (GENERATE_SUPERGLOBAL_ROUTES) {
            // # are seen as comments so we can not use them
            $globalConstantName = str_replace('#', '_', strtoupper($action));  
            $globalConstantName = str_replace('CONTROLLER', '', $globalConstantName) . "_PATH";
            $globalConstantURL = ROOT_PATH.$url;

            // Too get our superglobals at a global scope we must hack it in there
            eval("define('".$globalConstantName."',  '".$globalConstantURL."');");  
            
            if($this->echoGenerateGlobalConstant) { echo sprintf("%-30s %s \n", $globalConstantName, $globalConstantURL);  if(strpos($globalConstantName, "DELETE") !== false) { echo"\n"; } }
        }
    }
    

    /** set the 404 function */
    public function setNotFound($action) {
        $this->notFound = $action;
    }


    /** Get your routes based on your permission level. */
    private function getAvailableRoutes() {
        // We make a big assumption here. 
        // We only handle GET and POST requests. All other requests will be seen as POST request.
        // to make other requests like PATCH and DELETE work you should rewrite them as POST requests.
        $routes = [];  
        
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_SESSION["ADMIN_ID"])) {      $routes = array_merge($this->get_routes, $this->get_user_routes, $this->get_admin_routes); }
            elseif(isset($_SESSION["USER_ID"])) {   $routes = array_merge($this->get_routes, $this->get_user_routes); }
            else {                                  $routes = $this->get_routes; }
        } 
        else {
            if(isset($_SESSION["ADMIN_ID"])) {      $routes = array_merge($this->post_routes, $this->post_user_routes, $this->post_admin_routes); }
            elseif(isset($_SESSION["USER_ID"])) {   $routes = array_merge($this->post_routes, $this->post_user_routes); }
            else {                                  $routes = $this->post_routes; }
        }

        return $routes;
    }

    
    /** Handle The request the user send and serve it */
    public function run() {
        console_log("ROUTER ".$_SERVER['REQUEST_METHOD'].": ".$_SERVER['REQUEST_URI']);        

        $routes = $this->getAvailableRoutes();;
        $request = explode('?', $_SERVER['REQUEST_URI'])[0];        
        $request = explode('/', $request );        

        foreach ($routes as $url => $action) {
            $url = explode('/', $url);

            if (count($request) == count($url)) {
                $matchAll = true;
                $args = [];
                for ($i=0; $i < count($request); $i++) { 
                    if (empty($url[$i]) == false and $url[$i][0] === ":") {
                        // If we find a : in the routes URL we store it and later pass it on
                        // We assume the generic part of the url can only be a number
                        array_push($args, intval($request[$i]));   
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

                    $this->register_run($_SERVER['REQUEST_URI'], $action, 1);
                    // Create a new Controller and call its function with our gathered arguments
                    return call_user_func_array( array((new $controller), $method), $args ); 
                }
            }
        }

        $this->register_run($_SERVER['REQUEST_URI'],"",0);
        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);  // 404 if there is no match
    }
    

    /** Save a request to the database. Thanks to kevin for making this work */
    public function register_run($url, $action, $valid) {
        $sql = "SELECT * FROM Pageviews WHERE url=:url";
        $array = [ ":url" => $url ];
        $result = $this->DB->query($sql, $array, "Product");

        if(empty($result)) {
            $sql = "INSERT INTO Pageviews (url, action, count, valid) VALUES (?,?,?,?);";
            $array = [$url, $action, 1, $valid];
            $result = $this->DB->query($sql, $array);

        } else {
            $sql = "UPDATE Pageviews SET url=:url, action=:action, count=:count, valid=:valid WHERE ID=:id;";
            $array = [
                ":url" => $url, 
                ":action" => $action, 
                ":count" => $result[0]->count + 1, 
                ":valid" => $valid, 
                ":id" => $result[0]->ID
            ];
            $result = $this->DB->query($sql, $array);
        }
              
    }    
}