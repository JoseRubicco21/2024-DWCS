<?php declare(strict_types=1);
require_once('../lib/dynamicGenerators.php');
require_once('../lib/sessionManager.php');

?>
<section class="hero-container">
<div class="form-container backdrop-filter">
    <h1>Receipt information</h1>
    <!-- Book Information -->
    <h2>Book Information</h2> 
    <?php generateReceiptList([
        "Book name" => $_SESSION["bookname"],
        "ISBN" => $_SESSION["isbn"],
        "Print Size" => $_SESSION["printsize"],
        "Language" => $_SESSION["language"],
        "Cover Color" => $_SESSION["color"],
        "Cover Type" => $_SESSION["covertype"]
        ])?>
<!-- Billing Information -->
<h2>Billing information</h2>
<?php
        generateReceiptList([
            "Street" => $_SESSION["street"],
            "City" => $_SESSION["city"],
            "County" => $_SESSION["county"],
            "State" => $_SESSION["state"],
            "Country" => $_SESSION["country"],
            "Zip code" => $_SESSION["zipcode"]
        ]);
            flushSessionState($_SESSION);
            ?>
</div>
</section>
