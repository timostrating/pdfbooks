<?php

// TODO: '/products' and '/products/' are not the same url right now 

$router->get('/', 'PageController#index');
$router->get('/contact', 'PageController#contact');


// for testing
$router->get('/seeds', 'Database#seed');



$router->get('/webshop', 'ProductController#index');
$router->get('/products/:id/show', 'ProductController#show'); 
$router->get('/products/new', 'ProductController#new'); 
$router->get('/products/:id/edit', 'ProductController#edit'); 

$router->post('/products/create', 'ProductController#create'); 
$router->post('/products/:id/update', 'ProductController#update'); 
$router->post('/products/:id/delete', 'ProductController#delete');  

// User crud
$router->get('/users/login', 'UserController#login');
$router->get('/users/logout', 'UserController#logout');
$router->get('/users/profile',  'UserController#show');
$router->get('/users/register',   'UserController#new');
$router->get('/users/edit',  'UserController#edit');

$router->post('/users/create_session', 'UserController#create_session');
$router->post('/users/create', 'UserController#create');
$router->post('/users/update',  'UserController#update');
$router->post('/users/delete',   'UserController#delete'); 