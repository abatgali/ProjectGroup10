<?php
/**
 * Author: James Ritter
 * Date: $(DATE)
 * File: $(FILE_NAME)
 * Description: displays the menu items to user
 **/

$title = "Order Now";
require_once("includes/header.php");
require_once("includes/database.php");

// begin session if it doesn't exist already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// tell user cart is empty if no items selected
if (!isset($_SESSION['order']) || !$_SESSION['order']) {
    echo "<br><div class='emptyCart'><h1>Cart</h1><br>
        <img id=\"empty_img\" src='images/empty.png' alt='nothing in cart'><br><br><br><p>Looks empty in here, try picking items from the menu first.</p>";
    ?>
    <input id="return" type="button" value="Return to Menu" onclick="window.location.href = 'listmenu.php'">
    <?php
    echo "</div>";
    require_once 'includes/footer.php';
    exit();

}

// if items present, proceed
$order = $_SESSION['order'];

?>

    <div class="menuItems">
        <h2>My Order</h2>
        <div class="row header">
            <div class="col1" style="text-decoration: underline">Product</div>
            <div class="col2" style="text-decoration: underline">Price</div>
            <div class="col3" style="text-decoration: underline">Quantity</div>
            <div class="col4" style="text-decoration: underline">Subtotal</div>
            <div class="col4" style="text-decoration: underline">Remove</div>
        </div>

        <?php
        // display order
        $sql = "SELECT Item_id, Product_name, Price 
        FROM menu_items 
        WHERE 0";

        foreach (array_keys($order) as $id) {
            $sql .= " OR Item_id=$id";
        }

        // execute the query
        $results = $conn->query($sql);


        // variable to calculate total amount
        $total = 0;

        // fetch order items
        while ($row = $results->fetch_assoc()) {
            $id = $row['Item_id'];
            $item = $row['Product_name'];
            $price = $row['Price'];
            $qty = $order[$id];
            $subtotal = $qty * $price;
            $total += $subtotal;
            ?>
            <div class="row">
                <div class="col1"><a href="itemDetails.php?id=<?= $id ?>"><?= $item ?></a></div>
                <div class="col2">$<?= $price ?></div>
                <div class="col3">
                        <a href="increaseQuant.php?id=<?= $row['Item_id'] ?>">+ &nbsp;&nbsp;&nbsp;<a/>
                        <?= $qty ?>
                        <a href="decreaseQuant.php?id=<?= $row['Item_id'] ?>">&nbsp;&nbsp;&nbsp; -<a/>
                </div>
                <div class="col4">$<?php printf("%.2f", $subtotal); ?></div>
                <div class="col5"><a style="color:red" href="removeFromCart.php?id=<?= $row['Item_id'] ?>">Remove</a>
                </div>
            </div>
            <?php
            // closing the while loop
        }
        if ($qty == 0) {
            unset($order[$id]);
        }

        $tax = 0.07 * $total;
        $total = $total + $tax;

        ?>
        <div class="total">
            <h4>Taxes (7%) = <?php printf("$%.2f", $tax); ?></h4>
            <h3>Total = <?php printf("$%.2f", $total); ?></h3>
        </div>
        <div class="choices">
            <input type="button" value="Clear Cart" id="clear" onclick="window.location.href = 'clearcart.php'">
            <input type="button" value="Return to Menu" onclick="window.location.href = 'listmenu.php'">
            <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'">
        </div>
    </div>
    =
<?php

include 'includes/footer.php';
