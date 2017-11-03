<?php
include('header.php');
$pageNumber = 2;
if (isset($_GET['id'])) {
    $pageNumber = $_GET['id'];
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
    $query = ("SELECT * FROM catogorien;") or die(mysqli_error());
    $result = mysqli_query($db, $query);
    $products = ("SELECT * FROM products WHERE cat_ID= '$pageNumber';") or die(mysqli_error());
    $product = mysqli_query($db, $products);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3"> 
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #ccc;">Categorieën</li>
                    <?php
                    $y = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li class="list-group-item"><a href="?id=<?php echo $y; ?>"><?php echo $row['name']; ?></a></li>
                        <?php
                        $y++;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <?php
            $x = 1;
            while ($item = mysqli_fetch_assoc($product)) {
                ?>
                <li class="list-group-item"><a href="#"><?php echo "$x: " . $item['name']; ?></a></li>

                <?php
                $x++;
            }
            ?>
        </div>
    </div>
</div>

