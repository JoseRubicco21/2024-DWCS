<?php declare(strict_types=1); 
session_start();
require_once("../lib/sessionManager.php");
redirectIfNotLoggedIn();
redirectIfNotInCorrectStep("order_book.php", "bookname");
redirectIfNotInCorrectStep("order_directions.php", "street");
?>

<!DOCTYPE html>
<html lang="en">
<?php require("../components/layout/head.php")?>
<body>
    <?php require("../components/layout/header.php")?>
    <main>
    <?php require("../components/receipt.php"); ?>
    </main>    
    <?php require("../components/layout/footer.php")?>
</body>
</html>
