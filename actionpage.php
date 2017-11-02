<?php
include('header.php');
SESSION_START();

$_SESSION['uname'] = "PussySlayer69";
$_SESSION['fname'] = "Bertunnes-Jacobus";
$_SESSION['lname'] = "Beniers";
$_SESSION['email'] = "IluvPonies@Gaymail.de";
$_SESSION['gen'] = "Onzijdig";
$_SESSION['country'] = "Portugal";
$_SESSION['state'] = "LT.Lickme";
$_SESSION['city'] = "ASMR";
$_SESSION['streetname'] = "OehAh";
$_SESSION['streetnum'] = "69";
$_SESSION['zip'] = "6969PE";
header("location: home.php"); 
$_SESSION['test'] = 1;
include('footer.php');
?>