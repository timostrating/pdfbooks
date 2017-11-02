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
echo "Connected successfully";

if (!empty($_POST)){ 
$gebruiker = mysqli_real_escape_string($db, $_POST['uname']);  
$wachtwoord = mysqli_real_escape_string($db, $_POST['psw']); 
$query = "SELECT * FROM users WHERE username ='$gebruiker' AND password ='$wachtwoord'"; 
$result = mysqli_query($db, $query);
var_dump($result);
if (mysqli_num_rows($result) > 0){ // gebruikersnaam gevonden, registreer gegevens in session 
    $_SESSION["test"] = true;
    $_SESSION["timeout"] = time() + 120; 
    $_SESSION["uname"] = $gebruiker; 
    header("location: home.php");
    $row = mysqli_fetch_assoc($result);
        $_SESSION['uname'] = $row["username"];
        $_SESSION['fname'] = $row["naam"];
        $_SESSION['lname'] = $row["lastname"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['gen'] = $row["gender"];
        $_SESSION['country'] = $row["country"];
        $_SESSION['state'] = $row["state"];
        $_SESSION['city'] = $row["city"];
        $_SESSION['streetname'] = $row["streetname"];
        $_SESSION['streetnum'] = $row["streetnumber"];
        $_SESSION['zip'] = $row["zip"]; 
    
}
}



 

 

include('footer.php');