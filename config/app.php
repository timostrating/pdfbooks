<?php 
/**
 * This is the place where our NoFramework starts.
 * 
 * It is responsible for managing all application level resources.
 *      - requireing files and Marking files for autoloading are examples of this.
 * 
 * TODO: Change this to class.
 */
?>



<?php

// require
require('../core/frameworkHelpers.php');
require('config.php');
require('../core/autoload/autoload.php');


// autoloading
$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->load('database'); 
$DB = new Database;

$autoloader->registerFile('viewloader', ROOTPATH.'/core/view/viewLoader.php');
$autoloader->registerFile('seeds', ROOTPATH.'/config/seeds.php');
$autoloader->registerFolder(ROOTPATH.'/app/controllers');
$autoloader->registerFolder(ROOTPATH.'/app/models');


// mvc
$view = new View( new ViewLoader(platformSlashes(ROOTPATH.'/app/views/')) );
$router = new Router();