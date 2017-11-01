<?php

require('config.php');
require('../core/frameworkHelpers.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->load('database'); 

$db = new Database();

$autoloader->registerFile('viewloader', ROOTPATH.'/core/view/viewLoader.php');
$autoloader->registerFolder(ROOTPATH.'/app/controllers');
$autoloader->registerFolder(ROOTPATH.'/app/models');


// require(ROOTPATH.'/core/view/view.php'); 
// require(ROOTPATH.'/core/view/viewLoader.php'); 

// require(ROOTPATH.'/core/router/router.php'); 

// require(ROOTPATH.'/core/database/database.php'); 

// require(ROOTPATH.'/app/controllers/baseController.php'); 
// require(ROOTPATH.'/app/controllers/indexController.php'); 




$view = new View( new ViewLoader(platformSlashes(ROOTPATH.'/app/views/')) );
$router = new Router();