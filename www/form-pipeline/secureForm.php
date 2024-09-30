<?php declare(strict_types=1);
$nombre = $email = "";
// Errors:
$nameError = "Name is required.";
$emailError = "Email is required.";

function testData(mixed $data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

function validateString(string $data) : bool{
    if(!preg_match("/^[a-zA-Z-' ]*$/", $data)) {
        $data = "Only letters and white space is allowed";
        return true;
    } else {
        return false;
    }
}

function validateEmail(string $data) : bool {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $data = "Invalid email.";
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- If: If it's loading for first time-->
<?php
if (!isset($_POST["enviar"])) {?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
        Name <input type="text" name="formNombre" id="fomrNombre" > <?php if(empty($_POST["formNombre"]) && validateString($_POST["formNombre"])) echo "<span>$nameError</span>";?>
        Email <input type="text" name="formEmail" id="formEmail" > <?php if(empty($_POST["formEmail"]) && validateEmail($_POST["formEmail"])) echo "<span>$emailError</span>";?>
        <input type="submit" value="Submit" name="enviar">
    </form> 
<?php 
} else {
    $nombre = testData($_POST["formNombre"]);   
    $email =  testData($_POST["formEmail"]);
?>
    <h1> Hello <?php echo $nombre?> , your email is <?php echo $email?><h1>
<?php
}
?>
</body>
</html>