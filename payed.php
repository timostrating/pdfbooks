<?php
include('header.php');
if(isset($_POST['submit'])){
unset($_SESSION['bedrag']);
unset($_SESSION['items']);
?>
Bedankt voor uw aankoop! u krijgt een mail op: <?php echo $_POST['email']; ?> van ons met de eenmalige download link!
U wordt binnen 5 seconden door gestuurd naar de startpagina!

<meta http-equiv="refresh" content="5; URL=/pdfbooks/payed1.php">
<meta name="keywords" content="automatic redirection">

<?php
}