<?php

$router->add('/', 'PageController#index');
$router->add('/contact', 'PageController#contact');


// for testing
$router->add('/seeds', 'Database#seed');

