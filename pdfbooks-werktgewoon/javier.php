
<?php include_once('header.php');?>
<div class="container">

  

<?php 
// error message where you can decide what it displays
if(isset($_GET["error"])) : ?>
   <div class="alert alert-warning">
  <strong>Oeps</strong> <?= $_GET["error"] ?>
<?php endif;  ?>


<!-- info about contactpage -->
</div>

		<h1 align="center">Contact</h1>
		<p align="center"> Beste klant u bevindt zich op onze contactpagina hier kunt u ons contacteren<br/> 
			als u vragen of klachten heeft, u kunt ons gerust bellen, emailen <br/>
			of laat een berichtje achter door het formulier in te vullen, wij proberen hier zo snel<br/> 
			mogelijk op te reageren. <br/> 
			Mvg Pdfbooks.
		</p>
		<br>
		<br>
	</center>

	<!-- input fields for name, email, and your comment -->

	<div class="row marketing">
        <div class="col-md-6" style="padding-left: 100px;">
			<form method="post">          	
          		<input class="form-control" type="text" name="naam" required placeholder="Naam"> <br/> 
          		<input class="form-control" type="email" name="email" placeholder="email"> <br/> 
 				<textarea class="form-control" type="text" name="commentaar" rows="5" cols="30" required placeholder="Opmerkingen"></textarea> <br/> 
				<input type="submit" name="verstuur" class="btn btn-success" value="Verstuur"> <br/> <br/>
			</form>
		</div>
		<div class="col-md-6" style="padding-left: 100px;">
			<ul style="">
				<!-- icons displaying email, adress and phone number -->
				<li><img src="http://www.endlessicons.com/wp-content/uploads/2012/12/iphone-5-icon-614x460.png" alt="phone" width="60" height="50"> 050-1232234 </li> <br/>
				<li><img src="http://www.endlessicons.com/wp-content/uploads/2012/12/email-icon-614x460.png" alt="phone" width="60" height="50">  Pdf@books.nl </li> <br/>
				<li><img src="http://www.endlessicons.com/wp-content/uploads/2012/12/pin-map-icon-2-614x460.png" alt="map" width="60" height="50">  PO adres: 123 Kerkstraat </li> <br/>
			</ul>
		</div>
	</div>

<!-- connecting to database and asigning the outputs-->
<?php   
$servername = "localhost";
$username = "root";
$password = "";
$dbconnect = "pfdbooks";

if(isset($_POST['verstuur'])){
	$naam = $_POST['naam'];
	$email = $_POST['email'];
	$commentaar = $_POST['commentaar'];

// Create connection
$conn = new mysqli($servername, $username, $password , $dbconnect);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Bericht verzonden!";

$query= ("INSERT INTO reacties(naam, email, commentaar)" . "VALUES ('$naam', '$email', '$commentaar')");
$yes = mysqli_query($conn, $query);
}
?> 


</div>
<?php include_once('footer.php');?>

