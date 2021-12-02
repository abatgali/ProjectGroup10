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
<div class="aboutMid">
    <h1>Checkout</h1>
    <h2>Thank you for placing an online order with Louie's, we'll notify you via email as soon as your food is ready for pickup!</h2>
</div>
<?php
include ('includes/footer.php');
?>