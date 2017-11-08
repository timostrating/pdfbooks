<?php

include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
// Create connection
$db = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

if($_POST['psw'] == $_POST['psw1']){
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
//Formulier uitgevoerd - e-mail genereren en meldingen weergeven 
//HTML- en PHP-tags uit de invoervelden verwijderen
$error_msg = ""; 
$gebruikersnaam = mysqli_real_escape_string($db, $_POST['uname']);
$wachtwoord = mysqli_real_escape_string($db,$_POST['psw']);
$email = mysqli_real_escape_string($db, $_POST['email']); 
}
if(strlen($gebruikersnaam)<3){ 
    $error_msg.="<li >Vul een gebruikersnaam in.</li>"; } 
    if(strlen($wachtwoord)<4){
    $error_msg.="<li >Het wachtwoord moet uit minstens 4 tekens bestaan!</li>"; } 
    if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/",$email)){
    $error_msg.="<li class=\"formerror\">Vul een geldig e-mail adres in.</li>"; }
    $query = "SELECT * from users WHERE username ='$gebruikersnaam';"; 
    $result = mysqli_query($db, $query); 
    if (mysqli_num_rows($result) > 0) { 
    echo "gebruikersnaam al aanwezig in de database, foutmelding tonen";
    $error_msg.="<li class=\"formerror\">De gebruikersnaam is al in 	gebruik.</li>"; }
    
    if(strlen($error_msg)>0){
    //Een van de velden is niet juist ingevuld 	
    echo ("<p>Om de volgende reden kan uw vraag helaas niet worden 	verwerkt:<p><ul>");
    echo $error_msg;
    echo "</ul><p>Klik op <a href=\"javascript:history.back(1)\">terug</a> en vul alle velden juist in. </p><br/>";
    
    }
    else {
        $query = ("INSERT INTO users (username, password, email) "
                . "VALUES('$gebruikersnaam','$wachtwoord','$email')") or die (mysqli_error()); 
                $result = mysqli_query($db, $query);
echo("<hr> U bent succesvol geregistreerd</hr>");
echo("<hr> <a href=\"login.php\">Naar het inlogscherm</a></hr>");
} } else {
    echo ("<hr> De wachtwoorden zijn verschillend</hr>");
    echo ("<hr> <a href=\"register.php\">Naar het registreer pagina</a></hr>");
}
    
