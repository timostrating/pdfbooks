<!DOCTYPE html>

<?php
//login
//require('header.php');
?>

<html>
    <head>
    <header align="center">
        <h1>Login</h1>
    </header>
        <title>Login</title>
    </head>
    <body>
        <form method="post" action="actionpage.php">
              <table align="center">
                  <tr>
                      <td><input type="text" name="uname" placeholder="Username"></td>
                  </tr>
                  <tr>
                      <td><input type="password" name="psw" placeholder="Password"></td>
                  </tr>
                  <tr>
                      <td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
                  </tr>
            </table>
        </form>
    </body>
</html>