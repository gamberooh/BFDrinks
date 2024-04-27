<?php

include './include/funzioni.inc';
include './include/dati.inc';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
$script = './scripts/controlloErrori.js';

session_start();

stampa_head($titolo, $css);
include_script($script);

if (isAccessValid()) {
    echo "<h1 class='header'>Benvenuto in BF Drinks $_SESSION[nome] $_SESSION[cognome]!</h1>";

    echo "<header>";
    echo "    <div class='.container-home'>";
    echo "        <div class='header'>";
    echo "            <h1>BF Drinks</h1>";
    echo "        </div>";
    echo "    </div>";
    echo "</header>";

    echo '<div class="container">';
    echo '    <div class="item">';
    echo '        <div class="element">';
    echo '            <a href ="./indexEN.php"><img src="./images/en-flag.png" alt="en-flag" width="115.4" height="86.6"/></a>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';

    echo "<div class='topnav'>";
    echo "    <ul>";
    echo "        <li><a href='./pages/chi_siamo.html'>CHI SIAMO</a></li>";
    echo "        <li><a href='./pages/organigramma.html'>ORGANIGRAMMA</a></li>";
    echo "        <li><a href='./pages/catalogo_prodotti.php'>CATALOGO PRODOTTI</a></li>";
    echo "        <li><a href='https://docs.google.com/document/d/1P19mnaMvYSd0aeM-bNHawe6aXZkFh1jB5sdIKbmEBLk/edit'>DIARIO DI BORDO</a></li>";
    echo "    </ul>";
    echo "</div>";

    echo "<form id='form1' method='post' action='cercaProdotti.php'>";
    echo "<div class='container'>";

    echo "    <div class='item'>";
    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Nome bibita </span><input type='text' name='nome' size='40'>";
    echo "        </div>";

    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Linea </span>";
    echo "            <input type='radio' name='linea' value='light'><label>Light</label>";
    echo "            <input type='radio' name='linea' value='strong'><label>Strong</label>";
    echo "        </div>";

    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Liscia o gassata </span>";
    echo "            <input type='radio' name='gassata' value='Liscia'><label>Liscia</label>";
    echo "            <input type='radio' name='gassata' value='Gassata'><label>Gassata </label>";
    echo "        </div>";

    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Gusti </span>";
    echo "            <select name='gusto' value='Scegli gusto'>";
    echo "                <option value=''>Scegli gusto</option>";
    $sql = "SELECT Miscela "
            . "FROM PRODOTTO";
    $miscele = esegui_query($sql);
    for ($i = 0; $i < count($gusti); $i++) {
        echo "                $val = $miscele[$i]['Miscela']";
        echo"<option value=\"$val\">$val</option>";
    }
    echo "            </select>";
    echo "        </div>";
    echo "    </div>";

    echo "    <div class='item'>";
    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Acquistata dalla classe</span><br>";
    $sql = "SELECT CONCAT(Anno, Sez, Acr) AS Classe "
                            . "FROM CLASSE";
                    $classi = esegui_query($sql);

                    for ($i=0; $i<count($classi); $i++) {
                        $val = $classi[$i]['Classe'];
                        echo "<input type=\"checkbox\" name=\"classe\" value=\"$val\"><span> $val </span>";
                    }
    echo "        </div>";

    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Calorie </span>";
    echo "            <input type='number' id='calorie' name='calorie' oninput='controllaNumero()'>";
    echo "        </div>";

    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Collaborazioni </span>";
    echo "            <select name='collab' value='Scegli collaborazione'>";
    echo "                <option value=''>Scegli collaborazione</option>";
    echo "                <option value='#N/D'>Nessuna</option>"; // Aggiunta opzione per i prod senza collaborazioni
    echo "<option value=\"\">Scegli collaborazione</option>";
                    echo "<option value=\"\">Nessuna</option>"; //aggiunta opzione per i prod senza collab
                    $sql = "SELECT Nome "
                            . "FROM AZIENDA";
                    $aziende = esegui_query($sql);

                    for ($i=0; $i<count($aziende); $i++) {
                        $val = $aziende[$i]['Nome'];
                        echo"<option value=\"$val\">$val</option>";
                    }
    echo "            </select>";
    echo "        </div>";
    echo "    </div>";

    echo "</div>";
    echo "<div class='button'>";
    echo "    <input type='submit' value='Invio'>";
    echo "    <input type='reset' value='Reset'>";
    echo "</div>";
    echo "</form>";
    echo "<br>";

    echo "<footer>";
    echo "    <div id='banner'>";
    echo "        <div class='scrolling-text'>";
    echo "            Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!";
    echo "        </div>";
    echo "    </div>";
    echo "</footer>";
} else {
    echo "<h1 class='header'>Credenziali errate</h1>";
    echo '<div class="container">';
    echo '<div class="link">';
    torna_login();
    echo '</div>';
    echo '</div>';
}

stampa_finehtml();
?>
>>>>>>> Stashed changes
