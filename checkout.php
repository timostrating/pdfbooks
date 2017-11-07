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
if (isset($_SESSION['items'])) {
    ?>
<div class="container">
    <div class="row">
        <table class="table table-striped">
            <tr>
                <th>Amount</th>
                <th>Name</th>
                <th>Price</th>
            </tr>

<?php
    $count = array_count_values($_SESSION['items']);
    foreach ($_SESSION['items'] as $items) {
        $query = ("SELECT * FROM products WHERE ID = '$items';") or die(mysqli_error());
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        if ($count[$row['ID']] > 1) {
            ?> <tr><td><?= $count[$row['ID']]; ?></td><td><?= $row['name']; ?></td><td>€ <?php printf("%.2f", $count[$row['ID']] * $row['cost']); ?></td></tr>
            <?php
            $count[$row['ID']] = $count[$row['ID']] - $count[$row['ID']];
        } if ($count[$row['ID']] != 0 AND $count[$row['ID']] == 1) {
            ?> <tr><td><?= $count[$row['ID']]; ?></td><td><?= $row['name']; ?></td><td>€ <?php printf("%.2f", $count[$row['ID']] * $row['cost']);?></td></tr>
            <?php
        }
} 

    ?>
            <tr><td></td><td></td><td><table style="border-style: solid; border-top: black;">€ <?php printf("%.2f", $_SESSION['bedrag']); ?> Total</table></td></tr>
            <tr>
        <form method="post" action="payed.php">
            <td></td><td>Uw Email adress:</td><td><input type="email" name="email" value="<?php if(isset($_SESSION['uname'])){ echo $_SESSION['email']; }?>" placeholder="<?php if(!isset($_SESSION['uname'])){ echo "Example@example.nl"; }?>" required></td>
</tr>
 <tr><td></td><td></td><td>
    <button type="submit" name="submit" class="btn btn-primary">Betalen</button>
             </form></td></tr></table>
        <?php }

