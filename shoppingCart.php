<?php
include('header.php');
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
$db = new mysqli($servername, $username, $password, $mydb);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$totaal = 0;
if (isset($_SESSION['items'])) {
    $count = array_count_values($_SESSION['items']);
    foreach ($_SESSION['items'] as $items) {
        $query = ("SELECT * FROM products WHERE ID = '$items';") or die(mysqli_error());
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        if ($count[$row['ID']] > 1) {
            ?> <li text-align="center"><?php echo $count[$row['ID']] . "| | | |" . $row['ID'] . "| | | |" . $row['name'] . "| | | |" . ($count[$row['ID']] * $row['cost']); ?><a href="?plus=<?php echo $row['ID']; ?>">+</a><a href="?min=<?php echo $row['ID']; ?>">-</a></li>
            <?php
            $count[$row['ID']] = $count[$row['ID']] - $count[$row['ID']];
        } if ($count[$row['ID']] != 0 AND $count[$row['ID']] == 1) {
            ?> <li><?php echo $count[$row['ID']] . "| | | |" . $row['ID'] . "| | | |" . $row['name'] . "| | | |" . ($count[$row['ID']] * $row['cost']);?><a href="?plus=<?php echo $row['ID']; ?>">+</a><a href="?min=<?php echo $row['ID']; ?>">-</a></li>
            <?php
        }
        $totaal = $totaal + $row['cost'];
        $_SESSION['bedrag'] = $totaal;
        
    }

    ?>
            <li>totaal: <?php echo $totaal ?></li>
            <form method="post" action="checkout.php">
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>
            <?php
    if (isset($_GET['plus'])) {
        array_push($_SESSION['items'], $_GET['plus']);
        header('location: /pdfbooks/shoppingCart.php');
    }
    if (isset($_GET['min'])) {
        $search = array_search($_GET['min'], $_SESSION['items']);
        unset($_SESSION['items'][$search]);
        header('location: /pdfbooks/shoppingCart.php');
    }
} else {
    echo "Je moet wel wat in je winkelwagentje hebben om iets te kopen! bitch.";
}
include('footer.php');
