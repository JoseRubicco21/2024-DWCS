<?php declare (strict_types=1);


    $array_of_arrays = array(
        array("text"=>"CocaCola", "price"=>"2.1"),
        array("text"=>"Pepsi", "price"=>"2"),
        array("text"=>"Fanta naranja" , "price"=>"2.5"),
        array("text"=>"Trina manzana" , "price"=>"2.3"),   
    );

    // Other ways to define arrays: 
    
    $array_2 = [
        "cocacola" => ["text" => "CocaCola", "price" => 2.3],
        "pepsi" => ["text" => "Pepsi", "price" => 3.4],
        "fantanaranja" => ["text" => "Fanta naranja", "price"=>2.3],
        "trinamanzana" => ["text" => "Trina manzana", "price"=>1.2]
        // and so on...
    ];

    // Another way: Define variables then append to a "master" array
    $Cocacola = ["text" => "cocacola", "price" => 2.3];
    $array_3 = ["cocacola" => $Cocacola];

    // Arrays are defined as indexed by default. Setting up keys
    // makes it a "Dict" or, "Object"


    function createSelect(array $array) : void {
        echo '<select>';
        foreach($array as $array_item) {
            //createOption($array_item);
            createOpt2($array_item);
        }
        echo '</select>';
    }

    function createOption(array $array) : void {
        echo "<option value='" . $array["text"] . "'>" . $array["text"] . "(" . $array["price"] . " )" . "</option>";
    };
    
    // Non concat way. Turns out that $Array[Key] will be good enough for php to work without concat.
    function createOpt2(array $arr) : void {
        $normalized = normalizeInputStr($arr["text"]);
        echo "<option value='$normalized'> $arr[text] ($arr[price]$)</option>";
    }

    function normalizeInputStr(string $str) : string{
        return str_replace(" ", "",  strtolower($str)); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <?php
            createSelect($array_of_arrays);
        ?>
    </form>
</body>
</html>
