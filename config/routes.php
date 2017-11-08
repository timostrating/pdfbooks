<?php 
/**
 * This is the place where all allowed urls are kept in combination to there ececution function.
 * 
 * It is responsible for managing all application level resources.
 *      - require'ing files and Marking files for autoloading are examples of this.
 * 
 * TODO: Make a -sample version and make it work together.
 * TODO: Add this file to the .gitignore.
 * TODO: '/products' and '/products/' are not the same url right now.
 */
?>


<?php
if(DEVELOPMENT) { $router->get('/seeds', 'Database#seed'); }  // for testing


/**
 * $router->get('/products/:ID/edit', 'ProductController#edit'); 
 *           1            2                        3
 * 
 * 1 - get    mark as Allowed to send   GET  request to this url 
 *   - post   mark as Allowed to send  POST  request to this url 
 *
 * 2 - URL  if you use :VARIABLE_NAME the router will pass whatever number a users enters in this part of the url to the function.
 * 
 * 3 - "CLASS_NAME # FUNCTION_NAME"  this gets called by the router
 */



$router->get('/', 'PageController#index');
$router->get('/contact', 'PageController#contact');


$router->get('/webshop', 'ProductController#index');
// $router->get('/products', 'ProductController#index');
$router->get('/products/:ID/show', 'ProductController#show'); 
$router->get('/products/new', 'ProductController#new'); 
$router->get('/products/:ID/edit', 'ProductController#edit'); 

$router->post('/products/create', 'ProductController#create'); 
$router->post('/products/:ID/update', 'ProductController#update'); 
$router->post('/products/:ID/delete', 'ProductController#delete');  


// User crud
$router->get('/login', 'UserController#login');
$router->get('/users/logout', 'UserController#logout');
$router->get('/users/register',   'UserController#register');
$router->get('/users/profile',  'UserController#show');
$router->get('/users/edit',  'UserController#edit');

$router->post('/users/create_session', 'UserController#create_session');
$router->post('/users/create', 'UserController#create');
$router->post('/users/update',  'UserController#update');
$router->post('/users/delete',   'UserController#delete');         


// Cart
$router->get('/shoppingcart', 'CartController#index');

$router->post('/shoppingcart/:ID/add',  'CartController#add');
$router->post('/shoppingcart/:ID/subtract',  'CartController#subtract');
$router->post('/shoppingcart/:ID/delete',   'CartController#delete');