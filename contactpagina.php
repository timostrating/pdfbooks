<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title><?= isset($PageTitle) ? $PageTitle : "pdfbooks"?></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		</html>

<body>
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
<p>Naam: <input type="text" name="naam"><br><br> </p>

<p>Email: <input type="text" name="email"><br><br> </p>
<p>Opmerking:</p> <textarea name="commentaar" rows="5" 	cols="30"></textarea></br></br>

				<input type="submit" name="verstuur" value="Verstuur">
			</form>

		</div>
		<div class="col-lg-6">
		</br>

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
</html>