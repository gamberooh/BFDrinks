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
                    <img src="./images/img-founders/riccardo-marchesini.jpg" alt="Founder 1">
                    <h3>Riccardo Marchesini</h3>
                    <p>Co-Founder & CEO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/niccolo-marchesini.jpg" alt="Founder 2">
                    <h3>Niccolò Marchesini</h3>
                    <p>Co-Founder & COO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/davide-demelas.jpg" alt="Founder 3">
                    <h3>Davide Demélas</h3>
                    <p>Co-Founder & CFO</p>
                </div>
                <div class="founder">
                    <img src="./images/img-founders/davide-gamberini.jpg" alt="Founder 4">
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
                    BFDrinks, founded in 2023 by a group of passionate individuals, has grown rapidly by offering healthier energy drink options for students. Our commitment to quality and customer satisfaction, driven by our founders' dedication, has been key to our success.
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
                <img src="./images/img-gallery/1.JPEG" alt="alt"/>
                <img src="./images/img-gallery/2.JPEG" alt="alt"/>
                
                <img src="./images/img-gallery/3.JPEG" alt="alt" style="object-position: center;"/>
                <img src="./images/img-gallery/4.JPEG" alt="alt" style="object-position: center;"/>
                <img src="./images/img-gallery/5.JPEG" alt="alt" style="object-position: center;"/>
                
                <img src="./images/img-gallery/6.JPEG" alt="alt"/>
            </div>
        </div>

        <?PHP
        $sql = "SELECT U.Telefono, U.Email, U.Nome, U.Cognome "
                . "FROM utente U "
                . "WHERE Ruolo = 'superuser'";

        $adminDB = esegui_query($sql);
        echo "
        <div class = \"info\">
            <h1>OUR CONTACTS</h1>
            <div class = \"contacts\">
                <div class=\"admin\">
                    <h1>".$adminDB[0]["Nome"]." ".$adminDB[0]["Cognome"]."</h1>
                    <div class = \"contact\">
                        <p> <span>E-MAIL: </span>".$adminDB[0]["Email"]."</p>
                        <p> <span>TELEFONO: </span>".$adminDB[0]["Telefono"]."</p>
                    </div>
                </div>
                
                <div class=\"admin\">
                    <h1>".$adminDB[1]["Nome"]." ".$adminDB[1]["Cognome"]."</h1>
                    <div class = \"contact\">
                        <p> <span>E-MAIL: </span>".$adminDB[1]["Email"]."</p>
                        <p> <span>TELEFONO: </span>".$adminDB[1]["Telefono"]."</p>
                    </div>
                </div>
                
                <div class=\"admin\">
                    <h1>".$adminDB[2]["Nome"]." ".$adminDB[2]["Cognome"]."</h1>
                    <div class = \"contact\">
                        <p> <span>E-MAIL: </span>".$adminDB[2]["Email"]."</p>
                        <p> <span>TELEFONO: </span>".$adminDB[2]["Telefono"]."</p>
                    </div>
                </div>
                
                <div class=\"admin\">
                    <h1>".$adminDB[3]["Nome"]." ".$adminDB[3]["Cognome"]."</h1>
                    <div class = \"contact\">
                        <p> <span>E-MAIL: </span>".$adminDB[3]["Email"]."</p>
                        <p> <span>TELEFONO: </span>".$adminDB[3]["Telefono"]."</p>
                    </div>
                </div>
            </div>
        </div>
        ";
        ?>
        <div class="oraganisation">
            <h1>Organizational Chart</h1>
            <img src="images/img-utility/organigramma.jpg">
        </div>

    </div>
    <?php
} else {
    torna_login();
}
stampa_finehtml();
?>