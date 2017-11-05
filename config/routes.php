<?php

// TODO: '/products' and '/products/' are not the same url right now 

$router->get('/', 'PageController#index');
$router->get('/contact', 'PageController#contact');


// for testing
$router->get('/seeds', 'Database#seed');



$router->get('/products', 'ProductController#index');
$router->get('/products/:id/show', 'ProductController#show'); 
$router->get('/products/new', 'ProductController#new'); 
$router->get('/products/:id/edit', 'ProductController#edit'); 

$router->post('/products/create', 'ProductController#create'); 
$router->post('/products/:id/update', 'ProductController#update'); 
$router->post('/products/:id/delete', 'ProductController#delete'); 



