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
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="../ProjectGroup10/css/main.css">

    </head>
    <body>
    <div class="container">
        <nav>
            <ul id = "left_items">
                <li><a href="index.php">Home</a></li>
                <li><a href="listmenu.php">Menu</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
                <h1 id = "header">Lewie's Chinese Bistro</h1>
            <ul id = "right_items">
                <?php
                if(empty($login)){
                    echo "<a href='loginform.php'>Login</a>";
                }
                else{
                    echo "<a href='logout.php'>Logout</a>";
                    echo "<span style='color:red; margin-right: 30px'Welcome $username!</span>";
                }

                ?>
                <li><input alt="cart" id="cart-image" onclick="window.location.href='cart.php'"
                           src="../images/cart.png" type="image"></li>
            </ul>
        </nav>
