<?php declare (strict_types=1);
  
    function NotAHello(object $props) : mixed {
        return (
            $data = "
            <div>
                <h1>Hello! $props->name</h1>
                <p>Your current email is: $props->email</p>
            </div>
            "
        );
    }
?>