<?php declare(strict_types=1);

$msgError = "Name is required";
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
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
        if(!empty($_POST["name"])) {
        
    ?>   
        <p><?php echo "$_POST[name] wants to enroll in the following subject: $_POST[subject] " . (!empty($_POST["classes"]) ?  ( "and " . $_POST["classes"] ) : "")?></p>
<!-- This was used in the first iteration done with POST.
    <form action="./manage2.php" method="POST">
        <input type="text" name="name" id="name" value="<?php echo $_POST["name"] ?>" hidden>
        <input type="text" name="subject" id="subject" value="<?php echo $_POST["subject"]?>" hidden>
        <input type="submit" value="Next">
    </form>
-->
        <a href="./manage2.php?<?php echo "name=$_POST[name]&subject=$_POST[subject]"?>"> Link </a>
    <?php 
        } else {
            echo "<p><span class='error'>$msgError</span></p>";
        }
    ?>
    </main>
</body>
</html>