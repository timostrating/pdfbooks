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
        width: 350px;     
    }
    .body{
        background-color: #f9f9f9;
        border-color: #e7e7e7;
        border-right-color: black;
        border-width: 1px;
        left: 40px;
        color: #333;
        padding-left: 40px;
        width: 360px;     
    }
        input[type=text], select {
    width: 300px;
    margin: 8px 0;
    border: 1px solid #333;
    border-radius: 5px;
}
    input[type=text1], select {
    width: 200px;
    margin: 8px 0;
    border: 1px solid #333;
    border-radius: 5px;
}
    input[type=email], select {
    width: 200px;
    margin: 8px 0;
    border: 1px solid #333;
    border-radius: 5px;
}
</style>
<div class="titel">
    <form method="post" action="updateaction.php">
    <h1><?php echo $_SESSION['uname']; ?></h1>
</div>
<div class="body">
    <li>Naam: <input type="text1" name="fname" value="<?php echo $_SESSION['fname']; ?>"></li>
    <li>Achternaam: <input type="text1" name="lname" value="<?php echo $_SESSION['lname']; ?>"></li>
    <li>Email: <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required></li>
    <li>Geslacht: <input type="text1" name="gen" value="<?php echo $_SESSION['gen']; ?>"></li>
    <li>Land: <input type="text1" name="country" value="<?php echo $_SESSION['country']; ?>"></li>
    <li>Provincie: <input type="text1" name="state" value="<?php echo $_SESSION['state']; ?>"></li>
    <li>Stad: <input type="text1" name="city" value="<?php echo $_SESSION['city']; ?>"></li>
    <li>Straatnaam: <input type="text1" name="streetname" value="<?php echo $_SESSION['streetname']; ?>"></li>
    <li>Huisnummer: <input type="text1" name="streetnum" value="<?php echo $_SESSION['streetnum']; ?>"></li>
    <li>Postcode: <input type="text1" name="zip" value="<?php echo $_SESSION['zip']; ?>"></li>    
</div>
<br>
<input type="submit" name="check" class="btn btn-primary" style="position: absolute; background-color: #f9f9f9; color: #333; border-color: #e7e7e7; left: 260px; width: 100px;" value="Aanpassen">
</form>
<?php
if(ucfirst($_SESSION['uname']) == "Kevin"){
?>
    <a href="urlcountpagepussyslayer69.php">Page Vieuws</a>
    <?php
}
include('footer.php');