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
        width: 200px;     
    }
    .body{
        background-color: #f9f9f9;
        border-color: #e7e7e7;
        border-right-color: black;
        border-width: 1px;
        left: 40px;
        color: #333;
        padding-left: 40px;
        width: 50%;     
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
            <div class="col-md-2"><img src="http://lorempixel.com/400/200/" alt="Smiley face" height="100px" width="100%"></div>
            <div class="col-md-8">

                <table class="table table-striped table-hover">
                    <div class="titel">
                        <tr rowspan="2">
                            <td><h1><?= ucfirst($row['username']); ?></h1></td>
                            <td></td>
                        </tr>
                    </div>
                    <tr>
                        <th>Voornaam</th>
                        <td><?= ucfirst($row['naam']); ?></td>
                    </tr>
                    <tr>
                        <th>Achternaam</th>
                        <td><?= ucfirst($row['lastname']); ?></td>
                    </tr>
                    <tr>
                        <th>Emailadres</th>
                        <td><?= ucfirst($row['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Geslacht</th>
                        <td><?= ucfirst($row['gender']); ?></td>
                    </tr>
                    <tr>
                        <th>Land</th>
                        <td><?= ucfirst($row['country']); ?></td>
                    </tr>
                    <tr>
                        <th>Provincie</th>
                        <td><?= ucfirst($row['state']); ?></td>
                    </tr>
                    <tr>
                        <th>Stad</th>
                        <td><?= ucfirst($row['city']); ?></td>
                    </tr>
                    <tr>
                        <th>Straatnaam</th>
                        <td><?= ucfirst($row['streetname']); ?></td>
                    </tr>
                    <tr>
                        <th>Huisnummer</th>
                        <td><?= $row['streetnumber']; ?></td>
                    </tr>
                    <tr>
                        <th>Postcode</th>
                        <td><?= $row['zip']; ?></td>
                    </tr>
                    <tr>
                        <td><form action="update.php">
                                <input type="submit" name="update" class="btn btn-primary" value="Aanpassen">
                            </form></td>
                        <td><form action="delete.php">
                                <input type="submit" name="delete" class="btn btn-primary" value="Verwijderen">
                            </form></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <br>


    <?php
}
if (ucfirst($_SESSION['uname']) == "Kevin") {
    ?>
    <table>
        <br><br><br>
        <td><a href="urlcountpagepussyslayer69.php">Page Vieuws</a></td>
    </table>
    <?php
}