<?php
include('header.php');
$pageNumber = 1;
if (isset($_GET['id'])) {
    $pageNumber = $_GET['id'];
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
} else {
    $que = ("SELECT * FROM catogorien WHERE ID = '$pageNumber';") or die(mysqli_error());
    $res = mysqli_query($db, $que);
    $cat = mysqli_fetch_assoc($res);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3"> 
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #ccc;">Categorieën</li>
                    <?php
                    $query = ("SELECT * FROM catogorien;") or die(mysqli_error());
                    $result = mysqli_query($db, $query);
                    $y = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li class="list-group-item"><a href="?id=<?php echo $y; ?>"><?php echo ucfirst($row['name']); ?></a></li>
                        <?php
                        $y++;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-md-9"> <?php
            $test = 0;
            if (isset($_POST['search']) OR isset($_GET['src'])) {
                if (isset($_POST['search'])) {
                    $_SESSION['search'] = $_POST['search'];
                }
                $search_value = $_SESSION["search"];
                $zoek = "SELECT * FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\"  LIMIT 10 OFFSET $pageID;";
                $zoekresult = mysqli_query($db, $zoek);
                $zoektel = "SELECT COUNT(*) FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
                $zoekentel = mysqli_query($db, $zoektel);
                $searchcount = mysqli_fetch_assoc($zoekentel);
                $getelt = $searchcount['COUNT(*)'];
                $resu = ceil($getelt / 10);
                ?>

                <li class="list-group-item" style="background-color: #ccc;"><?php echo $getelt; ?> Zoekresultat(en)</li>

                <?php
                while ($zoeken = mysqli_fetch_assoc($zoekresult)) {
                    if (isset($zoeken["description"])) {
                        $zoeken["description"] = $zoeken["name"];
                    }
                    ?>
                    <li class="list-group-item"><?php echo $test + 1 . ". "; ?><a href="#"><?php echo ucfirst($zoeken["name"]); ?></a></li>

                    <?php
                    $test++;
                }
                if ($test >= 1) {
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
                        <?php
                    }
                }
                if ($test < 1) {
                    ?>
                    <li class="list-group-item">Er zijn geen resultaten gevonden</li>
                    <?php
                }
            }
            if (isset($_GET['id']) OR isset($_GET['idnr'])) {
                if (isset($_GET['id']) OR isset($_GET['idnr'])) {
                    ?>
                    <li class="list-group-item" style="background-color: #ccc;"><?php echo ucfirst($cat['name']); ?></li>
                    <?php
                    if (isset($_GET['id'])) {
                        $_SESSION['id'] = $_GET['id'];
                    }
                    $cato = $_SESSION['id'];
                    $pageNumber = 1;
                    
                    if (isset($_GET['idnr'])) {
                        $pageNumber = $_GET['idnr'];
                    }
                    $pageID = ($pageNumber * 10) - 10;
                    $products = ("SELECT * FROM products WHERE cat_ID= '$cato' LIMIT 10 OFFSET $pageID;") or die(mysqli_error());
                    $product = mysqli_query($db, $products);
                    $count = ("SELECT COUNT(*) FROM products WHERE cat_ID = '$cato';") or die(mysqli_error());
                    $rest = mysqli_query($db, $count);
                    $list = mysqli_fetch_assoc($rest);
                    $nummer = ceil($list['COUNT(*)'] / 10);
                    $x = 1;
                    while ($item = mysqli_fetch_assoc($product)) {
                        ?>

                        <li class="list-group-item"><?php echo "$x. "; ?><a href="#"><?php echo ucfirst($item['name']); ?></a></li>

                        <?php
                        $x++;
                    }
                    ?>
                    <div class="container">                 
                        <ul class="pagination">
                            <?php
                            if ($nummer > 1) {
                                for ($z = 1; $z <= $nummer; $z++) {
                                    ?>
                                    <li><a href="?idnr=<?php echo $z; ?>"><?php echo $z; ?></a></li>
                                    <?php
                                }
                            }
                        }
                    }
                    if (!isset($_GET['src']) AND isset($_GET['page'])) {
                        $pageNumber = 1;
                        if (isset($_GET['page']) AND ! isset($_GET['src'])) {
                            $pageNumber = $_GET['page'];
                        }
                        $pageID = ($pageNumber * 10) - 10;
                        $query = ("SELECT * FROM products LIMIT 10 OFFSET $pageID;") or die(mysqli_error());
                        $result = mysqli_query($db, $query);
                        if (!isset($_POST['search'])) {
                            ?>
                            <li class="list-group-item" style="background-color: #ccc;">Alles</li>
                            <?php
                            $a = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <li class="list-group-item"><?php echo "$a. "; ?><a href="#"><?php echo ucfirst($row['name']); ?></a></li>
                                <?php
                                $a++;
                            }
                            ?>
                    </div>
                    <?php
                    if (!isset($_GET['src']) AND isset($_GET['page'])) {
                        $count = ("SELECT COUNT(*) FROM products;") or die(mysqli_error());
                        $rest = mysqli_query($db, $count);
                        $list = mysqli_fetch_assoc($rest);
                        $nummer = ceil($list['COUNT(*)'] / 10);
                        ?>
                        <div class="container">                 
                            <ul class="pagination">
                                <?php
                                for ($z = 1; $z <= $nummer; $z++) {
                                    ?>
                                    <li><a href="?page=<?php echo $z; ?>"><?php echo $z; ?></a></li>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
            </div>
        </div>

