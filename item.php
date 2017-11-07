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
    <div class="row">
        <div class="col-md-3"> 
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #ccc;">Name</li>
                <li class="list-group-item"><?php echo $row['ID']; ?></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #ccc;">Description</li>
                <li class="list-group-item"><?php echo $row['description']; ?></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #ccc;">URL</li>
                <li class="list-group-item"><?php echo $row['url']; ?></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #ccc;">Cost</li>
                <li class="list-group-item"><?php echo $row['cost']; ?></li>
            </ul>
        </div>
    </div>
    <form method="post">
        <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>
<?php
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['items'])) {
        $items = array($row['ID']);
        $_SESSION['items'] = $items;
    } else {
        array_push($_SESSION['items'], $row['ID']);
    }
}