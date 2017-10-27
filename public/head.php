<?php

require('../config/config.php');
require('../core/frameworkHelpers.php');
require('../core/autoload/autoload.php');


$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('viewloader', function() {
    return require(ROOTPATH.'/core/view/viewLoader.php');
});

$autoloader->register('basecontroller', function() {
    return require(ROOTPATH.'/app/controller/baseController.php');
});

$autoloader->register('indexcontroller', function() {
    return require(ROOTPATH.'/app/controller/indexController.php');
});

// TODO: The autoloader needs to be made smarter.  Registering folders would be a good start. 


$view = new View( new ViewLoader(platformSlashes(ROOTPATH.'/app/views/')) );
$router = new Router();