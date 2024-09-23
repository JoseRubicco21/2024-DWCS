<?php declare (strict_types=1);

class NotReact {
    
    private static $instance;
    public array $storage = [];  
    
    private function __construct(){

    }


    public function getStorage() :  mixed {
        return $this->storage;
    }

    public static function getInstance() : NotReact {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    static function render(mixed $component) : void {
            echo $component;
    }
    
}

$NotReact = NotReact::getInstance();
?>