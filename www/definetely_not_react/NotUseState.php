<?php declare (strict_types=1);
    require_once("./NotReact.php");


    function notUseState(string $key, mixed $initialValue) : array {
        $React = NotReact::getInstance();

        if(!isset($React->storage[$key])) {
            $React->storage[$key] = [
                'value' => $initialValue,
                'setter' => function(mixed $newValue) use ($key) {
                    notSetState($key,$newValue);
                }
            ];
        };

        return [
            $React->storage[$key]['value'],
            $React->storage[$key]['setter']
        ];
    }

    function notSetState(string $key, mixed $newValue) : void {

        $React = NotReact::getInstance();
        if( isset( $React->storage["key"] )){
            $React->storage['key']['value'] = $newValue;
        }
    }
?>