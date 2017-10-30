<?php

require('../config/init.php');
require('../config/routes.php');

// $indexController = new IndexController();
// $indexController->index();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
    <?php $router->run(); ?>
  </body>
</html>

