<?php include_once('header.php'); ?>
<div class="container" style="padding-top: 20px">
    <div class="row">
        <div class="col-lg-4"><h3>Populair</h3><br>
            <img src="https://i.mgtbk.nl/boeken/9789001875275-480x600.jpg?_=iC%2Fv05wR" height="380" width="300">
        </div>
        <div class="col-lg-4"><h3>Nieuw</h3><br>
            <img src="https://s.s-bol.com/imgbase0/imagebase3/large/FC/1/7/4/2/9200000035782471.jpg" height="380" width="300">
        </div>
        <div class="col-lg-4"><h3>Per vak</h3><br>
            <img src="https://s.s-bol.com/imgbase0/imagebase3/large/FC/4/7/9/6/1001004007136974.jpg" height="380" width="300">
        </div>
    </div>

    <div class="row" style="padding-top: 40px;">
        <div class="col-lg-3">
            <div class="categorie">
                <h4 align="center" style="padding-right: 80px; padding-bottom: 10px;"><b>Categorieën</b></h4>
                <ul>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $mydb = "pdfbooks";
                    $db = new mysqli($servername, $username, $password, $mydb);
                    // Create connection
                    $db = new mysqli($servername, $username, $password, $mydb);

// Check connection
                    if ($db->connect_error) {

                        die("Connection failed: " . $db->connect_error);
                    } else {
                        $que = ("SELECT * FROM catogorien;") or die(mysqli_error());
                        $res = mysqli_query($db, $que);
                        $x = 1;
                        while ($cat = mysqli_fetch_assoc($res)) {
                            ?>
                            <li><a href="webshop.php?id=<?php echo $x; ?>"><?php echo ucfirst($cat['name']);?></a></li>
                            <?php
                            $x++;
                        }
                    }
                    ?>


                </ul>
            </div>
        </div>
        <div class="col-lg-6" style="padding-left: 40px;"><h4 style="font-family: fantasy;">PDFBooks, DE website waar alle schoolboeken online verkrijgbaar zijn!</h4><br>
            <p>Bij PDFBooks </p>
        </div>
        <div class="col-lg-3" style="padding-top: 90px;">
            <div class="voordelen">
                <ul>
                    <li>Directe download</li>
                    <li>Goedkoop</li>
                    <li>Gemakkelijk</li>
                    <li>Voor al uw boeken</li>
                </ul>
            </div>
        </div>
    </div>


</div>


</div>
</html>