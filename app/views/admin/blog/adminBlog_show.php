<?php if(empty($result) == false) {  $adminBlog = $result[0] ?>

    <h1>Blog <?= $adminBlog->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $adminBlog->ID; ?></p>
    <p><b> Title: </b> <?= $adminBlog->title; ?></p>
    <p><b> Description: </b> <?= $adminBlog->description; ?></p>
    <p><b> Imgurl: </b> <?= $adminBlog->imgurl; ?></p>

    <a class="btn btn-warning" href="<?= URL(ADMINBLOG_EDIT_PATH, $adminBlog->ID); ?>">Bewerken</a>
    <a class="btn btn-danger" method="post" href="<?= URL(ADMINBLOG_DELETE_PATH, $adminBlog->ID); ?>">Verwijderen<a>

<?php } else { die("AdminBlog niet gevonden"); }