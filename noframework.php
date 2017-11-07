#!/usr/bin/php
  _   _       ______                                      _    
 | \ | |     |  ____|                                    | |   
 |  \| | ___ | |__ __ _ _ __ ___   _____      _____  _ __| | __
 | . ` |/ _ \|  __/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 | |\  | (_) | | | (_| | | | | | |  __/\ V  V / (_) | |  |   < 
 |_| \_|\___/|_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\

<?php

/**
 * This script is used te generate code for you.
 *   -  We have generate... functions. These create files for you.
 *   -  We have add... functions. These alter currently existing files.
 */



if (isset($argv[1])) {
    if($argv[1] === "generate" and isset($argv[2])) {
        generateScaffold(strtolower($argv[2]));
    } elseif ($argv[1] === "seed") {
        seedDB();
    } else { printHelp(); }
} else { printHelp(); }


echo("\n");



function printHelp() {
    echo "you can use the following functions
    generate [name]     - generates a scaffold 
    seed                - seeds the database \n";
}




function seedDB() {
    var_dump($name); // TODO
}

// Create the full MVC package
function generateScaffold($name) {
    // var_dump($name);
    generateModel($name);
    generateController($name);
    generateViews($name);
    addRoutes($name);
}


// Create a new class in the /app/models folder.
function generateModel($name) {
    createFile("/noframework/generateModel.txt.php", "/app/models/".$name.".php", $name); 
}


// Create a new Controller width the INDEX, SHOW, NEW, EDIT functions in the /app/models folder.
function generateController($name) {
    createFile("/noframework/generateController.txt.php", "/app/controllers/".$name."Controller.php", $name); 
}


// Create new INDEX, SHOW, NEW, EDIT views in a sepparate folder in /app/views.
function generateViews($name) {
    mkdir(__DIR__."/app/views/".$name, 0755);
    createFile("/noframework/generateViewIndex.txt.php", "/app/views/".$name."/".$name."_index.php", $name); 
    createFile("/noframework/generateViewShow.txt.php", "/app/views/".$name."/".$name."_show.php", $name); 
    createFile("/noframework/generateViewNew.txt.php", "/app/views/".$name."/".$name."_new.php", $name); 
    createFile("/noframework/generateViewEdit.txt.php", "/app/views/".$name."/".$name."_edit.php", $name); 
}


// Add 4 new routes to our /config/routes.php file 
function addRoutes($name) {  // TODO: as soon as the resource is implemented in the router we can simply this 
    $Name = ucfirst($name);
    $names = $name."s";
    
    $string = " \n
// ".$Name." crud
\$router->get('/$names', '".$Name."Controller#index');
\$router->get('/$names/:id/show',  '".$Name."Controller#show');
\$router->get('/$names/new',   '".$Name."Controller#new');
\$router->get('/$names/:id/edit',  '".$Name."Controller#edit');

\$router->post('/$names/create', '".$Name."Controller#create');
\$router->post('/$names/:id/update',  '".$Name."Controller#update');
\$router->post('/$names/:id/delete',   '".$Name."Controller#delete');";

    echo "\t \e[32m + NEW ROUTES \e[0m \n"; 
    file_put_contents(__DIR__."/config/routes.php", $string, FILE_APPEND); 
}


// Create a new file at the given $URI that has the text from $text inside of it
function createFile($fromURL, $toURL, $name) { 
    $Name = ucfirst($name);
    $names = $name."s";

    echo "\t \e[32m +  ".$toURL." \e[0m \n";  
    $file = file_get_contents(__DIR__.$fromURL);
    $string = eval("return '".$file."';");   // pure meta programming right here
    file_put_contents(__DIR__.$toURL, $string);     
}