<?php 

    session_start();

    // Allow the config
    define('__CONFIG__', true);

    // Require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Return data in json format
        //header('Content-Type: application/json');

        $return = [];
        
        $email = Filter::String( $_POST['email'] );
        $password = $_POST['password'];

        $user_found = User::find($email, true);

        if($user_found) {
            // User exists
            $user_id = (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];

            if(password_verify($password, $hash)){
                // user is signed in
                $return['redirect'] = '/php_login_system/dashboard.php';

                $_SESSION['user_id'] = $user_id;
            } else {
                // invalid user email/password
                $return['error'] = "Invalid user email or password";
            }

        } else{
            // they need to create a new acount
            $return['error'] = "You do not have an account. <a href='/php_login_system/register.php'>Create one now?</a>";
        }

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        // kill script.  So somthing else.
        exit('Invalid URL');
    }
?>