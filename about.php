<?php
/*
 *Author:       James Ritter
 *Date:         11/10/2021
 *File:         about.php
 *Description:  About us page
*/

$title = "About Us";

require("includes/header.php");
?>

            <div class="aboutTop">
                <h2>About Us</h2>
                <p>Been in business for over 10 years and...</p>
            </div>
            <br>
            <div class="aboutMid">
                <article>
                    <h2>Our Mission</h2>
                    <h3>Here at Louie's, we are dedicated to an authentic recreation of the chinese cuisine. Every day at Louie's we dedicate ourselves to maximizing</h3>
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
                    <div class="leader">
                        <img class="leaderPictures" src="images/red%20ranger.jpg" alt="Leader photo">
                        <p>Isaac Lowe</p>
                    </div>
                    <div class="leader2">
                        <img class="leaderPictures" src="images/blue%20ranger.jpg" alt="Leader photo">
                        <p>James Ritter</p>
                    </div>
                    <div class="leader3">
                        <img class="leaderPictures" src="images/green%20ranger.jpeg " alt="Leader photo">
                        <p>Anant Batgali</p>
                    </div>
                    <div class="leader4">
                        <img class="leaderPictures" src="images/pink%20ranger.jpg" alt="Leader photo">
                        <p>Alex Weber</p>
                    </div>
                </div>
            </div>

<?php
require("includes/footer.php");
?>
