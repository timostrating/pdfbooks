#!/usr/bin/php

                *****************
                ** NOFRAMEWORK **
                *****************
 
                       NO
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/

                  JUST PURE PHP

<?php

/**
 * This script is used te generate code for you.
 *   -  We have generate... functions. These create files for you.
 *   -  We have add... functions. These alter currently existing files.
 */



generateScaffold("page");
echo("\n");


// Create the full MVC package
function generateScaffold($name) {
    // echo($name);
    generateModel($name);
    generateController($name);
    generateViews($name);
    addRoutes($name);
}


// Create a new class in the /app/models folder.
function generateModel($name) {
    $file = file_get_contents(__DIR__."/noframework/generateModel.txt.php");   
    $string = eval("return \"".$file."\";");  // pure meta programming right here
    createFile("/app/models/".$name.".php", $string); 
}


// Create a new Controller width the INDEX, SHOW, NEW, EDIT functions in the /app/models folder.
function generateController($name) {
    $file = file_get_contents(__DIR__."/noframework/generateController.txt.php");
    $string = eval("return \"".$file."\";");  // pure meta programming right here
    createFile("/app/controllers/".$name."Controller.php", $string); 
}


// Create new INDEX, SHOW, NEW, EDIT views in a sepparate folder in /app/views.
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


// Add 4 new routes to our /config/routes.php file 
function addRoutes($name) {  // TODO: as soon as the resource is implemented in the router we can simply this 
    $string = "
// Crud
\$router->add('/$name/index', '".ucfirst($name)."Controller#index');
\$router->add('/$name/show',  '".ucfirst($name)."Controller#show');
\$router->add('/$name/new',   '".ucfirst($name)."Controller#new');
\$router->add('/$name/edit',  '".ucfirst($name)."Controller#edit');";

    echo "\t + NEW ROUTES \n"; 
    file_put_contents(__DIR__."/config/routes.php", $string, FILE_APPEND); 
}


// Create a new file at the given $URI that has the text from $text inside of it
function createFile($URI, $text) {
    echo "\t + ".$URI." \n";    
    file_put_contents(__DIR__.$URI, $text);     
}