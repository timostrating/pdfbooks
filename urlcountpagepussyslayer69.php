<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
$db = new mysqli($servername, $username, $password, $mydb);
$query = "SELECT * FROM Vieuws ORDER BY count DESC;";
$result = mysqli_query($db, $query);
?>
<div class="container">
    <table class="table">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row['url']; ?></td><td><?= $row['count']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
                <tr>
                <td><a href="home.php">Home</a></td>
                </tr>
    </table>
    
</div>
