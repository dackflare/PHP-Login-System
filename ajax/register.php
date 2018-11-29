<?php 

    // Allow the config
    define('__CONFIG__', true);

    // Require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Return data in json format
        header('Content-Type: application/json');

        $array = [];
        
        // Make sure the user does not exist already.

        // Make sure the user CAN be added and IS added.

        // Return the proper info to JavaScript to redirect us.

        $return['redirect'] = '/php_login_system/index.php?this-was-a-redirect';

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        // kill script.  So somthing else.
        exit('test');
    }
?>