<h1 class="fl">Blogs</h1> <br/>
<a class="btn btn-success fr" href="<?=ADMINBLOG_NEW_PATH?>" value="Blog toevoegen"> Blog toevoegen </a>


<table class="table table-striped">
    <tr>
        <th> Title </td>
        <th> Description </td>
        <th> Imgurl </td>
        <th> Actions </td>
    </tr>

<?php foreach($result as $blog) { ?>        
    <tr>
        <td><?= $blog->title; ?></td>
        <td><?= $blog->description; ?></td>
        <td><?= $blog->imgurl; ?></td>
        <td>
            <a class="btn btn-info" href="<?= URL(ADMINBLOG_SHOW_PATH, $blog->ID); ?>">Bekijk</a>
            <a class="btn btn-warning" href="<?= URL(ADMINBLOG_EDIT_PATH, $blog->ID); ?>">Bewerken</a>
            <a class="btn btn-danger" method="post" href="<?= URL(ADMINBLOG_DELETE_PATH, $blog->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>