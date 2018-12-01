<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file.');
}    

class User {


    public static function find($email, $return_assoc = false) {
        
        $con = DB::getConnection();

        // Make sure the user does not exist already.
        $email = (string) Filter::String( $email );

        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();
        
        if($return_assoc) {
            return $findUser->fetch(PDO::FETCH_ASSOC);
        }

        $user_found = (boolean) $findUser->rowCount();
        return $user_found;
    }

}
?>
