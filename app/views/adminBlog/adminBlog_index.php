<h1>AdminBlogs</h1>

<br/>
<a class="add" href="<?=ADMINBLOG_NEW_PATH?>" value="AdminBlog toevoegen"> New adminBlog </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Title </td>
        <th> Description </td>
        <th> Imgurl </td>
    </tr>

<?php foreach($result as $adminBlog) { ?>        
    <tr>
        <td><a href="<?= URL(ADMINBLOG_SHOW_PATH, $adminBlog->ID); ?>"><?= $adminBlog->ID; ?></a></td>
        <td><?= $adminBlog->title; ?></td>
        <td><?= $adminBlog->description; ?></td>
        <td><?= $adminBlog->imgurl; ?></td>
        <td>
            <a class="edit" href="<?= URL(ADMINBLOG_EDIT_PATH, $adminBlog->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL(ADMINBLOG_DELETE_PATH, $adminBlog->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>