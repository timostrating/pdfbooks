<?php

include('header.php');

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
if($_POST['psw'] == $_POST['psw1']){
    
//controle of er wel een post handeling is uitgestuurd naar deze pagina
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
//Formulier uitgevoerd - e-mail genereren en meldingen weergeven 

$error_msg = ""; 

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
if(strlen($gebruikersnaam)<3){ 
    $error_msg.="<li >Vul een gebruikersnaam in.</li>"; } 
    
    //controle of het wachtwoord we meer dan 4 tekens heeft zo niet laat hij een error bericht zien
    if(strlen($wachtwoord)<4){
    $error_msg.="<li >Het wachtwoord moet uit minstens 4 tekens bestaan!</li>"; }
    
    //controle of het email adres wel de juiste tekens heeft gebruikt en ook in de juiste volgorde
    if(!preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/",$email)){
    $error_msg.="<li class=\"formerror\">Vul een geldig e-mail adres in.</li>"; }
    
    //maakt een query aan
    $query = "SELECT * from users WHERE username ='$gebruikersnaam' OR email = '$email';"; 
    
    //voert de query uit
    $result = mysqli_query($db, $query); 
    if (mysqli_num_rows($result) > 0) { 
    echo "Deze gebruikersnaam of email is al in gebruik";
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
    
