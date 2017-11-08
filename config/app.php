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

$autoloader->registerFile('viewloader', ROOT.'/core/view/viewLoader.php');
$autoloader->registerFile('seeds', ROOT.'/config/seeds.php');
$autoloader->registerFolder(ROOT.'/app/controllers');
$autoloader->registerFolder(ROOT.'/app/models');


// mvc
$view = new View( new ViewLoader(platformSlashes(ROOT.'/app/views/')) );
$router = new Router();