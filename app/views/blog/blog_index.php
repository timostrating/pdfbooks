<h1>Blogs</h1>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
        <th> Description </td>
        <th> Imgurl </td>
    </tr>

<?php foreach($result as $blog) { ?>        
    <tr>
        <td><a href="<?= URL(BLOG_SHOW_PATH, $blog->ID); ?>"><?= $blog->ID; ?></a></td>
        <td><?= $blog->title; ?></td>
        <td><?= $blog->description; ?></td>
        <td><?= $blog->imgurl; ?></td>
    </tr>
<?php } ?>
</table>