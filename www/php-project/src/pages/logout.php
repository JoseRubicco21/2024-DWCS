<?php declare(strict_types=1);
session_start();
session_unset();
session_destroy();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    header('Location: /php-project/src/pages/index.php');
    exit();
}

?>
