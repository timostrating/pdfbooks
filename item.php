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

$item = mysqli_real_escape_string($db, $_GET['id']);
$query = "SELECT * FROM products WHERE ID= $item";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <table class="table table-striped table-hover">
        <tr>
            <th>Name</th>
             <th>Description</th>
             <th>URL</th>
             <th>Price</th>
        </tr>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['url']; ?></td>
            <td><?php echo $row['cost']; ?></td>
        </tr>
    </table>
<form method="post" style="text-align: right;">
    <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
</form>
</div>
<?php
if (isset($_POST['submit'])) {
    ?>
    <audio style="display: none;" autoplay="true" src="assets/money.mp3"></audio>
    <?php
    if (!isset($_SESSION['items'])) {
        $items = array($row['ID']);
        $_SESSION['items'] = $items;
    } else {
        array_push($_SESSION['items'], $row['ID']);
    }
}