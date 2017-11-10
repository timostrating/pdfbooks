<h1>Product toevoegen</h1>

<form method="post" action="<?= ADMINPRODUCT_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Naam", "name"); ?>
        <?php generateTableField("Beschrijving", "description"); ?>
        <?php generateTableField("Afbeelding", "imgurl"); ?>
        <?php generateTableField("Prijs", "price"); ?>
        <?php generateTableField("CategorieID", "categorie_id", "number", $product->categorie_id); ?>
        
        <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
        
   </table>
</form>	