<?php declare(strict_types=1);

$msgError = "Name is required";
define("COOKIE_TIME", 5);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    
    if(!isset($_COOKIE["name"])){
        
        setcookie("name", $_POST["name"], time() + (60 * COOKIE_TIME),  "/");
    }
    
    if(!isset($_COOKIE["subject"])){
        setcookie("subject", $_POST["subject"], time() + (60 * COOKIE_TIME), "/");
    }
    
    if(!isset($_COOKIE["classes"])) {
        if(!empty($_POST["classes"])){
            setcookie("classes", $_POST["classes"], time() + (60 * COOKIE_TIME), "/");
        }
    }
    
    // Redirection to user availability of cookies.
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <main>
    <h1>First practice using forms</h1>
    <?php 
    // VERY IMPORTANT !! PLEASE READ PLEASE READ
    // VERY IMPORTANT !! PLEASE READ PLEASE READ
    // USE GET AS REQUEST METHOD SINCE THE HEADER FUNCTION USES GET TO REDIRECT.
    if($_SERVER["REQUEST_METHOD"] == "GET")
    
        if(!empty($_COOKIE["name"])) {
    ?>   
        <p><?php echo "$_COOKIE[name] wants to enroll in the following subject: $_COOKIE[subject] " . (!empty($_COOKIE["classes"]) ?  ( "and " . $_COOKIE["classes"] ) : "")?></p>
<!-- This was used in the first iteration done with POST.
    <form action="./manage2.php" method="POST">
        <input type="text" name="name" id="name" value="<php echo  $_POST["name"] ?>" hidden>
        <input type="text" name="subject" id="subject" value="<php echo $_POST["subject"]?>" hidden>
        <input type="submit" value="Next">
    </form>
-->
        <a href="./manage2.php"> Link </a> 
    <?php 
        } else {
            echo "<p><span class='error'>$msgError</span></p>";
        }
    ?>
    </main>
</body>
</html>