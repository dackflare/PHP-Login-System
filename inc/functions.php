<?php

// force the user to be logged in or redirect them
function forceLogin() {
    if(isset($_SESSION['user_id'])) {
        // The user is allowed here
    } else {
        // The user is not allowed here
        header("Location: /php_login_system/login.php"); exit;
    } 
}       

// skip the login page if logged in
function forceDashboard() {
    if(isset($_SESSION['user_id'])) {
        // The user is allowed here but redirect anyways
        header("Location: /php_login_system/dashboard.php"); exit;
    } else {
        // The user is not allowed here
    } 
}       

?>
