<?php
include('header.php');
if(isset($_POST['search'])){
$_SESSION['search'] = $_POST['search']; 
?>
Er zijn geen boeken gevonden met uw zoek opdracht. <?php echo $_SESSION['search'];
}
else{
    header("location: 404.php");
}
include('footer.php');
?>