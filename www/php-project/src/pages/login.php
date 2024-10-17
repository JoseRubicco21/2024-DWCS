<?php declare(strict_types=1); 
session_start();
require_once("../lib/ValidatorsSanitization.php");
require_once("../lib/dynamicGenerators.php");
require_once("../data/db.php");

$username = $password = ""; 

// We want to specify an error but we do not want to specify the cause. This would give a hint to what went wrong.
// Giving a hint would mean an atacker can pin-point weakness easier and that's not particularly good.
$errors = [
    "username" => "",
    "password" => "",
    "login" => "",
    "orderbook" => ""
];

if($_SERVER["REQUEST_METHOD"] == "GET") {

   if(!empty($_GET["loged"])){
    if(!empty($_SERVER["HTTP_REFERER"])){
        if(empty($_SESSION["username"])){
            $errors["orderbook"] = "You must be logged in to order a book.";
        } else {
            header("Location: /php-project/src/pages/index.php");
        }
    }
    }    
   } 



if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if(!empty($_POST["username"])){
        $username = sanitize($_POST["username"]);
    } else {
        $errors["username"] = "You must provide an username to log-in.";
    }

    if(!empty($_POST["password"])){
        $password = sanitize($_POST["password"]);
    } else {
        $errors["password"] = "You must provide a password to log-in.";
    }

    // Check if username is in the database:
    if(isset($Users[$username])){
        // Check if Password matches the one in the database. 
        if(validateLogin($username, $password, $Users)) {
            $_SESSION["username"] = $username;
            header('Location: /php-project/src/pages/index.php');
            exit();

        } else {
            $errors["login"] = "Invalid username or password.";
        }
    } else {
        $errors["login"] = "Invalid username or password.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require("../components/layout/head.php")?>
<body>
    <?php require("../components/layout/header.php")?>
    <main>
    <?php require("../components/forms/login.php") ?>
    </main>    
    <?php require("../components/layout/footer.php")?>
</body>
</html>