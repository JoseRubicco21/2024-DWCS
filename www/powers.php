<?php declare (strict_types=1);

    function powerCalculation(int $x, int $y) : float {
        $result = 1;
        for($i = $y; $i > 0; $i--){
            $result*=$x;
        }
       return $result;
    }

    function power(int  $x, int $y = 2) : int | float | string {
        if (!is_int($x)) throw new Exception("Error $x is not an integer.", 1);
        if (!is_int($y)) throw new Exception("Error $y is not an integer.", 1);     
        
        switch($y) {
            case $y == 0 && $x == 0:
                return "Undefined";
            case $y == 1;
                return $x;
            case $y < 0:
                return 1/powerCalculation($x, abs($y));
            default:
                return powerCalculation($x, $y);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Powers</title>
</head>
<body>
    <h1>Powers in PHP</h1>
    <?php
    try {
        echo "<p> for 2^2 : <b>" . power(2) . "</b></p>";
        echo "<p> for 2^4 : <b>" . power(3,4) . "</b></p>";
        echo "<p> for -(3^3) <b>: " . power(-3,3) . "</b></p>";
        echo "<p> for -(2^(-2)) <b>: " . power(-2,-2) . "</b></p>";
    } catch (Error $error) {
        echo "<p>" . $error->getMessage() . "</p>";
    }
    ?>
</body>
</html>