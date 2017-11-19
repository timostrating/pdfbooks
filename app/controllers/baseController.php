<?php

/**
 * This is the Controller that gets inherited in every other Controller.
 * 
 * It is responsible for all resources that the parents require.
 *      - the MVC structure and database are examples of this.
 */

class BaseController {
    public $DB;

    public function __construct() {
        $this->view = new View(
            new ViewLoader(platformSlashes(ROOT.'/app/views/'))
        );

        $this->DB = Database::Instance();
        $this->DB->connect();
    }
}