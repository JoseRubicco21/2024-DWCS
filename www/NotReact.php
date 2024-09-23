<?php declare (strict_types=1);

class NotReact {
        static public mixed $store;    

        static function render(mixed $component) : void {
            echo $component;
        }
    
    }
    
?>