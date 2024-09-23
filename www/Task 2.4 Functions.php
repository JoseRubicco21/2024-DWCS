<?php declare (strict_types=1);

    function greeting (?string $name, int $age,  ?string $surname="Apelido") : void{
        echo "<p><b>$name $surname is $age years old";
    };

    greeting("Jose", 23, "Rubicco");
    greeting(NULL,23,NULL);
    greeting(Null, 23);
?>