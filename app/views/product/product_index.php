<h1>Producten</h1>

<br/>
<a class="add" href="<?=LOCALHOSTURI?>/products/new" value="Product toevoegen"> New product </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
        <th> Description </td>
        <th> Imgurl </td>
        <th> Price </td>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>        
    <tr>
        <td><?= $row['ID'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['imgurl'] ?></td>
        <td><?= $row['price'] ?></td>
        <td>
            <a class="edit"  href="<?=LOCALHOSTURI?>/products/<?=$row['ID']?>/edit">Bewerken</a>
            |
            <form method="post" action="<?=LOCALHOSTURI?>/products/<?=$row['ID']?>/delete">
                <?= generateField("", "", "submit", "Verwijderen"); ?>         
            </form>	
        </td>
    </tr>
<?php } ?>
</table>