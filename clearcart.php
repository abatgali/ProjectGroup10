<?php
/**
 * Author: Anant Batgali
 * Date: 12/1/21
 * File: clearcart.php
 * Description:
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['order'])) {
    unset($_SESSION["order"]);
}

header("location: cart.php");
