<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Update Products';
$css = './styles/myStyle.css';
$classebody = "update-product";

stampa_head($titolo, $css, $classebody);
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $input = $_POST;
} else {
    $input = $_GET;
}

$sql = "SELECT * FROM prodotto WHERE Indice = $input[Indice]";
$prodottoDB = esegui_query($sql);

if (isAdmin()) {
    echo '<header>';
    echo '<div class=".container-home">';
    echo '<div class="header">';
    echo '<h1>Update Products</h1>';
    echo '</div>';
    echo '</div>';
    echo '</header>';

    $mioprodotto = $prodottoDB[0];

    echo '<form id="form5" method="post" action="aggiornamento.php">'
    . '<div class ="container">'
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Index </span><input type='number' name='Indice' value='$mioprodotto[Indice]' size='6' readonly>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Name </span><input type='text' name='Nome'  value='$mioprodotto[Nome]'>"
    . "        </div>"
    . "    </div>"
    . '    <div class="palline">'
    . '     <span class="titolo-item">Line </span>';

    if ($mioprodotto["Linea"] == "strong") {
        echo '<input type="radio" name="Linea" value="light"><label id="scelta">Light</label>'
        . '         <input type="radio" name="Linea" value="strong" checked><label id="scelta">Strong</label>';
    } else {
        echo '<input type="radio" name="Linea" value="light" checked><label  id="scelta">Light</label>'
        . '         <input type="radio" name="Linea" value="strong"><label id="scelta">Strong</label>';
    }

    echo ' </div>'
    . "</div>"
    . '<div class ="container">'
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Mixture </span><input type='text' name='Miscela' value='$mioprodotto[Miscela]'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Calories </span><input type='number' name='Calorie' value='$mioprodotto[Calorie]'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Flavour </span><input type='text' name='Gusto' value='$mioprodotto[Gusto]'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Price </span><input type='number' name='Prezzo' value='$mioprodotto[Prezzo]'>"
    . "        </div>"
    . "</div>"
    . "<div class='item'>"
    . "<div class='element'>
                            <span class='titolo-item'>Description </span> <textarea row='4' cols='50' name='Descrizione' value=''>$mioprodotto[Descrizione]</textarea>
                       </div>"
    . "     </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Company Id </span><input type='text' name='Azienda' value='$mioprodotto[Azienda]'>"
    . "        </div>"
    . "    </div>"
    . '</div>'
    . "<div class='button'>"
    . "    <input type='submit' value='Send'>"
    . "    <input type='reset' value='Reset'>"
    . "</div>"
    . '</form>';
    
} else {
    echo '<header>';
    echo '<div class=".container-home">';
    echo '<div class="header"Access Denied</h1>';
    echo '</div>';
    echo '</div>';
    echo '</header>';
}
torna_home_page();
stampa_finehtml();
