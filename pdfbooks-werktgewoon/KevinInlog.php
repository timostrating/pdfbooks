<!--Inlog formulier-->

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
//actionpage.php
include('header.php');

//variabelen voor de verbinding
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";

//maakt een connectie
$db = new mysqli($servername, $username, $password, $mydb);

//Controleert de connect, als deze er niet is geeft hij een error bericht weer
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//controle of er wel een post handeling is uitgestuurd naar deze pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

//versleutelt het wachtwoord
    $password = $_POST['psw'];
    $password = $password . "pdfbooks.nl";
    $hashed_password = hash('md5', '$password');
    $hashed_password = $hashed_password . "randomshit";
    $hashed_password = hash('sha256', '$hashed_password');
    $hashed_password = $hashed_password . "ikhebgisterkfcgehad";
    $hashed_password = hash('sha512', '$hashed_password');

//HTML- en PHP-tags worden uit de invoervelden verwijderen
    $gebruiker = mysqli_real_escape_string($db, $_POST['uname']);
    $wachtwoord = mysqli_real_escape_string($db, $hashed_password);

//maakt een query aan om de combinatie van gebruikersnaam en wachtwoord of emailadres en wachtwoord te controleren en of deze ook in de database staan
    $query = "SELECT ID FROM users WHERE username ='$gebruiker' AND password ='$wachtwoord' OR email ='$gebruiker' AND password ='$wachtwoord'";

//voert de query uit
    $result = mysqli_query($db, $query);

//controleert of de gebruikersnaam of het email adres is gevonden in de database
    if (mysqli_num_rows($result) > 0) {

//stopt de waardes van de database in een array
        $row = mysqli_fetch_assoc($result);

//session maken van het id, zodat hij deze onthoud total de session verwijdert wordt en daarna word je door gestuurd naar je eigen profiel pagina
        $_SESSION['id'] = $row['ID'];
        header("location: profile.php");
        die("");

//als je gebruikersnaam/emailadres in combinatie met je wachtwoord niet is gevonden krijg je een melding
    } else {
        echo("<table align=\"center\">");
        echo("<tr><td> Je emailadres/gebruikersnaam of wachtwoord was onjuist </td></tr>");
        echo("<tr><td> klik <a href=\"login.php\">hier</a> om weer terug te gaan naar de inlog pagina </td></tr>");
        echo("</table>");
    }
} 