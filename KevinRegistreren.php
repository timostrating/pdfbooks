<!--Registreer formulier-->

<h1 align="center">Registreer pagina</h1>

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

<?php
//actionpage.php
include('header.php');

//variabelen voor de verbinding
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";

// maakt een verbinding
$db = new mysqli($servername, $username, $password, $mydb);

// controleert de connectie
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
//controle of het ingevoerde wachtwoord en de wachtwoord controle gelijk aan elkaar zijn
if ($_POST['psw'] == $_POST['psw1']) {

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
        $gebruikersnaam = mysqli_real_escape_string($db, $_POST['uname']);
        $wachtwoord = mysqli_real_escape_string($db, $hashed_password);
        $email = mysqli_real_escape_string($db, $_POST['email']);
    }

//controle of de gebruikersnaam groter is dan 3 tekens zo niet laat hij een error bericht zien
    if (strlen($gebruikersnaam) < 3) {
        $error_msg .= "<li >Vul een gebruikersnaam in.</li>";
    }

//controle of het wachtwoord we meer dan 4 tekens heeft zo niet laat hij een error bericht zien
    if (strlen($wachtwoord) < 4) {
        $error_msg .= "<li >Het wachtwoord moet uit minstens 4 tekens bestaan!</li>";
    }

//controle of het email adres wel de juiste tekens heeft gebruikt en ook in de juiste volgorde
    if (!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/", $email)) {
        $error_msg .= "<li class=\"formerror\">Vul een geldig e-mail adres in.</li>";
    }

//maakt een query aan die controleert of de gebruikersnaam of het emailadres al in de database staat
    $query = "SELECT * from users WHERE username ='$gebruikersnaam' OR email = '$email';";

//voert de query uit
    $result = mysqli_query($db, $query);

//controleren of de gebruikersnaam of het wachtwoord is gevonden. zo ja krijgt hij een foutmelding 
    if (mysqli_num_rows($result) > 0) {
        echo("<table align=\"center\">");
        echo("<tr><th> Deze gebruikersnaam of het emailadres is al in gebruik </th></tr>");
        echo("<tr><td> Klik <a href=\"register.php\">hier</a> om terug te gaan </td></tr>");
        echo("</table>");
    }

//maakt een query aan voor het invoeren van de gegevens na een geslaagde registratie en geeft een melding dat het registreren gelukt is
    else {
        $query = ("INSERT INTO users (username, password, email) "
                . "VALUES('$gebruikersnaam','$wachtwoord','$email')") or die(mysqli_error());
        $result = mysqli_query($db, $query);
        echo("<table align=\"center\">");
        echo("<tr><td>  U bent succesvol geregistreerd </td></tr>");
        echo("<tr><td> <a href=\"login.php\">Naar het inlogscherm</a> </td></tr>");
        echo("</table>");
    }
}