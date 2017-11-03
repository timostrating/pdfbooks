<?php
include('header.php');
$pageNumber = 1;
if (isset($_GET['id'])) {
    $pageNumber = $_GET['id'];
}
$pageID = ($pageNumber * 10) - 10;

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    ?>
    Er zijn geen boeken gevonden met uw zoek opdracht. <?php
    echo $_SESSION['search'];
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "pdfbooks";
    $db = new mysqli($servername, $username, $password, $mydb);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } else {
        $query = ("SELECT * FROM products LIMIT 10 OFFSET $pageID;") or die(mysqli_error());
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['ID'] . "|" . $row['name'] . "</br>";
        }

        $count = ("SELECT COUNT(*) FROM products;") or die(mysqli_error());
        $res = mysqli_query($db, $count);
        $list = mysqli_fetch_assoc($res);
        $nummer = ceil($list['COUNT(*)'] / 10);
        ?>
        <div class="container">                 
            <ul class="pagination">
                <?php
                for ($x = 1; $x <= $nummer; $x++) {
                    ?>
                    <li><a href="?id=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
}
include('footer.php');

//INSERT INTO catogorien (ID, name)
//VALUES	(1, 'communicatie'),
//		(2, 'talen'),
//        (3, 'economie'),
//        (4, 'exact'),
//        (5, 'techniek'),
//        (6, 'onderzoek'),
//        (7, 'management'),
//        (8, 'bedrijfskunde'),
//        (9, 'ontwikkeling'),
//        (10, 'recht'),
//        (11, 'wetenschap'),
//        (12, 'gezondheidszorg'); 
// 
?>