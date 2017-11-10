<?php if(empty($result) == false) {  $product = $result[0] ?>		

    <h1>Product bewerken</h1>
    
    <form method="post" action="<?= URL(PRODUCT_UPDATE_PATH, $product->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$product->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $product->name); ?>
            <?php generateTableField("Beschrijving", "description", "text", $product->description); ?>
            <?php generateTableField("Afbeelding", "imgurl", "text", $product->imgurl); ?>
            <?php generateTableField("Prijs", "price", "text", $product->price); ?>
            <?php generateTableField("", "", "submit", "Opslaan"); ?>

       </table>
    </form>		

<?php } else { die("Geen gegevens gevonden"); }