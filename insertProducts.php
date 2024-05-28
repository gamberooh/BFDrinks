<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Insert Products';
$css = './styles/myStyle.css';
$classebody = "insert";
stampa_head($titolo, $css, $classebody);
session_start();

if (check_login(isAdmin())) {
   
    
    echo '<div class="home"><form id="form5" method="post" action="../cercaProdotti2.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Indice Prodotto </span><input type='number' name='Indice' size='6'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Nome </span><input type='text' name='Nome' size='30'>"
            . "        </div>"
            . "    </div>"
            . '    <div class="item">'
            . '     <span class="titolo-item">Linea </span>'
            . '         <input type="radio" name="Linea" value="light"><label>Light</label>'
            . '         <input type="radio" name="Linea" value="strong"><label>Strong</label>'
            . ' </div>'
            . "</div>"
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Miscela </span><input type='text' name='Miscela' size='50'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Calorie </span><input type='number' name='Calorie' size='50'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Gusto </span><input type='text' name='Gusto' size='50'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Prezzo </span><input type='number' name='Gusto' size='50'>"
            . "        </div>"
            .       "</div>"
            .       "<div class='item'>"
            .           "<div class='element'>
                            <span class='titolo-item'>Descrizione </span> <textarea row='4' cols='50' name='Gusto' size='50'></textarea>
                       </div>"
            . "     </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Id Azienda </span><input type='text' name='Azienda' size='10'>"
            . "        </div>"
            . "    </div>"
            . '</div>'
            . "<div class='button'>"
            . "    <input type='submit' value='Invio'>"
            . "    <input type='reset' value='Reset'>"
            . "</div>"
        . '</form></div>';
    
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Non hai i permessi per accedere a questo file</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}
    
stampa_finehtml();