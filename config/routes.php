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
if(DEVELOPMENT) { $router->both('/seeds', 'Database#seed'); }  // for testing


/**
 * $router->get('/products/:ID/edit', 'ProductController#edit', [0,1,2]); 
 *           1            2                        3               4
 * 
 * 1 - get    mark as Allowed to send   GET  request to this url 
 *   - post   mark as Allowed to send  POST  request to this url 
 *
 * 2 - URL  if you use :VARIABLE_NAME the router will pass whatever number a users enters in this part of the url to the function.
 * 
 * 3 - "CLASS_NAME # FUNCTION_NAME"  this gets called by the router
 * 
 * 4 - required permission level.      0 (default) - anyone     1 - user     2 - admin
 */



$router->get('/', 'PageController#index');

// Contact
$router->get('/contact', 'ContactController#new');
$router->post('/contact/create', 'ContactController#create');


// Product
$router->get('/webshop', 'ProductController#index');
$router->get('/webshop/:ID/show', 'ProductController#show'); 


// Cart
$router->get('/shoppingcart', 'CartController#index');

$router->post('/shoppingcart/:ID/add',  'CartController#add');
$router->post('/shoppingcart/:ID/subtract',  'CartController#subtract');
$router->post('/shoppingcart/:ID/delete',   'CartController#delete'); 
 

// Blog
$router->get('/blogs', 'BlogController#index');
$router->get('/blogs/:ID/show',  'BlogController#show');


// Categorie crud
$router->get('/categories', 'CategorieController#index');
$router->get('/categories/:ID/show',  'CategorieController#show');




//////////////////
//    _USER_    //
//////////////////
$router->get('/login', 'UserController#login');
$router->get('/register',   'UserController#register');
$router->get('/logout', 'UserController#logout', 1);
$router->get('/profile',  'UserController#profile', 1);
$router->get('/profile/remove',  'UserController#remove_account', 1);
$router->get('/profile/edit',  'UserController#edit', 1);

$router->post('/users/create_session', 'UserController#create_session');
$router->post('/users/create', 'UserController#create');
$router->post('/users/update',  'UserController#update', 1);
$router->post('/users/delete',   'UserController#delete', 1);         


// Order
$router->get('/profile/orders', 'OrderController#index', 1);
$router->get('/profile/orders/:ID/show',  'OrderController#show', 1);
$router->get('/orders/new',   'OrderController#new', 1);

$router->post('/profile/orders/create', 'OrderController#create', 1);
$router->post('/profile/orders/:ID/delete',   'OrderController#delete', 1); 




/////////////////
//   _ADMIN_   //
/////////////////
$router->get('/admin', 'PageController#admin', 2);

// AdminBlog crud
$router->resource('/admin/blogs', 'AdminBlogController', 2);

// AdminUser crud
$router->resource('/admin/users', 'AdminUserController', 2);

// AdminContact crud
$router->resource('/admin/contacts', 'AdminContactController', 2);

// AdminOrder crud
$router->resource('/admin/orders', 'AdminOrderController', 2);

// AdminProduct crud
$router->resource('/admin/products', 'AdminProductController', 2);
 
// AdminCategorie crud
$router->resource('/admin/categories', 'AdminCategorieController', 2);

// Demo
$router->get('/demos', 'DemoController#index', 2);
$router->get('/demos/:ID/show',  'DemoController#show', 2);