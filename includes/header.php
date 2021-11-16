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
        <nav>
            <ul id = "left_items">
                <li><a href="index.php">Home</a></li>
                <li><a href="listmenu.php">Menu</a></li>
                <li><a href="order.php">Order</a></li>
            </ul>
                <h1 id = "header">Lewie's Chinese Bistro</h1>
            <ul id = "right_items">
                <li><a href="">Login</a></li>
                <li><a href="">Cart</a></li>
            </ul>
        </nav>
