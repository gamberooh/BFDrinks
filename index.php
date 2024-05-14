<?php
session_start();
include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css;';
$script = './scripts/controlloErrori.js';

stampa_head($titolo, $css);
include_script($script);

if (isAccessValid()) {
    ?>
    <header>
        <div class=".container-home">
            <div class="header">
                <h1>BF Drinks</h1>
            </div>
        </div>
    </header>

    <div class="topnav">
        <ul>
            <li><a href="./pages/chi_siamo.html">ABOUT US</a></li>
                <li><a href="./pages/catalogo_prodotti.php">CATALOGUE</a></li>
                
        <form id="form1" method="post" action="cercaProdotti.php">
                <li>
                    <select name="Gusto" value="Gusto">
                        <option value="">Flavours</option>
                        <?php
                            //RICERCA PER GUSTO FUNZIONANTE
                            $sql = "SELECT Gusto FROM Prodotto;";
                            $prodotti = esegui_query($sql);
                            for ($i = 0; $i < count($prodotti); $i++) {
                                $val = $prodotti[$i]['Gusto'];
                                echo "<option value=\"$val\">$val</option>";
                            }
                        ?>
                    </select>
                </li>
                <li>
                    <select name=\'collab\' value=\'Scegli collaborazione\'>
                        <option value="">Collaboration</option>
                    <option value="NULL">None</option> 
                    <?php
                        $sql = "SELECT Nome FROM AZIENDA";
                        $prodotti = esegui_query($sql);

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
        </div>

        <div clas="cart">

        </div>

        <div class='profile-picture'>

        </div>

        <div class="annoucement"></div>
        <div class="annoucement"></div>
        <div class="annoucement"></div>


        <div class="button">
        <input type="submit" value="Invio">
        <input type="reset" value="Reset">
        </div>
    </form> 
    

    <footer>
    <div id="banner">
    <div class="scrolling-text">
    Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!
    </div>
    </div>
    </footer>
<?php
} else {
    echo "<h1 class='header'>Credenziali errate</h1>";
        echo '<div class="container">';
            echo '<div class="link">';
                torna_login();
            echo '</div>';
    echo '</div>';
}

stampa_finehtml();
