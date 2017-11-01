<?php
SESSION_START();
include('header.php');
$_SESSION['search'] = $_POST['search'];    
include('footer.php');