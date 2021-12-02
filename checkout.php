<?php
/**
 * Author: Anant Batgali
 * Date: 12/1/21
 * File: checkout.php
 * Description:
 */

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (!isset($_SESSION['login'])) {
header("Location: loginform.php");
exit();
}
//empty the shopping cart
$_SESSION['order'] = array();
//set page title
$page_title = 'checkout';
//display the header
require_once ('includes/header.php');
?>
    <div id="message">
        <h2>Confirmation</h2>
        <h3>Order Placed</h3>
        <img src="https://img.icons8.com/ios-filled/100/000000/clock--v2.gif"/>
        <h3>Will be ready in 20 minutes.</h3>
    </div>
<?php
include ('includes/footer.php');
?>