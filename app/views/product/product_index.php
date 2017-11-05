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

<?php foreach($result as $product) { ?>        
    <tr>
        <td><a href="<?=LOCALHOSTURI?>/products/<?=$product->ID;?>/show"><?= $product->ID; ?></a></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->description; ?></td>
        <td><?= $product->imgurl; ?></td>
        <td><?= $product->price; ?></td>
        <td>
            <a class="edit" href="<?=LOCALHOSTURI?>/products/<?=$product->ID;?>/edit">Bewerken</a>
            <form id="myForm<?=$product->ID;?>" method="post" action="<?=LOCALHOSTURI?>/products/<?=$product->ID;?>/delete">
                <a class="delete" href="#" onclick='document.getElementById("myForm<?=$product->ID;?>").submit()'>Verwijderen</a>
            </form>	
        </td>
    </tr>
<?php } ?>
</table>