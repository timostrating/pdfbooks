<!doctype html>
<html>
<?php
SESSION_START();
?>
	<head>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                
                
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title><?= isset($PageTitle) ? $PageTitle : "pdfbooks"?></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="searchbar.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                
                <style>
                    
                        .navbar-nav {
                            text-align: center !important;
                        }
                
                </style>
	<body>


	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
                    <a class="navbar-brand" src="assets/logo2.png" href="home.php">PDFBooks</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="webshop.php">Webshop</a></li>
				<li><a href="contactpagina.php">Contact</a></li>
			</ul>
            <form class="search-container" method="post" action="webshop.php">
                <input type="text" style="border-radius: 25px;" name="search" id="search-bar" placeholder="Zoek PDF">
                <img class="search-icon" name="searchButton" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png">
            </form>
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="shoppingCart.php"><span class="glyphicon glyphicon-shopping-cart" style="width: 20px; font-size: 15px; text-align: center;"></span> </li></a>
        <li class="dropdown" style="margin-top: 8px;">
        <button class="btn" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"  style="width: 20px; font-size: 15px; text-align: center;"></span>
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
<?php
if(!isset($_SESSION['test'])){
?>
        <li align="center"><a href="login.php">Login</a></li>
        <li align="center"><a href="register.php">Register</a></li>
<?php
}
elseif(isset($_SESSION['test'])){
?>
        <li align="center"><a href="profile.php">Profile</a></li>
        <li align="center"><a href="logout.php">Logout</a></li>
<?php
}
?>
    </ul>
    </li>
    </div>
        </div>
        </nav>
    </head>