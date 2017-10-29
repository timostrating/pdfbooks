<?php

require('config.php');
require('../core/frameworkHelpers.php');
require('../core/autoload/autoload.php');


$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->registerFile('viewloader', ROOTPATH.'/core/view/viewLoader.php');
$autoloader->registerFolder(ROOTPATH.'/app/controllers');


$view = new View( new ViewLoader(platformSlashes(ROOTPATH.'/app/views/')) );
$router = new Router();