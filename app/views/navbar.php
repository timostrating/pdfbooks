<nav class="navbar navbar-default">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
        aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?= ROOT_PATH ?>">
        <img src="<?= ROOT_PATH ?>/assets/logo2.png" width="50px" length="50px" style="position: relative; top: -17px;">
    </a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li> <a href="<?= PRODUCT_INDEX_PATH ?>">Webshop</a> </li>
        <li> <a href="<?= PAGE_CONTACT_PATH ?>">Contact</a> </li>
    </ul>

    <form class="search-container" action="<?= PRODUCT_INDEX_PATH ?>"> <!-- TODO -->
        <input type="text" style="border-radius: 6px;" name="search" id="search-bar" placeholder="Zoek PDF">
        <input class="search-icon" type="image" name="submit" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png" alt="Submit"/>
    </form>

    <ul class="nav navbar-nav navbar-right">
        <li> <a href="<?= CART_INDEX_PATH ?>"> <span class="glyphicon glyphicon-shopping-cart" style="width: 20px; font-size: 15px; text-align: center;"></span> </a> </li>
        <li class="dropdown" style="margin-top: 8px;">
            <button class="btn" type="button" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user" style="width: 20px; font-size: 15px; text-align: center;"></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
<?php if(isset($_SESSION['USER_ID']) == false){ ?>
                <li align="center"> <a href="<?= USER_LOGIN_PATH ?>">Inloggen</a> </li>
                <li align="center"> <a href="<?= USER_REGISTER_PATH ?>">Registreren</a> </li>
<?php } else { ?>
                <li align="center"> <a href="<?= USER_PROFILE_PATH ?>">Profiel</a> </li>
                <li align="center"> <a href="<?= USER_LOGOUT_PATH ?>">Uitloggen</a> </li>
<?php } ?>
            </ul>
        </li> <!-- ./dropdown -->
    </div> <!-- ./navbar-collapse -->
    </div> <!-- ./navbar-header -->
</nav>