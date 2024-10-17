<?php declare(strict_types=1);

?>
<section class="hero-container">
    <div class='form-container backdrop-filter'>
        <h1>Login</h1>
        <form class='poppins-regular' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <div class='form-row'>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            
            <div class='form-row'>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class='form-row'>
                <input type="submit" value="Log in">
            </div>
            <a class='link-button' href='../pages/register.php'>Don't have an account? register</a>
        </form>
        <?php validateErrors($errors) ? "" : generateErrorBlock($errors);?>
    </div>
</section>