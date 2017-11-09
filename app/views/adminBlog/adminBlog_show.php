<?php if(empty($result) == false) {  $adminBlog = $result[0] ?>

    <h1>AdminBlog <?= $adminBlog->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $adminBlog->ID; ?></p>
    <p><b> Title: </b> <?= $adminBlog->title; ?></p>
    <p><b> Description: </b> <?= $adminBlog->description; ?></p>
    <p><b> Imgurl: </b> <?= $adminBlog->imgurl; ?></p>

    <a class="edit" href="<?= URL(ADMINBLOG_EDIT_PATH, $adminBlog->ID); ?>">Bewerken</a>
    <a class="delete" method="post" href="<?= URL(ADMINBLOG_DELETE_PATH, $adminBlog->ID); ?>">Verwijderen<a>

<?php } else { die("AdminBlog niet gevonden"); }