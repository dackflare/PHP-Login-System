<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "inc/config.php";

    Page::forceLogin();

    $User = new User($_SESSION['user_id']);

?>

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
            <legend class="uk-legend">Dashboard</legend>
            <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?>. <br>You are signed in as user <?php echo $User->user_id; ?>.</p>
            <p><a href="/php_login_system/logout.php">Logout</a></p>
        </div>

        <?php require_once "inc/footer.php"; ?>
    </body>
</html>
