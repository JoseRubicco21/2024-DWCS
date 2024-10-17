<?php declare(strict_types=1);
require_once("../lib/ValidatorsSanitization.php");
require_once("../lib/sessionManager.php");
require_once("../data/db.php");
session_start();
redirectIfNotLoggedIn();

$street = $city = $state = $county = $zipcode = $country = "";
$errors = [
    "street" => "",
    "city" => "",
    "state" => "",
    "county" => "",
    "zipcode" => "",
    "country" => "",
];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(!empty($_POST["street"])){
        $street = sanitize($_POST["street"]);
    } else {
        $errors["street"] = "Error! street is required.";
    }

    if(!empty($_POST["city"])){
        $city = sanitize($_POST["city"]);
    } else {
        $errors["city"] = "Error! city is required.";
    }

    if(!empty($_POST["state"])){
        $state = sanitize($_POST["state"]);
    } else {
        $errors["state"] = "Error! state is required.";
    }

    if(!empty($_POST["county"])){
        $county = sanitize($_POST["county"]);
    } else {
        $errors["county"] = "Error! county is required.";
    }

    if(!empty($_POST["zipcode"])){
           $zipcode = sanitize($_POST["zipcode"]);
        } else {
            $errors["zipcode"] = "Error. Invalid Zipcode.";
        }

    if(!empty($_POST["country"])){
        $country = sanitize($_POST["country"]);
    } else {
        $errors["country"] = "Error!. Country is required.";
    }

    if(validateErrors($errors)){
        addToSessionState($_POST);
        header('Location: /php-project/src/pages/order_receipt.php');
        exit();
    }
}

redirectIfNotInCorrectStep("order_book.php", "bookname");

?>

<!DOCTYPE html>
<html lang="en">
<?php require("../components/layout/head.php")?>
<body>
    <?php require("../components/layout/header.php")?>
    <main>
    <?php require("../components/forms/directionform.php") ?>
    </main>    
    <?php require("../components/layout/footer.php")?>

</body>
</html>