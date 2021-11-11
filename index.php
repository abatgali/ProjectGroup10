<?php
/*
 *Author:       James Ritter
 *Date:         11/10/2021
 *File:         index.php
 *Description:  Home page
*/
?>

<?php
$title = "Lewie's Chinese Bistro";
?>

<!DOCTYPE html>
<html lang="en">
<?php
require("includes/head.php");
?>
    <body>
    <div class="container">
        <header>
            <h1>Lewie's Chinese Bistro</h1>
        </header>
        <nav>
            <ul>
                <!--The class "current" allows for highlight in nav-->
                <li><a class="current" href="index.php">Home</a></li>
                <li><a href="listmenu.php">Menu</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
        <br>
        <div class="indexTop">
            <h2>Food is our Specialty</h2>
            <p>Our creative, elevated food and beverage program combines satisfying staples with imaginative twists.  From bossy brunches and happy hours to family dinners, special occasions, and everything in between.  Lewie's Chinese Bistro has something for everyone.</p>
            <input type="button" value="View Menu" onclick="window.location.href = 'menu.php'">
            <br><br>
            <input type="button" value="Make a Reservation">
        </div>
        <br>
        <div class="indexMid">
            <h2>Featured Items</h2>
            <div class="featureItems">
                <div class="feature1">
                    <img src="images/chow_mein.jpeg" alt="Chow Mein">
                    <p>Category Name</p>
                </div>
                <div class="feature2">
                    <img src="images/crab_rangoon.jpg" alt="Crab Rangoon">
                    <p>Category Name</p>
                </div>
                <div class="feature3">
                    <img src="images/fried_rice.jpg" alt="Fried Rice">
                    <p>Category Name</p>
                </div>
                <div class="feature4">
                    <img src="images/gen_tso.jpg" alt="General Tso's">
                    <p>Category Name</p>
                </div>
                <div class="feature5">
                    <input type="image" >
                    <p>Category Name</p>
                </div>
                <div class="feature6">
                    <input type="image">
                    <p>Category Name</p>
                </div>
            </div>
        </div>
        <div class="googleMap">
            <!--Small Map-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3066.4908700163323!2d-86.17141189863862!3d39.77353815232665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b50b610e78ef3%3A0x90380174787dce3!2sLot%2083%2C%20Indianapolis%2C%20IN%2046202!5e0!3m2!1sen!2sus!4v1636575602046!5m2!1sen!2sus" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <!--Medium Map-->
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3066.4908700163323!2d-86.17141189863862!3d39.77353815232665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b50b610e78ef3%3A0x90380174787dce3!2sLot%2083%2C%20Indianapolis%2C%20IN%2046202!5e0!3m2!1sen!2sus!4v1636575602046!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
        </div>
        <?php
        require("includes/footer.php");
        ?>
    </div>
    </body>
</html>
