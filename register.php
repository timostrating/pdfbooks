<!DOCTYPE>

<?php
//een formulier met gebruikersnaam, email, wachtwoord en wachtwoord controle
include('header.php');
?>

<html>
    
        <h1 align="center">Register</h1>

    <form style="width: 300px; position: relative; margin: 3px auto; text-align: center; display: block;" method="post" action="registeractionpage.php">
    </div>
    <div class="form-group">
        <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" name="psw" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input type="password" name="psw1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>


</body>
