<?php if(empty($result) == false) {  $product = $result[0] ?>		

    <h1>Product bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINPRODUCT_UPDATE_PATH, $product->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$product->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $product->name); ?>
            <?php generateTableField("Beschrijving", "description", "text", $product->description); ?>
            <?php generateTableField("Afbeelding", "imgurl", "text", $product->imgurl); ?>
            <?php generateTableField("Prijs", "price", "text", $product->price); ?>
            <?php generateTableField("CategorieID", "categorie_id", "number", $product->categorie_id); ?>
            <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
            
       </table>
    </form>		

<?php } else { die("AdminProduct niet gevonden"); }