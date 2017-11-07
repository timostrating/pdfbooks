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

define('ROOTPATH', __DIR__.'\..');   // TODO: this is not the ideal URI
define('LOCALHOSTURI', '/pdfbooks/public');  // TODO this is a terrible name
define('DEVELOPMENT', true);  // TODO this is a terrible name