<?php
include('header.php');
?>
<style>
    .titel{
        background-color: #f9f9f9;
        border-color: #e7e7e7;
        border-right-color: black;
        border-width: 1px;
        left: 40px;
        color: #333;
        padding-left: 40px;
        width: 200px;     
    }
    .body{
        background-color: #f9f9f9;
        border-color: #e7e7e7;
        border-right-color: black;
        border-width: 1px;
        left: 40px;
        color: #333;
        padding-left: 40px;
        width: 50%;     
    }
</style>
<div class="titel">
    <h1><?php echo $_SESSION['uname']; ?></h1>
</div>
<div class="body">
    <li>Naam: <?php echo $_SESSION['fname']; ?></li>
    <li>achternaam: <?php echo $_SESSION['lname']; ?></li>
    <li>Email: <?php echo $_SESSION['email']; ?></li>
    <li>Geslacht: <?php echo $_SESSION['gen']; ?></li>
    <li>Land: <?php echo $_SESSION['country']; ?></li>
    <li>Provincie: <?php echo $_SESSION['state']; ?></li>
    <li>Stad: <?php echo $_SESSION['city']; ?></li>
    <li>Straatnaam: <?php echo $_SESSION['streetname']; ?></li>
    <li>Huisnummer: <?php echo $_SESSION['streetnum']; ?></li>
    <li>Postcode: <?php echo $_SESSION['zip']; ?></li>    
</div>
<br>
<form action="update.php">
<input type="submit" name="update" class="btn btn-primary" style="position: absolute; background-color: #f9f9f9; color: #333; border-color: #e7e7e7; left: 40px; width: 100px;" value="Aanpassen">
</form>
<form action="logout.php">
<input type="submit" name="delete" class="btn btn-primary" style="position: absolute; background-color: #f9f9f9; color: #333; border-color: #e7e7e7; left: 140px; width: 100px;" value="Verwijderen">
</form>
<?php

include('footer.php');
?>