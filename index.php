<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
$script = './scripts/controlloErrori.js';

session_start();

stampa_head($titolo, $css);
include_script($script);

if (isAccessValid()) {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header">';
                echo '<h1>BF Drinks</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';

    echo '<div class="topnav">';
        echo '<ul>';
            echo '<li><a href="./pages/chi_siamo.html">ABOUT US</a></li>';
            echo '<li><a href="./pages/catalogo_prodotti.php">PRODUCT CATALOGUE</a></li>';
        echo '</ul>';
    echo '</div>';
    

    echo "
       <div class ='profile-picture'>
       
        </div>
     ";


    echo '<form id="form1" method="post" action="cercaProdotti.php">';

    echo '<div class="container">';
        echo '<div class="item">';
            echo '<div class="element">';
            echo '<span class="titolo-item">Beverage Name </span><input type="text" name="Nome" size="40">';
            echo '</div>';
            echo '<div class="element">';
            echo '<span class="titolo-item">Line </span>';
            echo '<input type="radio" name="Linea" value="light"><label>Light</label>';
            echo '<input type="radio" name="Linea" value="strong"><label>Strong</label>';
            echo '</div>';
            echo '<div class="element">';
/*            
            echo '<span class="titolo-item">Gusti </span>';
    echo '<select name=\'Gusto\' value=\'Scegli gusto\'>';
    echo '<option value="">Scegli gusto</option>';

    $sql = "SELECT Gusto FROM PRODOTTO";
    $miscele = esegui_query($sql);
    for ($i = 0; $i < count($miscele); $i++) {
        $val = $miscele[$i]['Miscela'];
        echo "<option value=\"$val\">$val</option>";
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
    echo '<div class="item">';
    echo '<div class="element">';
*/    
    echo '</div>';
    echo '<div class="element">';
    echo '<span class="titolo-item">Calories </span>';
    echo '<input type="number" id="calorie" name="calorie" oninput="controllaNumero()">';
    echo '</div>';
    echo '<div class="element">';
    echo '<span class="titolo-item">Collaborations </span>';
        echo '<select name=\'collab\' value=\'Scegli collaborazione\'>';
            echo '<option value="">Choose collaboration</option>';
        echo '<option value="NULL">None</option>'; //aggiunta opzione per i prod senza collab
    $sql = "SELECT Nome FROM AZIENDA";
    $aziende = esegui_query($sql);
    
    for ($i = 0; $i < count($aziende); $i++) {
        $val = $aziende[$i]['Nome'];
        echo "<option value=\"$val\">$val</option>";
    }
    
    echo '?>';
    echo '</select>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="button">';
    echo '<input type="submit" value="Invio">';
    echo '<input type="reset" value="Reset">';
    echo '</div>';
    echo '</form>'; 
    

    echo '<footer>';
    echo '<div id="banner">';
    echo '<div class="scrolling-text">';
    echo 'Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!';
    echo '</div>';
    echo '</div>';
    echo '</footer>';

} else {
    echo "<h1 class='header'>Credenziali errate</h1>";
    echo '<div class="container">';
    echo '<div class="link">';
    torna_login();
    echo '</div>';
    echo '</div>';
}

stampa_finehtml();
