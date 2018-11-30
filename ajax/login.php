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

        // Make sure the user does not exist already.
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            // User exists
            $User = $findUser->fetch(PDO::FETCH_ASSOC);

            $user_id['user_id'] = (int) $User['user_id'];
            $hash = $User['password'];

            if(password_verif($password, $hash)){
                // user is signed in
                $return['redirect'] = '/php_login_system/dashboard.php';

                $_SESSION['user_id'] = $user_id;
            } else {
                // invalid user email/password
                $return['error'] = "Invalid user email or password";
            }

            $return['error'] = "You already have an account.";
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