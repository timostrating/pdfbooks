<?php

require('../config/config.php');
require('../core/frameworkHelpers.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('viewloader', function(){
    return require(ROOTPATH.'/core/view/viewLoader.php');
});

$view = new View( new ViewLoader(platformSlashes(ROOTPATH.'/app/views/')) );
$router = new Router();

require('../config/routes.php');