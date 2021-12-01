<?php
/**
 * Author: Anant Batgali
 * Date: 12/1/21
 * File: fortune_teller.php
 * Description: generates a random fortune
 */

// connecting to database
require 'database.php';

function tellFortune($conn)
{
    // generating a random no. within range of ids present in fortunes table
    $random_id = rand(1, 25);
    //constructing query
    $sql = "SELECT quote FROM fortunes WHERE id = $random_id";
    // executing query
    $query = $conn->query($sql);
    //Error handling
    if (!$query) {
        $error = "You broke the fortune teller" . $conn->error;
        $conn->close();
        header("Location: error.php?m=$error");
        exit();
    }
    // fetching fortune
    $fortune = $query->fetch_assoc();

    return $fortune['quote'];
}
