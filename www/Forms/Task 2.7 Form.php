<?php declare(strict_types=1); 

// We create the varaibles we're going to use:
$quantity = $drink = $totalPrice = "";

$arrayOfProducts = [
    "cocacola" => ["text" => "CocaCola", "price" => 2.3],
    "pepsi" => ["text" => "Pepsi", "price" => 3.4],
    "fantanaranja" => ["text" => "Fanta naranja", "price"=>2.3],
    "trinamanzana" => ["text" => "Trina manzana", "price"=>1.2],
    ];
    
// We create error variables for the required fields:
$quantityError = $drinkError = "";

// If it has been submitted then we validate, otherwise we just display the form.
// We do errors here on to check if something has been submitted

ipf($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // We should run validations for each case we want after check if it's not empty.
    if(empty($_POST["quantity"]) || $_POST["quantity"] == " ") {

    if(!is_int($_POST["quantity"])) {
            
        $quantityError = "Quantity needs to be an int.";

        } else if(intval($_POST["quantity"]) <= 0) {
            $quantityError = "Quantity cannot be 0 or lower than 0.";
        }

        // is it empty?
        $quantityError = "Quantity cannot be empty.";
    } else {
        $quantity = test_input($_POST["quantity"]); // A number
    }
    
    
    if(empty($_POST["drink"])) {

        $drinkError = "Drink cannot be empty";

    } else {
        $drink = test_input($_POST["drink"]); // A str of a drink present in the select
    }


    // If there are no errors, calculate the total price
    if (empty($quantityError) && empty($drinkError)) {
        $totalPrice = calculatePrice($arrayOfProducts[$drink], intval($quantity));
    }
}

// we define our sanitization function.
function test_input(mixed $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.7 Forms</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php createSelect($arrayOfProducts) ?>
        <input type="number" name="quantity" id="quantity" min="1"  value="quantity"> 
        <span style="color: red;"><?php echo $quantityError; ?></span>
        <span style="color: red;"><?php echo $drinkError; ?></span>
        <input type="submit" value="Submit" name='submit'>
    </form>
    
    <?php if (!empty($totalPrice)) { ?>
        <p><?php echo "You have asked for $quantity bottles of " .  $arrayOfProducts[$drink]["text"] . " Your total is: $totalPrice euros."; ?></p>
    <?php } ?>
</body>
</html>