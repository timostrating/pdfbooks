<?php if($row = mysqli_fetch_assoc($result)) { ?>	

    <h1>Product <?= $row['ID'] ?> </h1>
    
    <p><b> ID: </b> <?= $row['ID'] ?></p>
    <p><b> Name: </b> <?= $row['name'] ?></p>
    <p><b> Description: </b> <?= $row['description'] ?></p>
    <p><b> Imgurl: </b> <?= $row['imgurl'] ?></p>
    <p><b> Price: </b> <?= $row['price'] ?></p>

<?php
} else { die("Product niet gevonden"); }