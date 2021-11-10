<?php
/**
 * Author: Anant Batgali, Alex Weber
 * Date: 11/4/21
 * File: random.php
 * Description: Trying to run a SELECT statement to get information out of the phpmyadmin database
 */

require_once('database.php');
//mock file to try to run the database statement

$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
//attempting to execute a SELECT statement
//something isn't write in this statement could be identification or something like that.
$sql = "SELECT * 
FROM $tblCategoriess, $tblMenu_items
WHERE categoriess.category_id = menu_items.category_id
AND id = $id";

//attempting to execute the query
$query = $conn->query($sql);

//attempting to handle errors
if(!$query){
    $error = "Selection Failed: ". $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    exit();
}

$row = $query->fetch_assoc();
?>
<h2>Okay we can design this on thursday or something</h2>
<!-- This could be our label-->
<div>
    <div>Product name: </div>
    <div>Category ID: </div>
</div>
<!--This could be the content-->
<div>
    <!--For this test im going to try to display menu items and category id thingy-->
    <div><?= $row['Product_name']?></div>
    <div><?= $row['category_id']?></div>
</div>


