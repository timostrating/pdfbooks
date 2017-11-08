<?php if(empty($result) == false) {  $user = $result[0] ?>		

    <h1>User bewerken</h1>
    
    <form method="post" action="<?= URL(USER_UPDATE_PATH, $user->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$user->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $user->name); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>

       </table>
    </form>		

<?php } else { die("User niet gevonden"); }