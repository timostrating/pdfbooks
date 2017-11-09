<?php if(empty($result) == false) {  $adminBlog = $result[0] ?>		

    <h1>AdminBlog bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINBLOG_UPDATE_PATH, $adminBlog->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$adminBlog->ID;?></td></tr>
            <?php generateTableField("Title", "title", "text", $adminBlog->title); ?>
            <?php generateTableField("Description", "description", "text", $adminBlog->description); ?>
            <?php generateTableField("Imgurl", "imgurl", "text", $adminBlog->imgurl); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>

       </table>
    </form>		

<?php } else { die("AdminBlog niet gevonden"); }