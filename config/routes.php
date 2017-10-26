<?php

$router->add('/',function() use ($view){
    $view->display('home.php');
});

$router->add('/about-us',function() use ($view){
    $view->display('about.php');
});

$router->dispatch();