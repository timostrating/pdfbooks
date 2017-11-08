<?php if(empty($result) == false) {  $item = $result[0] ?>		

    <h1>Item bewerken</h1>
    
    <form method="post" action="<?= URL(ITEM_UPDATE_PATH, $item->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$item->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $item->name); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>


       </table>
    </form>		

<?php } else { die("Item niet gevonden"); }