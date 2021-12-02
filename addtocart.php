<?php
/**
 * Author: Anant Batgali
 * Date: 12/1/21
 * File: addtocart.php
 * Description: adds items to the order and redirects the user to the order page
 */

// start session if not started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//retrieving order
if (isset($_SESSION['order'])) {
    $order = $_SESSION['order'];
}
else {
    $order = array();
}

$id = '';

// using GET for id
if (filter_has_var(INPUT_GET,'id')) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
}

// checking if id is alright
if (!$id) {
    $error = "Invalid menu item selected. Cannot Proceed.";
    header("Location: error.php?m=$error");
    exit();
}

// set qty as per selection
if (array_key_exists($id, $order)) {
    $order[$id] = $order[$id] + 1;
}
else {
    $order[$id] = 1;
}

// sending changes to session variable
$_SESSION['order'] = $order;

// redirect to the showcart.php page
header('Location: cart.php');