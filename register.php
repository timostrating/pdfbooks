<!DOCTYPE>

<?php
//een formulier met gebruikersnaam, email, wachtwoord en wachtwoord controle
include('header.php');
?>

<h1 align="center">Registreren</h1>

<form style="width: 300px; position: relative; margin: 3px auto; text-align: center; display: block;" method="post" action="actionpage.php">
    <div class="form-group">
        <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gebruikersnaam" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Emailadres" required>
    </div>
    <div class="form-group">
        <input type="password" name="psw" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord" required>
    </div>
    <div class="form-group">
        <input type="password" name="psw1" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord check" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>