<?php

require('../config/app.php');
require('../config/routes.php');

SESSION_START();

?>


<?php require ROOTPATH."/app/views/header.php"; ?>
<?php require ROOTPATH."/app/views/navbar.php"; ?>

<div class="container">
  <?php $router->run(); ?>  
</div>

<?php require ROOTPATH."/app/views/footer.php"; ?>