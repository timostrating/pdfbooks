<?php

$router->add('/', function() use ($view) {
    $view->display('home.php');
});

$router->add('/indexController', 'IndexController#index');