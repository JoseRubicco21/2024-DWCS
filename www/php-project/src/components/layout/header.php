<?php
?>
<header>
    <div>        
        <a href="../pages/index.php"><img id="header-logo" src="/php-project/assets/Lirica_Logo_Color.png" alt="Lirica_logo"></a>
    </div>
    <nav>
        <?php echo isset($_SESSION["username"]) ? "Welcome back $_SESSION[username] <a class='link-button' href='../pages/logout.php' class='poppins'>Log-out</a>" :  "<a class='link-button' href='../pages/login.php' class='poppins'>Log-in</a>" ?>
    </nav>
</header>