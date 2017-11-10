<?php if(empty($result) == false) {  $adminUser = $result[0] ?>		

    <h1>AdminUser bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINUSER_UPDATE_PATH, $adminUser->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$adminUser->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $adminUser->name); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>


       </table>
    </form>		

<?php } else { die("AdminUser niet gevonden"); }