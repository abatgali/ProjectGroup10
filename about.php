<?php
/*
 *Author:       James Ritter
 *Date:         11/10/2021
 *File:         about.php
 *Description:  About us page
*/
?>

<?php
$title = "About Us";
?>

<!DOCTYPE html>
<html lang="en">
    <?php
    require("includes/header.php");
    ?>
    <body>
        <div class="container">
            <div class="aboutTop">
                <h2>About Us</h2>
                <p>Been in business for over 10 years and...</p>
            </div>
            <br>
            <div class="aboutMid">
                <article>
                    <h3>Our Mission</h3>
                    <p>Insert some fancy wording here that represents our mission.</p>
                </article>
                <aside>
                    <div class="aboutMidPic1">
                        <img src="" alt="Place image here">
                    </div>
                    <div class="aboutMidPic2">
                        <img src="" alt="Place image here">
                    </div>
                    <div class="aboutMidPic3">
                        <img src="" alt="Place image here">
                    </div>
                </aside>
            </div>
            <br>
            <div class="aboutBottom">
                <h2>Meet Our Leaders</h2>
                <p>Insert some fancy words here or something.</p>
                <div class="leaderPhoto">
                    <div class="leader1">
                        <img src="" alt="Leader photo">
                        <p>James Ritter</p>
                    </div>
                    <div class="leader2">
                        <img src="" alt="Leader photo">
                        <p>Isaac Lowe</p>
                    </div>
                    <div class="leader3">
                        <img src="" alt="Leader photo">
                        <p>Anant Batgali</p>
                    </div>
                    <div class="leader4">
                        <img src="" alt="Leader photo">
                        <p>Alex Weber</p>
                    </div>
                </div>
            </div>
            <?php
            require("includes/footer.php");
            ?>
        </div>
    </body>
</html>
