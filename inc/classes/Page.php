<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file.');
}    

class Page {
    
    // force the user to be logged in or redirect them
   static function forceLogin() {
        if(isset($_SESSION['user_id'])) {
            // The user is allowed here
        } else {
            // The user is not allowed here
            header("Location: /php_login_system/login.php"); exit;
        } 
    }       

    // skip the login page if logged in
    static function forceDashboard() {
        if(isset($_SESSION['user_id'])) {
            // The user is allowed here but redirect anyways
            header("Location: /php_login_system/dashboard.php"); exit;
        } else {
            // The user is not allowed here
        } 
    }       
}

?>
