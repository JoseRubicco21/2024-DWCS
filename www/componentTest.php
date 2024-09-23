<?php declare(strict_types=1);
// yeah so... we making php be react lol.
    
    function componentTest(object $props) : mixed {

        return (
            $data = "
            <div>
                <h1>$props->title</h1>
                <p>$props->text</p>
            </div>
            "
        );
    }
?>