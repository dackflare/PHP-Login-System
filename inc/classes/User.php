<?php

// If there is no constant defined called __CONFIG__, do not load this file
if(!defined('__CONFIG__')) {
    exit('You do not have a config file.');
}    

class User {

    private $con;

    public $user_id;
    public $email;
    public $reg_time;

    public function __construct($user_id) {
        $this->con = DB::getConnection();

        $user_id = Filter::Int( $user_id );

        $user = $this->con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
        $user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $user->execute();

        if($user->rowCount() == 1) {
            $user = $user->fetch(PDO::FETCH_OBJ);

            $this->email        = (string) $user->email;
            $this->user_id      = (int) $user->user_id;
            $this->reg_time     = (string) $user->reg_time;

        } else {
            // no user
            // redirect to logout
            header("Location: /php_login_system/logout.php"); exit;
        }
    }

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
