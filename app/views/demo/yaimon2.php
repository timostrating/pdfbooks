<?php include_once('sidebarhead.php'); ?>
<!-- Create post form with inputs -->
<form class="form-horizontal" style="padding-top: 5%" method="post">
    <fieldset>
        <legend>Voeg items toe:</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label">Naam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Naam">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Beschrijving</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="description" rows="5" cols="30"
                          placeholder="Beschrijving"></textarea><br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Foto link</label>
            <div class="col-sm-10">
                <input type="url" class="form-control" name="imgurl" placeholder="URL">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Prijs</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="price" placeholder="Prijs">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">Voeg toe aan database</button>
            </div>
        </div>
    </fieldset>
</form>


<?php
# DATABASE CONNECTIE ...

if (isset($_POST['submit'])) {  // check if the form is submitted
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imgurl = $_POST['imgurl'];
    $price = $_POST['price'];


// Run query and check if succesfull
    $query = "INSERT INTO Products (name, description, imgurl, price) VALUES  ('$name','$description','$imgurl','$price');";
    if (mysqli_query($db, $query)) {
        echo "Item succesvol aan database toegevoegd.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}

?>
<?php include_once('sidebarfoot.php'); ?>

