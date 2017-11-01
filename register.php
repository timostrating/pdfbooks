<!DOCTYPE>

<?php
//register
include('header.php');
SESSION_START();
?>

<html>

    <h1 align="center">Register</h1>
<br>
<form style="width: 300px; position: relative; margin: 0 auto; text-align: center;" method="post" action="actionpage.php">
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
  <div class="form-check">
    <label class="form-check-label">
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
    <table align="center">

<?php
if(isset($_POST['submit'])){
    if($_POST['psw1'] == $_POST['psw2']){
         $_SESSION['uname'] = $_POST['uname'];
         $_SESSION['email'] = $_POST['email'];
         $_SESSION['psw'] = $_POST['psw1'];
         header("location: actionpage.php");
    }
    else{
        echo ("<tr><td align=\"center\">") . $_POST['uname'] . ("</td></tr>");
        echo ("<tr><td align=\"center\">") . $_POST['email'] . ("</td></tr>");
        echo ("<tr><td align=\"center\">De wachtwoorden zijn verschillend</td></tr>");
    }
}

?>
    </table>
<?php
include('footer.php');
?>
    </body>
</html>