<?php
    require 'NotReact.php';


    function notUseState(array $useState) : void{

    }

    function notSetState(mixed $value, array $store) : void{
        //$store[$mixed]=$mixed;
    };

    // $val = notUseState("A")

    // Say $value = useState("testValue", setState()); 
    // Store initial value & current value ?
    // setState is just a setter
    // Everything is sotored statically in a the NotReact class
     
?>