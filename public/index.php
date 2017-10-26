<?php

require('head.php');
require('../config/routes.php');

$indexController = new IndexController();
$indexController->index();

// $router->run();