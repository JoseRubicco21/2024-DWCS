<?php declare(strict_types=1);

// Easy Forms is a Library used to create dynamical forms in an easy manner. 
// Currently it's function based and only handles creation of certain blocks. 
// It would be a good idea to make it a class based system instead of a functional

class EasyForms {
    private static $instance;
    private $inputManagers;

    private function __construct()
    {
        $inputManagers = [];
    }

    public static function getInstance() : EasyForms {
        if(!self::$instance) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    // Register an Input manager to the EasyForms Instance.
    // It might be better to have a form object.
    public static function registerInputManager() : bool {
        return false;
    }
}

$EasyForms = EasyForms::getInstance();

?>