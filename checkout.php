<?php
include('header.php');
echo $_SESSION['bedrag'];
?>
<form method="post" action="payed.php">
    <button type="submit" name="submit" class="btn btn-primary">Betalen</button>
</form>

