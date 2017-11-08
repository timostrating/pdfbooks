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
    $input = strtolower($argv[1]);
    switch($input) {
        case "generate":    if(isset($argv[2])) { generateScaffold(lcfirst($argv[2])); } // AdminProduct could be the input, soo only lower the first character.
                            else { echo" [name] ook graag opgeven \n"; } break;
        case "seed":        seedDB(); break;
        case "routes":      showRoutes(); break;
        default:            printHelp();
    }
} else { printHelp(); }

echo("\n");  // To fix the layout we just add an enter on the end.



function printHelp() {
    echo "you can use the following functions
    generate [name]     - generates a scaffold 
    seed                - seeds the database
    routes              - shows all SuperGlobal route paths \n";
}



function showRoutes() {
    $string = file_get_contents(__DIR__."/config/routes.php");
    var_dump(eval("
        require(__DIR__.'/config/config.php');  
        require(__DIR__.'/core/router/router.php');
        \$router = new Router();
        \$router->echoGenerateGlobalConstant = true;
    ?>".$string));
}


function seedDB() {
    eval("
        define('CONSOLE_MESSAGES_ON', false);
        require(__DIR__.'/config/config.php'); 
        require(__DIR__.'/core/frameworkHelpers.php');      
        require(__DIR__.'/core/database/database.php');  
        \$DB = new Database();

        echo' ^^ Ignore what you see here ^^\n\n';
        \$DB->seed();
        echo'\n';
    ");
}


// Create the full MVC package
function generateScaffold($name) {
    generateModel($name);
    generateController($name);
    generateViews($name);
    addRoutes($name);
    addSeeds($name);
    seedDB();
}


// Create a new class in the /app/models folder.
function generateModel($name) {
    createFile("/noframework/generateModel.txt.php", "/app/models/".$name.".php", $name); 
}


// Create a new Controller width the INDEX, SHOW, NEW, EDIT functions in the /app/models folder.
function generateController($name) {
    createFile("/noframework/generateController.txt.php", "/app/controllers/".$name."Controller.php", $name); 
}


// Create new INDEX, SHOW, NEW, EDIT views in a sepparate folder that is then placed in /app/views/.
function generateViews($name) {
    mkdir(__DIR__."/app/views/".$name, 0755);
    createFile("/noframework/generateViewIndex.txt.php", "/app/views/".$name."/".$name."_index.php", $name); 
    createFile("/noframework/generateViewShow.txt.php", "/app/views/".$name."/".$name."_show.php", $name); 
    createFile("/noframework/generateViewNew.txt.php", "/app/views/".$name."/".$name."_new.php", $name); 
    createFile("/noframework/generateViewEdit.txt.php", "/app/views/".$name."/".$name."_edit.php", $name); 
}


// Add our crud routes to the /config/routes.php file 
function addRoutes($name) {  // TODO: as soon as the resource is implemented in the router we can simply this 
    $Name = ucfirst($name);
    $NAME = strtoupper($name);
    $names = $name."s";
    $Names = $Name."s";
    
    $string = " \n \n
// ".$Name." crud
\$router->get('/$names', '".$Name."Controller#index');
\$router->get('/$names/:ID/show',  '".$Name."Controller#show');
\$router->get('/$names/new',   '".$Name."Controller#new');
\$router->get('/$names/:ID/edit',  '".$Name."Controller#edit');

\$router->post('/$names/create', '".$Name."Controller#create');
\$router->post('/$names/:ID/update',  '".$Name."Controller#update');
\$router->post('/$names/:ID/delete',   '".$Name."Controller#delete');";

    echo "\t \e[32m + NEW ROUTES \e[0m \n"; 
    file_put_contents(__DIR__."/config/routes.php", $string, FILE_APPEND); 
}


// Add a new Table to our seeds file and add some test data.
function addSeeds($name) {
    $Name = ucfirst($name);
    $NAME = strtoupper($name);
    $names = $name."s";
    $Names = $Name."s";

    $string = "\n
\$DB->execute(\"CREATE TABLE ".$Names."(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL);\");  
\$DB->execute(\"INSERT INTO ".$Names." (name) VALUES ('test1'), ('test2')\");";
    
    echo "\t \e[32m + NEW SEEDS \e[0m \n"; 
    file_put_contents(__DIR__."/config/seeds.php", $string, FILE_APPEND); 
}


// Create a new file at the given $URI that has the text from $text inside of it
function createFile($fromURL, $toURL, $name) { 
    $Name = ucfirst($name);
    $NAME = strtoupper($name);
    $names = $name."s";
    $Names = $Name."s";

    echo "\t \e[32m +  ".$toURL." \e[0m \n";  
    $file = file_get_contents(__DIR__.$fromURL);
    $string = eval("return '".$file."';");   // pure meta programming right here
    file_put_contents(__DIR__.$toURL, $string);     
}