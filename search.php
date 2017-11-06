<?php
    include('header.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "pdfbooks";
    // Create connection
    $db = new mysqli($servername, $username, $password, $mydb);

    // Check if connection display any errors
    if ($db->connect_error) {
        die("YOLO");
    }
      /*  mysqli_query($db, "CREATE TABLE Products (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL,
    description VARCHAR( 255 ) NOT NULL, 
    imgurl VARCHAR( 255 ) NOT NULL, 
    price VARCHAR( 255 ) NOT NULL);");
        mysqli_query($db, "INSERT INTO products (name, description, imgurl, price) VALUES 
    ('Kokosnoten zijn geen specerijen', 'Een van de grootste boeken ooit', 'http://via.placeholder.com/550x350?text=Kokosnoten', '12.50'),
    ('Piraten en de 7 dwergen', 'Een spanend avontuur', 'http://via.placeholder.com/350x550?text=Piraten', '5.00'),
    ('Nederlands', 'Een veel gebruikt boek voor het vak Nederlands', 'https://placeimg.com/500/480?text=Nederlands', '7.25'),
    ('Engels', 'Een veel gebruikt boek voor het vak Engels', 'https://placeimg.com/700/450?text=Engels', '8,99'),
    ('Project management', 'Een veel gebruikt boek voor het vak project management', 'https://placeimg.com/600/600?text=Project+managment', '30,00')"); */
    

    if(isset($_POST['search'])){
        $search_value = $_POST['search'];
     }
    $query = "SELECT * FROM products WHERE name LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
    $result = mysqli_query($db, $query);
    
    if (!$result) {
        die("No products found.");
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



