<?php if(empty($result) == false) {  $blog = $result[0] ?>		

    <h1>Blog bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINBLOG_UPDATE_PATH, $blog->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$blog->ID;?></td></tr>
            <?php generateTableField("Titel", "title", "text", $blog->title); ?>
            <?php generateTableField("Beschrijving", "description", "text", $blog->description); ?>
            <?php generateTableField("Afbeelding", "imgurl", "text", $blog->imgurl); ?>
            <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
            
       </table>
    </form>		

<?php } else { die("Blog niet gevonden"); }