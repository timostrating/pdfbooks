<?php if(empty($result) == false) {  $'.$name.' = $result[0] ?>		

    <h1>'.$Name.' bewerken</h1>
    
    <form method="post" action="<?=LOCALHOSTURI?>/'.$names.'/<?=$'.$name.'->ID;?>/update">
       <table>

            <tr> <td>ID:</td>  <td><?=$'.$name.'->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $'.$name.'->name); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>


       </table>
    </form>		

<?php } else { die("'.$Name.' niet gevonden"); }