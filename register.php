<!DOCTYPE>

<?php
//register
include('header.php');
SESSION_START();
?>

<html>
    <head>
    <header align="center">
        <h1>Register</h1>
    </header>
        <title>Register</title>
    </head>
    <body>
        <form method="post">
            <table align="center">
                <tr>
                    <td><input type="text" name="uname" value="<?php if(isset($_POST['submit'])){ echo $_POST['uname']; }?>" placeholder="Username" min="3" max="15" required></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="<?php if(isset($_POST['submit'])){ echo $_POST['email']; }?>" placeholder="Email" min="7" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="psw1" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="psw2" placeholder="Password check" required></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="submit" value="Register"</td>
                </tr>
            </table>
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