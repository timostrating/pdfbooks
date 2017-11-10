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
$router->get('/admin', 'PageController#admin');


// Contact
$router->get('/contact', 'ContactController#new');
$router->post('/contact/create', 'ContactController#create');


// Product
$router->get('/webshop', 'ProductController#index');
$router->get('/webshop/:ID/show', 'ProductController#show'); 


// User
$router->get('/login', 'UserController#login');
$router->get('/logout', 'UserController#logout');
$router->get('/register',   'UserController#register');
$router->get('/profile',  'UserController#profile');
$router->get('/profile/remove',  'UserController#remove_account');
$router->get('/profile/edit',  'UserController#edit');

$router->post('/users/create_session', 'UserController#create_session');
$router->post('/users/create', 'UserController#create');
$router->post('/users/update',  'UserController#update');
$router->post('/users/delete',   'UserController#delete');         


// Cart
$router->get('/shoppingcart', 'CartController#index');

$router->post('/shoppingcart/:ID/add',  'CartController#add');
$router->post('/shoppingcart/:ID/subtract',  'CartController#subtract');
$router->post('/shoppingcart/:ID/delete',   'CartController#delete'); 
 

// Blog
$router->get('/blogs', 'BlogController#index');
$router->get('/blogs/:ID/show',  'BlogController#show');


// Demo
$router->get('/demos', 'DemoController#index');
$router->get('/demos/:ID/show',  'DemoController#show');


// Order
$router->get('/orders', 'OrderController#index');
$router->get('/orders/:ID/show',  'OrderController#show');
$router->get('/orders/new',   'OrderController#new');

$router->post('/orders/create', 'OrderController#create');
$router->post('/orders/:ID/delete',   'OrderController#delete'); 




/////////////////
//   _ADMIN_   //
/////////////////


// AdminBlog crud
$router->resource('/admin/blogs', 'AdminBlogController');

// AdminUser crud
$router->resource('/admin/users', 'AdminUserController');

// AdminContact crud
$router->resource('/admin/contacts', 'AdminContactController');

// AdminOrder crud
$router->resource('/admin/orders', 'AdminOrderController');

// AdminProduct crud
$router->resource('/admin/products', 'AdminProductController');
 
 

// Categorie crud
$router->get('/categories', 'CategorieController#index');
$router->get('/categories/:ID/show',  'CategorieController#show');
$router->get('/categories/new',   'CategorieController#new');
$router->get('/categories/:ID/edit',  'CategorieController#edit');

$router->post('/categories/create', 'CategorieController#create');
$router->post('/categories/:ID/update',  'CategorieController#update');
$router->post('/categories/:ID/delete',   'CategorieController#delete'); 
 

// AdminCategorie crud
$router->get('/adminCategories', 'AdminCategorieController#index');
$router->get('/adminCategories/:ID/show',  'AdminCategorieController#show');
$router->get('/adminCategories/new',   'AdminCategorieController#new');
$router->get('/adminCategories/:ID/edit',  'AdminCategorieController#edit');

$router->post('/adminCategories/create', 'AdminCategorieController#create');
$router->post('/adminCategories/:ID/update',  'AdminCategorieController#update');
$router->post('/adminCategories/:ID/delete',   'AdminCategorieController#delete');