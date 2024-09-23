<?php declare (strict_types=1);
    
    function notUseState(array $useState) : void {
        $React = NotReact::getInstance();
        $React->storage+=['value' => $useState[0],'setter' => $useState[1]];
    }

    function notSetState(mixed $value, array $store) : void{
        $React = NotReact::getInstance();
        
    };

    // notSetState 


    // $val = notUseState("A")
    // Say $value = useState("testValue", setState()); 
    // Store initial value & current value ?
    // setState is just a setter
    // Everything is sotored statically in a the NotReact class
  
    // Use states has 3 parts to it's functiontioning:
    // A key, A value and a function.
    // Key : A representative name stored into the NotReact store
    // Value: The value set at initialState and setState
    // Function: A setter function that sets the value based on the key.
    // In order to "Store" the state what do i need to do ???? 
    // First declare as:
    // notUseState("Value") --> This would act as a "Constructor"
    // $data = useState([key, val, func]) ?
?>