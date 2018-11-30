<?php 

    // If there is no constant defined called __CONFIG__ do not load this file
    if(!defined('__CONFIG__')) {
        exit('You do not have a fonfig file');
    }

    // Our config is below

    // Include the DB.php file.
    include_once "classes/DB.php";
    include_once "classes/filter.php";

    $con = DB::getConnection();

?>