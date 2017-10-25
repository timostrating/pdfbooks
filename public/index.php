<?php

require('../core/view/viewLoader.php');
require('../core/view/view.php');

$viewPath = __DIR__.'/../views/';

$viewLoader = new ViewLoader($viewPath);
$view = new View($viewLoader);



$view->display('home.php');