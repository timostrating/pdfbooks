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
        <img src="<?= LOCALHOSTURI ?>/assets/logo2.png" width="50px" length="50px" style="position: relative; top: -17px;">
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
            <li align="center"> <a href="<?= LOCALHOSTURI ?>/users/logout">Logout</a> </li>
<?php } ?>
        </ul>
        </li> <!-- ./dropdown -->
    </div> <!-- ./navbar-collapse -->
    </div> <!-- ./navbar-header -->
</nav>