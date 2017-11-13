<?php
SESSION_START();
if(isset($_POST['check'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "pdfbooks";
    $id = $_SESSION['id'];
    // Create connection
    $db = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($db->connect_error) {
    
    die("Connection failed: " . $db->connect_error);
} 
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
//Formulier uitgevoerd - e-mail genereren en meldingen weergeven 
//HTML- en PHP-tags uit de invoervelden verwijderen
$error_msg = ""; 
$name = mysqli_real_escape_string($db, $_POST['fname']);
$lastname = mysqli_real_escape_string($db,$_POST['lname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$gen = mysqli_real_escape_string($db, $_POST['gen']); 
$country = mysqli_real_escape_string($db, $_POST['country']); 
$state = mysqli_real_escape_string($db, $_POST['state']); 
$city = mysqli_real_escape_string($db, $_POST['city']); 
$streetname = mysqli_real_escape_string($db, $_POST['streetname']); 
$streetnum = mysqli_real_escape_string($db, $_POST['streetnum']); 
$zip = mysqli_real_escape_string($db, $_POST['zip']); 

$query = ("UPDATE users SET naam='$name', lastname='$lastname', email='$email', gender='$gen', country='$country', state='$state', city='$city', streetname='$streetname', streetnumber='$streetnum', zip='$zip' WHERE ID='$id'") or die (mysqli_error()); 
                $result = mysqli_query($db, $query);
                
$ophalen = "SELECT * FROM users WHERE ID ='$id'"; 
$res = mysqli_query($db, $ophalen);
if (mysqli_num_rows($res) > 0){ // gebruikersnaam gevonden, registreer gegevens in session 
    
    $row = mysqli_fetch_assoc($res);
       var_dump($row);
        $_SESSION['id'] = $row['ID'];
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
        header("location: profile.php");
}
}
}