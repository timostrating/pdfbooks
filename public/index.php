<?php

require('../config/app.php');
require('../config/routes.php');

SESSION_START();

?>


<?php 
require ROOT."/app/views/header.php";
require ROOT."/app/views/navbar.php";

// We rely on quick termination here to not call the $_SESSION superglobal in case of a POST request
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION["ADMIN_ID"])) { 
  require ROOT."/app/views/adminbar.php";
} 
?>


<div class="container">

  <?php if(isset($_GET["error"])) { ?>
    <div class="alert alert-warning">
      <strong>Oeps:</strong> <?= $_GET["error"] ?>
    </div>
  <?php } ?>

  <?php if(isset($_GET["success"])) { ?>
    <div class="alert alert-success">
      <strong>Gelukt:</strong> <?= $_GET["success"] ?>
    </div>
  <?php } ?>
  
  <?php $router->run(); ?>  

</div>


<?php require ROOT."/app/views/footer.php"; ?>
