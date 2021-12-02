<?php
/**
 * Author: Isaac Lowe
 * Date: 11/30/2021
 * File: library.php
 * Description:
 */

//this function returns true for admins and false otherwise
function is_admin() {
    //start session if it has not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //determine user's role
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    }
    //return true only if the user is an administrator
    return ($role == 1) ? true : false;
}
