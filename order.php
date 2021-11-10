<?php
/*
 *Author:       James Ritter
 *Date:         11/10/2021
 *File:         order.php
 *Description:  Ordering page
*/
?>

<?php
$title = "Order Here";
//require_once ("../website/basics/database.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require("basics/head.php");
    ?>
    <body>
        <div class="container">
            <header>
                <h1>Lewie's Chinese Bistro</h1>
            </header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <!--The class "current" allows for highlight in nav-->
                    <li><a class="current" href="order.php">Order</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
            <?php
            require("basics/footer.php");
            ?>
        </div>
    </body>
</html>