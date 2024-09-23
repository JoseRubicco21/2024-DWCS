<?php declare(strict_types=1);
        
        define("NUMBER",4);

        function factorial(int $count) : int{
            $total = 1;
            if($count < 0) {
                throw new Exception("Value can't be zero. Sorry");
            } else {
                for(;$count > 0;$count--){
                    $total *= $count;
                }
                return $total; // If it's 0 it defaults to $total initialization value, wich is 1. covering for the edge case of !0
             } 
            };
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorial function</title>
</head>
<body>
    <h1>Factorial function</h1>
    <?php
    try {
        echo "<p>" . factorial(NUMBER) . "</p>";
        echo "<p>" . factorial(1) . "</p>";
        echo "<p>" . factorial(0) . "</p>";
        echo "<p>" . factorial(5) . "</p>";
        echo "<p>" . factorial(-3) . "</p>";
    } catch (Exception $e) {
        echo "<p>" . $e->getMessage() . "</p>";
    } 
    ?>
</body>
</html>