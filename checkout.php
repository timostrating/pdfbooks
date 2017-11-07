<?php
include('header.php');
if(isset($_SESSION['uname'])){
echo $_SESSION['bedrag'];
?>
<form method="post" action="payed.php">
    <button type="submit" name="submit" class="btn btn-primary">Betalen</button>
</form>

