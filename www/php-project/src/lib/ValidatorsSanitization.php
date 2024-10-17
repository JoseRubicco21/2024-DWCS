<?php declare(strict_types=1);



$passwordRequirementsErrors = [];

function normalizeString(string $str) : string{
    return str_replace(" ", "", strtolower($str));
}

function sanitize(mixed  $data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail(string $email) : bool {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    return false;
}

function isEmailInUse(string $email, array $users) : bool {
    $isAlreadyInUse = false;
    foreach($users as $user){
        $user["email"] === $email ? $isAlreadyInUse = true : $isAlreadyInUse = false; 
    }   
    return $isAlreadyInUse;
}

/* This function is not going to be used yet. */
function validatePasswordRequirements(string $password) : bool {
    /*
    (?=(?:.*[A-Z]){2,}) # 2 upper case letters
    (?=(?:.*[a-z]){2,}) # 2 lower case letters
    (?=(?:.*\d){2,}) # 2 digits
    (?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){2,}) # 2 special characters
    */

    $isValid = true;
    
    if(strlen($password) < 8) { 
        $isValid = false;
        $passwordRequirementsErrors["length"] = "Error! The password length.";
    }
    
    if(!preg_match("(?=(?:.*[A-Z]){2,})", $password)) { 
        $isValid = false;
        $passwordRequirementsErrors["capital"]  = "Error! The password must have at least 2 capital letters.";
    }
    
    if(!preg_match("(?=(?:.*[a-z]){2,})", $password)) { 
        $isValid = false;
        $passwordRequirementsErrors["lowercase"] = "Error! The password must have at least 2 lowercase letters.";
    }
    
    if(!preg_match("(?=(?:.*\d){2,})", $password)) { 
        $isValid = false; 
        $passwordRequirementsErrors["numbers"] = "Error! The passowrd must have two numbers.";
    }

    if(!preg_match("(?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){2,})", $password)) {
        $isValid = false; 
        $passwordRequirementsErrors["symbols"] = "Error! The password must have two special characters.";
    }

    return $isValid;
}


function validateLogin(string $username, string $password, array $database) : bool {
    $isValidLogin = false;
    ( $database[$username]["password"] == $password ) ? $isValidLogin = true :  $isValidLogin = false;
    return $isValidLogin;
}

function validateMatchingPasswords(string $password1, $password2) : bool{
    return ($password1 === $password2); 
}


// This takes 0 as empty so be careful.
function validateErrors(array $errors) : bool {
    if(empty(array_filter($errors))) return true;
    return false;
}
?>