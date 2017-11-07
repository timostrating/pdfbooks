<?php

require('../config/app.php');
require('../config/routes.php');

SESSION_START();

?>


<?php require ROOTPATH."/app/views/header.php"; ?>
<?php require ROOTPATH."/app/views/navbar.php"; ?>

<div class="container">
  <?php if(isset($_GET["error"])) : ?>
    <div class="alert alert-warning">
      <strong>Oeps</strong> <?= $_GET["error"] ?>
    </div>
  <?php endif; ?>
  
  <?php $router->run(); ?>  
</div>

<?php require ROOTPATH."/app/views/footer.php"; ?>
