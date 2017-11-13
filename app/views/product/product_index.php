<?php 
$title = (isset($_GET["search"])) ? ((count($result) == 1) ? "1 resultaat" : count($result)." resultat(en)") : "Alle boeken"; 

if (strpos($_SERVER['REQUEST_URI'],'categorie') !== false) {
    $title = count($result)." resultat(en) in deze categorie";
}
?>



<table class="table table-striped table-hover">
    <th colspan="4" style="background-color: #175271;">
        <h2 style="color: white;"><?= $title; ?></h2>
    </th>

<?php if(empty($result)) { echo "<tr> <td> Er zijn geen resultaten </td> </tr>"; } ?>
<?php foreach($result as $product) { ?> 
    <tr>
        <td height="250">
            <div class="row">
                <div class="col-lg-3">
                    <div>
                        <a href="<?= URL(PRODUCT_SHOW_PATH, $product->ID); ?>">
                            <img style="height: auto; width: 80%;" src="<?= $product->imgurl; ?>"
                                    alt="<?= $product->name; ?>" height="141px" width="100px ">
                                <?= $product->name; ?></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <a href="<?= URL(PRODUCT_SHOW_PATH, $product->ID); ?>" style="color: black;">
                        <p><?= $product->description; ?></p>
                    </a>
                </div>
                <div class="col-lg-2">
                    <?= "&euro; " . $product->price; ?>
                </div>
            </div>
        </td>
    </tr>
<?php } ?>
</table>

<?php /* if ($zoekresult->num_rows >= 0) { ?>
    <div class="container">
        <ul class="pagination">
            <?php if ($resu > 1) {
                for ($k = 1; $k <= $resu; $k++) {?>
                    <li><a href="?src=<?php echo $k; ?>"><?php echo $k; ?></a></li> <?php
                }
            }?>                
        </ul> 
    </div><?php
} */ ?>

