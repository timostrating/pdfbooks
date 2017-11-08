<style>
    a.btn{
        text-decoration: none !important;
        display: inline-block;
        padding: 0px 30px;
        font-size: 15px;
    }
</style>
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
    if (isset($_GET['plus'])) {
        array_push($_SESSION['items'], $_GET['plus']);
        ?>
        <audio style="display: none;" autoplay="true" src="assets/money.mp3"></audio>
        <?php
    }
    if (isset($_GET['min'])) {
        $search = array_search($_GET['min'], $_SESSION['items']);
        unset($_SESSION['items'][$search]);
        ?>
        <audio style="display: none;" autoplay="true" src="assets/boo.mp3"></audio>
        <?php
    }
    $count = array_count_values($_SESSION['items']);
    ?>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Amount</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Add</th>
                    <th>Remove</th>
                </tr>
                <?php
                foreach ($_SESSION['items'] as $items) {
                    $query = ("SELECT * FROM products WHERE ID = '$items';") or die(mysqli_error());
                    $result = mysqli_query($db, $query);
                    $row = mysqli_fetch_assoc($result);
                    if ($count[$row['ID']] > 1) {
                        ?> <tr><td><?= $count[$row['ID']]; ?></td><td><?= $row['ID']; ?></td><td><?= ($count[$row['ID']] * $row['cost']); ?></td><td><a class="btn btn-success" href="?plus=<?php echo $row['ID']; ?>">+</a></td><td><a class="btn btn-danger" href="?min=<?php echo $row['ID']; ?>">-</a></td>
                        </tr><?php
                        $count[$row['ID']] = $count[$row['ID']] - $count[$row['ID']];
                    } if ($count[$row['ID']] != 0 AND $count[$row['ID']] == 1) {
                        ?> <tr><td><?php echo $count[$row['ID']]; ?></td><td><?= $row['ID']; ?></td><td><?= ($count[$row['ID']] * $row['cost']); ?></td><td><a class="btn btn-success" href="?plus=<?php echo $row['ID']; ?>">+</a></td><td><a class="btn btn-danger" href="?min=<?php echo $row['ID']; ?>">-</a></td>
                        </tr>
                        <?php
                    }
                    $totaal = $totaal + $row['cost'];
                    $_SESSION['bedrag'] = $totaal;
                }
                ?>
            </table>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Cart Total</th><th></th>
                    </tr>
                    <tr><td>Cart total Exl. BTW</td><td>€ <?php printf("%.2f", $_SESSION['bedrag'] * 0.79); ?></td></tr>
                    <tr><td>BTW(21%)</td><td>€ <?php printf("%.2f", $_SESSION['bedrag'] * 0.21); ?></td></tr>
                    <tr><td>Total</td><td>€ <?php printf("%.2f", $_SESSION['bedrag']); ?></td></tr>
                    <tr>
                        <td></td><td><form method="post" action="checkout.php">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </form></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "Je moet wel wat in je winkelwagentje hebben om iets te kopen! bitch.";
}
