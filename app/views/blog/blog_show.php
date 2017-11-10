<?php if(empty($result) == false) {  $blog = $result[0] ?>

    <h1>Blog <?= $blog->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $blog->ID; ?></p>
    <p><b> Title: </b> <?= $blog->title; ?></p>
    <p><b> Description: </b> <?= $blog->description; ?></p>
    <p><b> imgurl: </b> <?= $blog->imgurl; ?></p>

<?php } else { die("Blog niet gevonden"); }