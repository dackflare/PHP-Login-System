<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "inc/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-epuiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="follow">

        <title>Page Title</title>

        <base href="/" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.24/css/uikit.min.css" />
    </head>

    <body>

        <div class="uk-section uk-container">
            <?php 
                echo "Hello World! The date is ";
                echo date("m d y");
            ?>
            <p>
                <a href="/php_login_system/login.php">Login</a>
                <a href="/php_login_system/register.php">Register</a>
            </p>


        </div>

        <?php require_once "inc/footer.php"; ?>
    
    </body>
</html>
