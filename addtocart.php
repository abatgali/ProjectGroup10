<?php
/**
 * Author: Anant Batgali
 * Date: 12/1/21
 * File: addtocart.php
 * Description: adds one item at a time to the cart and redirects the user to it
 */

// begin session if it doesn't exist already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// redirect to the showcart.php page
header('Location: cart.php');