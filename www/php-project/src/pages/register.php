<?php declare(strict_types=1); 
session_start();
require_once("../lib/ValidatorsSanitization.php");
require_once("../data/db.php");
require_once("../lib/dynamicGenerators.php");
$username = $password = $email = $passwordConfirmation = "";
$errors = [
    "user" => "",
    "email" => "",
    "password" => "",
    "passwordrepeat" => "",
    "passwordconfirmation" => "",
    "passwordmatch" => "",
    "alreadyregistered" => "",
];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!empty($_POST["username"])){
        $username = sanitize($_POST["username"]);
    } else {
        $errors["user"] = "Error! Username cannot be empty";
    }

    if(!empty($_POST["email"])){
        $email = sanitize($_POST["email"]);
    } else {
        $errors["email"] = "Error! email cannot be empty";
    }


    if(!empty($_POST["password"])){
        $password = sanitize($_POST["password"]);
    } else {
        $errors["password"] = "Error! password cannot be empty";
    }


    if(!empty($_POST["passwordconfirmation"])) {
        $passwordConfirmation = sanitize($_POST["passwordconfirmation"]);
    } else {
        $errors["passwordrepeat"] = "Error! You must repeat the password.";
    }

    if(validateErrors($errors)) {
        
        // Check if the passwords match : 
        if(validateMatchingPasswords($password, $passwordConfirmation)) {
            // Check if the user is not registered
            if(empty($Users[$username])){
                if(!isEmailInUse($email, $Users)){

                    // Register the user name to temp DB.
                    $Users[$username] = [
                        "id" => count($Users) + 1,
                        "email" => $email,
                        "password" => $password
                    ];
                    fwrite(fopen(USER_DATA, "wa+"), serialize($Users));
                    $_SESSION["username"] = $username;
                    header('Location: /php-project/src/pages/index.php');
                    exit();
                    
                } else {
                    $errors["email"] = "Email is already in use.";
                }
            } else {
                // User already registered error
                $errors["alreadyregistered"] = "User is already registered.";
            }
        } else {
            // Passwords don't match error
            $errors["passwordmatch"] = "Error! The passwords don't match.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php require("../components/layout/head.php")?>
<body>
    <?php require("../components/layout/header.php")?>
    <main>
    <?php require("../components/forms/register.php") ?>
    </main>    
    <?php require("../components/layout/footer.php")?>
</body>
</html>