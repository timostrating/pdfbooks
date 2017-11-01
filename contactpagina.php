<?php include_once('header.php');?>
<div class="container">

	<main>
	<fieldset>
<div align = "center">	
	<h1>Contact</h1>
	<p> Beste klant u bevindt zich op onze contactpagina hier kunt u ons contacteren</br> als u vragen of klachten heeft, u kunt ons gerust bellen, emailen </br>
	of laat een berichtje achter door het formulier in te vullen, wij proberen hier zo snel</br> mogelijk op te reageren. </br> Mvg Pdfbooks.</p></br>
	
</div>
<form method ="post" >
	<div class="row marketing">
          <div class="col-lg-6">
          	<div class="container">
 <br><input type="text" name="naam"  required placeholder="Naam"><br> </p>

<br><input type="text" name="email"   pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
    required placeholder="email" 
><br><br> 
 <textarea name="commentaar" rows="5" 	cols="30" placeholder="Opmerking"></textarea></br>

				<input type="submit" name="verstuur" value="Verstuur">
			</form>
</div>
		</div>
		<div class="col-lg-6">
		</br></br></br>

			<ul style="">
		<li><img src="phone.png" alt="phone" width="50" height="50"> 050-1232234 </li></br>
		<li><img src="email.png" alt="phone" width="50" height="50">  Pdf@books.nl </li></br>
		<li><img src="map.png" alt="map" width="50" height="50">  PO adres: 123 Kerkstraat </li></br>
			
		</div>

</fieldset>
</main>
<?php
function test_input($data) { 
	$data = trim($data); 	
	$data = stripslashes($data); 
		$data = htmlspecialchars($data); 	 		
 return $data; }
 if ($_SERVER["REQUEST_METHOD"] == "POST")
		 { 	$naam = test_input($_POST["naam"]); 
		 	$email = test_input($_POST["email"]);
		 	 		$opmerkingen = test_input($_POST["commentaar"]); 
		 	 	}
?>
<?php
echo "<h2>Uw invoergegegevens:</h2>"; 
	echo $naam; 
	echo "<br>"; 
	echo $email; 
	echo "<br>"; 
	echo $opmerkingen; 
	?> 

	<?php //hier komt de validatie//
	 $naamErr = $emailErr = $opmerkingErr = ""; 	
	 $naam = $email = $opmerkingen =  ""; 
	 	if ($_SERVER["REQUEST_METHOD"] == "POST") { 		
	 		if (empty($_POST["naam"])) { 			$naamErr = "Naam is verplicht"; 		}	 		
	 		else { 			$name = test_input($_POST["naam"]); 		} 		
	 		if (empty($_POST["email"])) { 			$emailErr = "Email is verplicht"; 		} 		
						 		else { 			$email = test_input($_POST["email"]); }
		if (empty($_POST["commentaar"])) { 			$opmerkingErr = " Geen opmerking achtergelaten"; 		} 		
						 		else { 			$email = test_input($_POST["commentaar"]); }
						 		} 
						 			?>

<?php if (empty($_POST["email"])) echo $emailErr; ?> </br>
<?php if (empty($_POST["commentaar"])) echo $opmerkingErr; ?></br>
<?php if (empty($_POST["naam"])) echo $naamErr; ?>

	
</div>
<?php include_once('footer.php');?>