<?php 

    // Allow the config
    define('__CONFIG__', true);

    // Require the config
    require_once "../inc/config.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Return data in json format
        header('Content-Type: application/json');

        $return = [];
        
        $email = Filter::String( $_POST['email'] );


        // Make sure the user does not exist already.
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindPeram(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            // User exists
            // We can also check to see if they are able to log in.
            $return['error'] = "You already have an account.";
        } else{
            // User does not exist.  Adding them now.

            $password = password_Hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;

            $return['redirect'] = '/dashboard.php?message=welcome';

        }

        $return['name'] = "Bryan Lian";

        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        // kill script.  So somthing else.
        exit('Invalid URL');
    }
?>