<?php

session_start();
print_r($_SESSION);
include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css;';
$script = './scripts/controlloErrori.js';

stampa_head($titolo, $css);
include_script($script);

if (!empty($_SESSION)) {
    if ($_SESSION["logged"] == true) {
        //navbar
    } else {
        echo "
            <div>
                <h1>NON HAI EFFETTUATO L'ACCESSO</h1>  
                <a href=\"login.php\"> VAI AL LOG-IN </a>
            </div>
            ";
    }
} else {
    echo "
            <div>
                <h1>NON HAI EFFETTUATO L'ACCESSO</h1>  
                <a href=\"login.php\"> VAI AL LOG-IN </a>
            </div>
            ";
}
stampa_finehtml();

/* 
DA AGGIUNGERE A FUNZIONI
<div class="topnav">
            <form id="form1" method="post" action="cercaProdotti.php">
                <ul>
                    <li><a href="./pages/chi_siamo.html">ABOUT US</a></li>
                    <li><a href="./pages/catalogo_prodotti.php">CATALOGUE</a></li>


                    <li>
                        <select name="Gusto" value="Gusto">
                            <option value="">Flavours</option>
                            <?php
                            //RICERCA PER GUSTO FUNZIONANTE
                            $sql_gusto = "SELECT Gusto FROM prodotto;";
                            $prodotti = esegui_query($sql_gusto);
                            for ($i = 0; $i < count($prodotti); $i++) {
                                $val = $prodotti[$i]['Gusto'];
                                echo "<option value=\"$val\">$val</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                        <select name='Azienda' value='Scegli collaborazione'>
                            <option value="">Collaboration</option>
                            <option value="NULL">None</option> 
                            <?php
                            $sql_azienda = "SELECT Nome FROM azienda;";
                            $prodotti = esegui_query($sql_azienda);

                            for ($i = 0; $i < count($prodotti); $i++) {
                                $val = $prodotti[$i]['Nome'];
                                echo "<option value=\"$val\">$val</option>";
                            }
                            ?> 
                        </select>
                    </li>
                    <li>
                        <select name="Linea" value="Linea">
                            <option value="">Line</option>
                            <option value="Light">Light</option>
                            <option value="Strong">Strong</option>
                        </select>
                    </li> 
                </ul>
                <div class="button">
                    <input type="submit" value="Search">
                </div>
            </form>



        </div>

        <div clas="cart">

        </div>

        <div class='profile-picture'>

        </div>

        <div class="annoucement"></div>
        <div class="annoucement"></div>
        <div class="annoucement"></div>

        <footer>
            <div id="banner">
                <div class="scrolling-text">
                    Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!
                </div>
            </div>
        </footer> 
*/