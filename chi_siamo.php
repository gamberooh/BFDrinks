<?php
session_start();
include "./include/funzioni.inc";
include "./include/connection.php";
$title = "ABOUT US";
$css = "./styles/myStyle.css";
$classebody = "about-us";
stampa_head($title, $css, $classebody);

if (check_login(isAdmin())) {
    ?>
    <div class="container">
        <div class="founders">
            <h2>Meet Our Founders</h2>
            <div class="single-founders">
                <div class="founder">
                    <img src="./images/img-founders/ricky.jpg" alt="Founder 1">
                    <h3>Riccardo Marchesini</h3>
                    <p>Co-Founder & CEO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/nicco.jpg" alt="Founder 2">
                    <h3>Niccolò Marchesini</h3>
                    <p>Co-Founder & COO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/deme.png" alt="Founder 3">
                    <h3>Davide Demélas</h3>
                    <p>Co-Founder & CFO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/gambero.jpg" alt="Founder 4">
                    <h3>Davide Gamberini</h3>
                    <p>Co-Founder & CMO</p>
                </div>
            </div>
        </div>

        <div class="messages">
            <div>
                <h2>Our Mission</h2>
                <p>
                    At BFDrinks, our mission is to provide healthy and energizing drinks to students, helping them stay focused and energized throughout their school day. We believe in promoting a balanced lifestyle with products that are both delicious and beneficial.
                </p>
            </div>
            <div>
                <h2>Our Vision</h2>
                <p>
                    Our vision is to become the leading provider of energy drinks in schools across the country. We aim to innovate continuously, ensuring our drinks are made with the highest quality ingredients and tailored to meet the needs of young consumers.
                </p>
            </div>
            <div>
                <h2>Our History</h2>
                <p>
                    BFDrinks was founded in 2023 by a group of passionate individuals who saw the need for healthier energy drink options for students. Since then, we have grown rapidly, thanks to our commitment to quality and customer satisfaction. Our founders' dedication has been the driving force behind our success.
                </p>
            </div>
        </div>

        <div class="maps">
            <h2>WHERE YOU CAN FIND US</h2>
            <img src="./images/img-utility/maps.png" alt="alt" class="maps-image"/>
        </div>

        <div class="foto">
            <h1>OUR GALLERY</h1>
            <div class="gallery">
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
                <img src="./images/img-gallery/bimbo.jpg" alt="alt"/>
            </div>
        </div>
        
        <div class="info">
            <h1>OUR CONTACTS</h1>
            <div class="contacts"> 
                <div><!-- RICKY --></div>
                <div><!-- NICCO --></div>
                <div><!-- DEME --></div>
                <div><!-- GAMBERO --></div>
            </div>
        </div>
    </div>
    <?php
} else {
    torna_login();
}
stampa_finehtml();
?>