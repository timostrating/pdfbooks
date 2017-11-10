<?php if(empty($result) == false) {  $adminCategorie = $result[0] ?>		

    <h1>AdminCategorie bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINCATEGORIE_UPDATE_PATH, $adminCategorie->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$adminCategorie->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $adminCategorie->name); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>


       </table>
    </form>		

<?php } else { die("AdminCategorie niet gevonden"); }