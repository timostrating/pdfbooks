<!DOCTYPE>

<?php
//register
include('header.php');
?>

<html>

    <h1 align="center">Register</h1>
<br>
<form style="width: 300px; position: relative; margin: 0 auto; text-align: center;" method="post" action="registeractionpage.php">
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
    </table>
<?php
include('footer.php');
?>
    </body>
</html>