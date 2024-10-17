<?php declare(strict_types=1);
require_once("../lib/dynamicGenerators.php");
require_once("../data/db.php");
?>
<section class="hero-container">
    <div class="form-container backdrop-filter">
        <h1>Order book</h1>
        <form class="poppins-regular" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <div class="form-row">
                <label for="bookname">Book Name</label>
                <input type="text" name="bookname" id="bookname" >
                
            </div>
            <div class="form-row">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn">
                
            </div>
         
            <div class="form-row">
                <div class="form-group">
                    <div class="form-group-item">
                        <label for="printsize">Print Size</label>
                        <?php generateDynamicSelectOfAssociative($PrintSizes, "printsize")?>
                    </div>
                    <div class="form-group-item">
                        <label for="language">Languages</label>
                        <?php generateDynamicSelectOfAssociative($Languages, "language")?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="form-group-item">
                        <label for="color">Cover color</label>
                        <?php generateDynamicSelectOfAssociative($CoverColors, "color")?>
                    </div>
                    <div class="form-group-item">   
                        <label for="covertype">Cover Type</label>
                        <?php generateDynamicSelectOfArray($CoverTypes, "covertype")?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <input type="submit" value="Process Order">
            </div>

        </form>
        <?php if(!validateErrors($errors)){generateErrorBlock($errors);}?>
    </div>
</section>