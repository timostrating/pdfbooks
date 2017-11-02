#!/usr/bin/php
<?php

generateScaffold("product");



function generateScaffold($name) {
    generateModel($name);
    generateController($name);
    generateViews($name);
    addRoute($name);
}


function generateModel($name) {
    $file = file_get_contents(__DIR__."/noframework/generateModel.txt.php");   
    $string = eval("return \"".$file."\";");  // pure meta programming right here
    createFile("/app/models/".$name.".php", $string); 
}


function generateController($name) {
    $file = file_get_contents(__DIR__."/noframework/generateController.txt.php");
    $string = eval("return \"".$file."\";");  // pure meta programming right here
    createFile("/app/controllers/".$name."Controller.php", $string); 
}


function generateViews($name) {
    mkdir(__DIR__."/app/views/".$name, 0755);

    $file = file_get_contents(__DIR__."/noframework/generateViewIndex.txt.php");
    createFile("/app/views/".$name."/".$name."_index.php", $file); 

    $file = file_get_contents(__DIR__."/noframework/generateViewShow.txt.php");
    createFile("/app/views/".$name."/".$name."_show.php", $file); 

    $file = file_get_contents(__DIR__."/noframework/generateViewNew.txt.php");
    createFile("/app/views/".$name."/".$name."_new.php", $file); 

    $file = file_get_contents(__DIR__."/noframework/generateViewEdit.txt.php");
    createFile("/app/views/".$name."/".$name."_edit.php", $file); 
}


function addRoute($name) {  // TODO: as soon as the resource is implemented in the router we can simply this 
    $string = "
// Crud
\$router->add('/$name/index', '".ucfirst($name)."Controller#index');
\$router->add('/$name/show',  '".ucfirst($name)."Controller#show');
\$router->add('/$name/new',   '".ucfirst($name)."Controller#new');
\$router->add('/$name/edit',  '".ucfirst($name)."Controller#edit');";

    echo "\t + NEW ROUTES \n"; 
    file_put_contents(__DIR__."/config/routes.php", $string, FILE_APPEND); 
}

function createFile($URI, $string) {
    echo "\t + ".$URI." \n";    
    file_put_contents(__DIR__.$URI, $string);     
}