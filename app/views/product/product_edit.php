<?php if($row = mysqli_fetch_assoc($result)) { ?>		

    <h1>Product bewerken</h1>
    
    <form method="post" action="<?= LOCALHOSTURI ?>/products/$id/update">
       <table>

            <tr> <td>ID:</td>  <td><?= $row['ID'] ?></td></tr>
            <?= generateField("Naam", "name", "text", $row['name']); ?>
            <?= generateField("Beschrijving", "description", "text", $row['description']); ?>
            <?= generateField("Afbeelding", "imgurl", "text", $row['imgurl']); ?>
            <?= generateField("Prijs", "price", "text", $row['price']); ?>
            <?= generateField("", "", "submit", "Opslaan"); ?>

       </table>
       <input type="hidden" name="ID" value="<?= $row['ID'] ?>" />
    </form>		

<?php } else { die("Geen gegevens gevonden"); }