<?php declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formtests.php" method="post">
        <input type="text" name="greet" id="greet">
        <?php 
            echo "<h1>$_POST[greet] </h1>"
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>