<?php if(empty($result) == false) {  $user = $result[0] ?>		

    <h1>User bewerken</h1>
    
    <form method="post" action="<?= URL(USER_UPDATE_PATH, $user->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$user->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $user->name); ?>
            <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
            
       </table>
    </form>		

<?php } else { die("User niet gevonden"); }