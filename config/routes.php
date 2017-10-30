<?php

$router->add('/', 'IndexController#index');

// Crud
$router->add('/index', 'IndexController#index');
$router->add('/show', 'IndexController#show');
$router->add('/new', 'IndexController#new');
$router->add('/edit', 'IndexController#edit');

// only for testing
$router->add('/create', 'IndexController#create');
$router->add('/update', 'IndexController#update');
$router->add('/destroy', 'IndexController#destroy');
