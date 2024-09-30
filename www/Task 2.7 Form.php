<?php declare(strict_types=1);
/*
Create a form with the following contents:
Use the select from the task 2.6
Add a required input field to ask for the number of units of the drink that we want to buy.
Add a submit button. After clicking on this button the page will show somethin with the following format:
"You have asked for 3 bottles of Coke. Total price to pay: 3 euros.
Always apply the security measures to the forms that you create
*/

$arrayOfProducts = [
        "cocacola" => ["text" => "CocaCola", "price" => 2.3],
        "pepsi" => ["text" => "Pepsi", "price" => 3.4],
        "fantanaranja" => ["text" => "Fanta naranja", "price"=>2.3],
        "trinamanzana" => ["text" => "Trina manzana", "price"=>1.2],
        ];

$price = "";

/* Utility functions for the select */
    function normalizeInputStr(string $str) : string{
        return str_replace(" ", "",  strtolower($str)); 
    }

    function createOption(array $arr) : void {
        $normalized = normalizeInputStr($arr["text"]);
        echo "<option value='$normalized' name='drink'> $arr[text] ($arr[price]$)</option>";
    }

    function createSelect(array $array) : void {
        echo "<select name='drink'>";
        foreach($array as $array_item) {
            //createOption($array_item);
            createOption($array_item);
        }
        echo '</select>';
    }

    function calculatePrice(array $drink, float $qtty) : float{
        $totalPrice = 0;
        // Get the drink from the $_POST of select which is an array.
        $totalPrice = $drink["price"] * $qtty;
        return $totalPrice;
    }

/* Validation functions & errors */

// Error values:
$quantityRangeError = "The quantity can't be 0 or less than 0.";
$quantityNotAnIntError = "The quantity can't be a decimal.";  

function testData(mixed $data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2.7 Form</title>
</head>
<body>
<?php
    if(!isset($_POST["submit"])) { ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php createSelect($arrayOfProducts)?>
        
        <input type="number" name="quantity" id="quantity" min="1"> <?php 
        if(empty($_POST["quantity"])) {
            echo "<span> $quantityRangeError </span>";
        } else if(!is_int($_POST["quantity"])) {
            echo "<span> $quantityNotAnIntError </span>"; 
        }
        ?>
        
        
        <input type="submit" value="Place order" name="submit"> 
    </form>
<?php } else { 
        $qtty = testData($_POST["quantity"]);
        echo var_dump($_POST);
        $drink = testData($_POST["drink"]);
    ?>
        <p><?php echo "You have asked for $_POST[quantity] of $_POST[drink]. Total price to pay is:" . calculatePrice($arrayOfProducts[$_POST['drink']], intval($_POST["quantity"]))?></p>
<?php } ?>
</body>
</html>