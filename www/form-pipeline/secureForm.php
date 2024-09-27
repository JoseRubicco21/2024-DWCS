<?php declare(strict_types=1);

$nombre = " ";
$email = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = testData($_POST["formNombre"]);   
    $email = testData($_POST["formEmail"]);
}

function testData(mixed $data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};


function validateString(string $data) : string{
    if(!preg_match("/^[a-zA-Z-' ]*$/", $data)) {
        $data = "Only letters and white space is allowed";
        return $data;
    } else {
        return $data;
    }
}

function validateEmail(string $data) : string {
    if(!filter_var($data, FILTER_VALIDATE_EMAIL)) {
        $data = "Invalid email.";
        return $data;
    } else {
        return $data;
    }
}


//function validateInt(){}
//function validateFloat(){}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
        Name <input type="text" name="formNombre" id="fomrNombre" required>
        Email <input type="text" name="formEmail" id="formEmail" required>
        <input type="submit" value="Submit">
    </form> 
    </p>
</body>
</html>