<?php
/*
 *Author: James Ritter
 *Date: 11/10/2021
 *File: header.php
 *Description:
 */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="stylesheet" href="../ProjectGroup10/css/main.css">
    </head>
    <body>
    <div class="container">
        <header>
            <h1>Lewie's Chinese Bistro</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <!--The class "current" allows for highlight in nav-->
                <li><a class="current" href="listmenu.php">Menu</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
</html>