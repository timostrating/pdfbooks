<?php 
/**
 * This is the place where all installation configurations are stored.
 * 
 * It is responsible for managing all application level resources.
 *      - require'ing files and Marking files for autoloading are examples of this.
 * 
 * TODO: Make a -sample version and make it work together.
 * TODO: Add this file to the .gitignore
 */
?>


<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


// NoFramework paths
define('ROOT', __DIR__.'/..');
define('ROOT_PATH', '/pdfbooks/public');  


// Route options
define('GENERATE_SUPERGLOBAL_ROUTES', true);


// Development options
define('DEVELOPMENT', true);
define('CONSOLE_MESSAGES_ON', DEVELOPMENT);
define('LOG_RAW_SQL', false);
