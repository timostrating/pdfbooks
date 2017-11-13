<?php
include('header.php');
?>
<style>
    .titel{
        background-color: #f9f9f9;
        border-color: #e7e7e7;
        border-right-color: black;
        border-width: 1px;
        left: 40px;
        color: #333;
        padding-left: 40px;
        width: 350px;     
    }
    input[type=text], select {
        width: 100%;
        border: 1px solid #333;
        border-radius: 5px;
    }
    input[type=text1], select {
        width: 100%;
        border: 1px solid #333;
        border-radius: 5px;
    }
    input[type=email], select {
        width: 100%;
        border: 1px solid #333;
        border-radius: 5px;
    }
    input[type=number], select {
        width: 100%;
        border: 1px solid #333;
        border-radius: 5px;
    }
</style>
<?php
//variabelen voor de verbinding
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";

//maakt een connectie
$db = new mysqli($servername, $username, $password, $mydb);

//Controleert de connect, als deze er niet is geeft hij een error bericht weer
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$id = $_SESSION['id'];
//maakt een query aan om de combinatie van gebruikersnaam en wachtwoord of emailadres en wachtwoord te controleren en of deze ook in de database staan
$query = "SELECT ID, username, naam, lastname, email, gender, country, state, city, streetname, streetnumber, zip FROM users WHERE ID ='$id'";

//voert de query uit
$result = mysqli_query($db, $query);

//controleert of de gebruikersnaam of het email adres is gevonden in de database
if (mysqli_num_rows($result) > 0) {

//stopt de waardes van de database in een array
    $row = mysqli_fetch_assoc($result)
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <table class="table table-striped table-hover">
                    <div class="titel">
                        <tr rowspan="2">
                            <td><h1><?= ucfirst($row['username']); ?></h1></td>
                            <td></td>
                        </tr>
                    </div>
                    <form method="post" action="updateaction.php">
                        <tr>
                            <th>Voornaam</th>
                            <td><input type="text1" name="fname" value="<?= ucfirst($row['naam']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Achternaam</th>
                            <td><input type="text1" name="lname" value="<?= ucfirst($row['lastname']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Emailadres</th>
                            <td><input type="email" name="email" value="<?= ucfirst($row['email']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Geslacht</th>
                            <td><input type="text1" name="gen" value="<?= ucfirst($row['gender']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Land</th>
                            <td><input type="text1" name="country" value="<?= ucfirst($row['country']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Provincie</th>
                            <td><input type="text1" name="state" value="<?= ucfirst($row['state']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Stad</th>
                            <td><input type="text1" name="city" value="<?= ucfirst($row['city']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Straatnaam</th>
                            <td><input type="text1" name="streetname" value="<?= ucfirst($row['streetname']); ?>"></td>
                        </tr>
                        <tr>
                            <th>Huisnummer</th>
                            <td><input type="number" name="streetnum" value="<?= $row['streetnumber']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td><input type="text1" name="zip" value="<?= $row['zip']; ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="check" class="btn btn-primary" value="Aanpassen"></td>
                        </tr>
                    </form>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php
}
    if (ucfirst($_SESSION['uname']) == "Kevin") {
        ?>
        <a href="urlcountpagepussyslayer69.php">Page Vieuws</a>
        <?php
    }
    include('footer.php');
    