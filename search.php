<?php
    include('header.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "pdfbooks";
    // Create connection
    $db = new mysqli($servername, $username, $password, $mydb);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    echo "Connected successfully<br />";

    $search_value = $_POST["search"];
    $query = "SELECT * FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
    $result = mysqli_query($db, $query);
    if (!$result) {
        die("Er zijn geen resultaten.");
    }
?>

    <ul>
        <?php
            while($row = mysqli_fetch_assoc($result)) {
                if(isset($row["description"])) {
                    $row["description"] = $row["name"];
                }
        ?>
                <li><?php echo $row["name"]; ?></li>

        <?php
            }
        ?>
    </ul>



