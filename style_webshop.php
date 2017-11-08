<?php
include('header.php');
$pageNumber = 1;
if (!isset($_GET['id']) AND !isset($_GET['idnr'])) {
    $catnr = 1;
}
if (isset($_GET['id'])) {
    $pageNumber = $_GET['id'];
    $_SESSION['id'] = $_GET['id'];
    $catnr = $_SESSION['id'];
}


if (isset($_GET['src'])) {
    $pageNumber = $_GET['src'];
}

$pageID = ($pageNumber * 10) - 10;

$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
$db = new mysqli($servername, $username, $password, $mydb);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_GET['id']) OR isset($_GET['idnr'])) {
    $catnr = $_SESSION['id'];
    $que = ("SELECT * FROM catogorien WHERE ID = '$catnr';") or die(mysqli_error());
    $res = mysqli_query($db, $que);
    $cat = mysqli_fetch_assoc($res);
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #175271; color: white;">Categorieën</li>
                <?php
                $query = ("SELECT * FROM catogorien;") or die(mysqli_error());
                $result = mysqli_query($db, $query);
                $y = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <li class="list-group-item"><a href="?id=<?php echo $y; ?>"><?php echo ucfirst($row['name']); ?></a>
                    </li>
                    <?php
                    $y++;
                }
                ?>
            </ul>
        </div>
        <div class="col-md-9"> <?php
            $search_value = "";
            $title = "Alle boeken";

            if (isset($_POST['search']) OR isset($_GET['src'])) {
                if (isset($_POST['search'])) {
                    $_SESSION['search'] = $_POST['search'];
                }
                $search_value = $_SESSION['search'];
            }
            $zoek = "SELECT * FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\"  LIMIT 10 OFFSET $pageID;";
            $zoekresult = mysqli_query($db, $zoek);
            $zoektel = "SELECT COUNT(*) FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
            $zoekentel = mysqli_query($db, $zoektel);
            $searchcount = mysqli_fetch_assoc($zoekentel);
            $getelt = $searchcount['COUNT(*)'];
            $resu = ceil($getelt / 10);

            if (isset($_POST['search']) OR isset($_GET['src'])) {
                $title = $getelt . "  Zoekresultat(en)";
            }
            ?>

            <table class="table table-striped table-hover">
                <tr>
                    <th colspan="4" style="background-color: #175271;"><h2
                                style="color: white;"><?php echo $title; ?></h2></th>
                    <?php

                    while ($zoeken = mysqli_fetch_assoc($zoekresult)) {
                    ?>
                <tr>
                    <td height="250">
                        <div class="row">
                            <div class="col-lg-3">
                                <div>
                                    <a href="/pdfbooks/item.php?id=<?php echo $zoeken["ID"]; ?>"><img
                                                style="height: auto; width: 80%;" src="<?php echo $zoeken['imgurl']; ?>"
                                                alt="Product image" height="141px" width="100px "></a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <a href="/pdfbooks/item.php?id=<?php echo $zoeken["ID"]; ?>"
                                   style="color: black;"><?php echo ucfirst($zoeken['name']); ?></a>
                                <p><?php echo ucfirst($zoeken['description']); ?></p>
                            </div>
                            <div class="col-lg-2">
                                <?php echo "&euro; " . $zoeken['price']; ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>

            <?php

            if ($zoekresult->num_rows >= 0) {
                ?>
                <div class="container">
                    <ul class="pagination">
                        <?php
                        if ($resu > 1) {
                            for ($k = 1; $k <= $resu; $k++) {
                                ?>
                                <li><a href="?src=<?php echo $k; ?>"><?php echo $k; ?></a></li>
                                <?php
                            }
                            ?>
                    </div>
                    </ul>
                    <?php
                }
            }
            if ($zoekresult->num_rows === 0) {
                ?>
                <li class="list-group-item">Er zijn geen producten gevonden</li>
                <?php
            }
            ?>
        </div>
    </div>

