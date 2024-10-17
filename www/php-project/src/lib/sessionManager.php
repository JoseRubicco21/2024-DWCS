<?php 
// Sesion state is a "key" only array stored to refer to the 
// $_SESSION[key] values in order to delete / add when needed
$sesionState = [];

function addToSessionState(array $postArray) {
    foreach($postArray as $postKey => $postValue) {
        if(!isset($_SESSION[$postKey])){
            $_SESSION[$postKey] = $postValue;
        }
    }
}


function flushSessionState(array $keys) {
    foreach($keys as $key => $value){
        if(isset($_SESSION[$key])){
            if($key != "username"){
                unset($_SESSION[$key]);
            }
        }
    }
    $sesionState = [];
}

function redirectIfNotLoggedIn(){
    if(empty($_SESSION["username"])){
        header('Location: /php-project/src/pages/login.php?loged=false');
        exit();
    }
}

function redirectIfNotInCorrectStep(string $redirectTarget,string $key){
    if(empty($_SESSION[$key])){
        header("Location: /php-project/src/pages/$redirectTarget");
    }
}

?>