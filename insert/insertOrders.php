<?php

include '../include/funzioni.inc';
include '../include/connection.php';

$titolo = 'Insert Orders';
$css = '../styles/myStyle.css';
stampa_head($titolo, $css);
session_start();

if (isAdmin()) {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header">';
                echo '<h1>Insert Orders</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
    
    echo '<div class="topnav">'
        . '<ul>'
            . '<li><a href="../index.php">Home Page</a></li>'
            . '<li><a href="./insertClasses.php">Insert Classes</a></li>'
            . '<li><a href="./insertCompanies.php">Insert Companies</a></li>'
            . '<li><a href="./insertProducts.php">Insert Products</a></li>'
        . '</ul>'
    . '</div>';
    
    echo '<form id="form4" method="post" action="../cercaOrdini.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Id </span><input type='number' name='Id' size='6'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Quantità </span><input type='number' name='qta' size='4'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Data Ordine </span><input type='text' name='data' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Indice Prodotto </span><input type='number' name='indProdotto' size='6'>"
            . "        </div>"
            . "    </div>"
            . "</div>"
            . '<div class ="container">'
            
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Anno Classe </span><input type='number' name='Anno' size='1'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Sezione Classe </span><input type='text' name='Sez' size='1'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Acronimo Classe </span><input type='text' name='Acr' size='4'>"
            . "        </div>"
            . "    </div>"
            . '</div>'
            . "<div class='button'>"
            . "    <input type='submit' value='Invio'>"
            . "    <input type='reset' value='Reset'>"
            . "</div>"
        . '</form>';
    
    
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Non hai i permessi per accedere a questo file</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}
    
stampa_finehtml();