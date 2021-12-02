<?php
/*
 *Author: James Ritter
 *Date: 11/10/2021
 *File: header.php
 *Description:
 */

//Start a new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//Create Three variables for login, username and role
$login = '';
$name = '';
$role = 0;
//if the use has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND
    isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="../ProjectGroup10/css/main.css">
        <!--  Attaching google fonts      -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <nav>
            <ul id = "left_items">
                <li><a href="index.php">Home</a></li>
                <li><a href="listmenu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                //display the following buttons only if the user's role is 1.
                if ($role == 1) {
                    ?>
                    <li><a href="addItem.php">AddItem</a></li>
                    <?php
                }
                ?>
            </ul>
            <h1 id = "header">Lewie's Chinese Bistro</h1>
            <ul id = "right_items">
                <li>
                    <input alt="cart" id="cart-image" onclick="window.location.href='cart.php'"
                           src="images/icon-cart.png" type="image">
                <?php
                // calculating total no. of items in the order
                if (isset($_SESSION['order'])) {
                    $order = $_SESSION['order'];
                    $count = 0;
                    foreach (array_keys($order) as $id) {
                        $count += $order[$id];
                    }
                ?>
                    <div id="cartItemCounter">
                        <?= $count; ?>
                    </div>
                <?php
                // closing if statement
                }
                ?>
                </li>
                <li>
                   <a href='loginform.php'><img src='images/user_icon.png' alt='Login'></a>
                </li>
            </ul>
        </nav>
