<?php if(empty($result) == false) {  $order = $result[0] ?>		

    <h1>Bestelling bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINORDER_UPDATE_PATH, $order->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$order->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $order->name); ?>
            <tr> <td></td> <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td></tr>
            
       </table>
    </form>		

<?php } else { die("AdminOrder niet gevonden"); }