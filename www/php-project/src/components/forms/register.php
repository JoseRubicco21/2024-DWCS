<?php declare(strict_types=1); 

?>
<section class="hero-container">
<div class='form-container backdrop-filter'>
    <h1>Register</h1>
    <form class='poppins-regular' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>' method='POST'>
        <div class="form-row">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-row">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-row">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-row">
            <label for="passwordconfirmation">Password Confirmation</label>
            <input type="password" name="passwordconfirmation" id="passwordconfirmation">
        </div>
        <input type="submit" value="Sign up">
        <?php validateErrors($errors) ? "" : generateErrorBlock($errors);?>
    </form>
</div>
</section>
    
