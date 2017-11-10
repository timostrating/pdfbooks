<h1>Producten</h1>

<div class="row">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item" style="background-color: #175271; color: white;">Categorieën</li>
            <?php foreach($result as $categorie) { ?>        
                <li class="list-group-item"> <a href="<?= URL( CATEGORIE_SHOW_PATH, $categorie->ID); ?>" ><?= $categorie->name; ?></a> </li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-md-9">