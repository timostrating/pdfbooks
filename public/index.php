<?php

require('../config/app.php');
require('../config/routes.php');

SESSION_START();

?>


<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> pdfbooks</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= LOCALHOSTURI ?>/assets/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head> <!-- head -->


  <body>
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= LOCALHOSTURI ?>">
          <img src="assets/logo2.png" width="50px" length="50px" style="position: relative; top: -17px;">
        </a>
      </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li> <a href="<?= LOCALHOSTURI ?>/webshop">Webshop</a> </li>
          <li> <a href="<?= LOCALHOSTURI ?>/contact">Contact</a> </li>
        </ul>

        <form class="search-container" method="post" action="<?= LOCALHOSTURI ?>/webshop"> <!-- TODO -->
          <input type="text" style="border-radius: 6px;" name="search" id="search-bar" placeholder="Zoek PDF">
          <img class="search-icon" name="searchButton" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png">
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li> <a href="shoppingCart"> <span class="glyphicon glyphicon-shopping-cart" style="width: 20px; font-size: 15px; text-align: center;"></span> </a> </li>
          <li class="dropdown" style="margin-top: 8px;">
            <button class="btn" type="button" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user" style="width: 20px; font-size: 15px; text-align: center;"></span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
<?php if(isset($_SESSION['USER_ID']) == false){ ?>
              <li align="center"> <a href="<?= LOCALHOSTURI ?>/users/login">Login</a> </li>
              <li align="center"> <a href="<?= LOCALHOSTURI ?>/users/register">Register</a> </li>
<?php } else { ?>
                <li align="center"> <a href="<?= LOCALHOSTURI ?>/users/profile">Profile</a> </li>
                <li align="center"> <a href="<?= LOCALHOSTURI ?>/users/logout">Logout</a> </li> <!-- TODO -->
<?php } ?>
            </ul>
          </li> <!-- ./dropdown -->
        </div> <!-- ./navbar-collapse -->
      </div> <!-- ./navbar-header -->
    </nav>

    <div class="container">
      <?php $router->run(); ?>  
    </div>

    <footer>
      <a href="contact">Contact</a>
    </footer>
  </body>
</html>