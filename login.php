<!DOCTYPE html>

<?php
//include header
include('header.php');
//het formulier
?>
<h1 align="center">Inloggen</h1>

<form style="width: 300px; position: relative; margin: 0 auto; text-align: center;" method="post" action="actionpage.php">
    <div class="form-group">
        <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gebruikersnaam/Emailadres" required>
    </div>
    <div class="form-group">
        <input type="password" name="psw" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
<?php
//include footer
include('footer.php');
?>