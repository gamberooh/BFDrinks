<?php

include '../include/funzioni.inc';
include '../include/connection.php';

$titolo = 'Insert Classes';
$css = '../styles/myStyle.css';

stampa_head($titolo, $css);
session_start();

if (isAdmin()) {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header">';
                echo '<h1>Insert Classes</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
    echo '<div class="topnav">'
        . '<ul>'
            . '<li><a href="../index.php">Home Page</a></li>'
            . '<li><a href="./insertCompanies.php">Insert Companies</a></li>'
            . '<li><a href="./insertOrders.php">Insert Orders</a></li>'
            . '<li><a href="./insertProducts.php">Insert Products</a></li>'
        . '</ul>'
    . '</div>';
    
    
    echo '<form id="form2" method="post" action="../cercaClassi.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Anno </span><input type='number' name='Anno' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Sezione </span><input type='text' name='Sez' size='40'>"
            . "        </div>"
            . "    </div>"
            . "</div>"
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Acronimo </span><input type='text' name='Acr' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Numero alunni </span><input type='number' name='NAlunni' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Aula </span><input type='number' name='Aula' size='40'>"
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
    
