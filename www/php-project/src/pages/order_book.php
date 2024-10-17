<?php declare(strict_types=1); 
require_once("../lib/ValidatorsSanitization.php");
require_once("../lib/sessionManager.php");
require_once("../data/db.php");
session_start();
redirectIfNotLoggedIn();

$bookName = $isbn = $printSize = $language = $color = $coverType = "";
$errors = [
    "bookname" => "",
    "isbn" => "",
    "language"=> "",
    "printsize" => "",
    "color" => "",
    "covertype" => "",
    "step" => ""
];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(!empty($_POST["bookname"])){
        $bookName = sanitize($_POST["bookname"]);
    } else {
        $errors["bookname"] = "Error! Book name is required.";
    }

    if(!empty($_POST["isbn"])) {
        $isbn = sanitize($_POST["isbn"]);
    } else {
        $errors["isbn"] = "Error! ISBN is required.";
    }

    if(!empty($_POST["printsize"])){
        $printSize = sanitize($_POST["printsize"]);
    } else {
        $errors["printsize"] = "Error! Print size is required.";
    }

    if(!empty($_POST["language"])){
        $language = sanitize($_POST["language"]);
    } else {
        $errors["language"] = "Error! Language is required.";
    }

    if(!empty($_POST["color"])){
        $color = sanitize($_POST["color"]);
    } else {
        $errors["color"] = "Error! Color is required."; 
    };

    if(!empty($_POST["covertype"])){
        $coverType = sanitize($_POST["covertype"]);
    } else {
        $errors["covertype"]= "Error! Cover type is required.";
    }

    if(validateErrors($errors)){
        addToSessionState($_POST);
        header('Location: /php-project/src/pages/order_directions.php');
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<?php require("../components/layout/head.php")?>
<body>
    <?php require("../components/layout/header.php")?>
    <main>
    <?php require("../components/forms/bookform.php") ?>
    </main>    
    <?php require("../components/layout/footer.php")?>
</body>
</html>