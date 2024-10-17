<?php declare(strict_types=1);
require_once("../lib/dynamicGenerators.php");
require_once("../data/db.php");
?>

<section class="hero-container">
    <div class="form-container backdrop-filter">
        <h1>Billing information</h1>
        <form class="poppins-regular" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> 
            <div class="form-row">
                <div class="form-group">
                    <div class="form-group-item">
                        <label for="street">Street</label>
                        <input type="text" name="street" id="street">
                    </div>
                    <div class="form-group-item">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-group-item">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state">
                    </div>
                    <div class="form-group-item">
                        <label for="county">County</label>
                        <input type="text" name="county" id="county">
                    </div>
                </div>
            </div>
            
        <div class="form-row">
            <div class="form-group">
                
                <div class="form-group-item">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" name="zipcode" id="zipcode">
                    
                </div>
                <div class="form-group-item">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country">
                </div>
            </div>
        </div>
            
            <div class="form-row">
                <input type="submit" value="Order book">
            </div>
            
            <?php if(!validateErrors($errors)){generateErrorBlock($errors);}?>
        </form>
    </div>
</section>