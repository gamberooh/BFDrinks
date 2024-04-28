<?php

include '../include/funzioni.inc';
include '../include/connection.php';

$titolo = 'Insert Comapnies';
$css = '../styles/myStyle.css';
stampa_head($titolo, $css);
session_start();
if (isAdmin()) {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header">';
                echo '<h1>Insert Companies</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
    echo '<div class="topnav">'
        . '<ul>'
            . '<li><a href="../index.php">Home Page</a></li>'
            . '<li><a href="./insertClasses.php">Insert Classes</a></li>'
            . '<li><a href="./insertOrders.php">Insert Orders</a></li>'
            . '<li><a href="./insertProducts.php">Insert Products</a></li>'
        . '</ul>'
    . '</div>';
    
    echo '<form id="form3" method="post" action="../cercaAzienda.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>ID </span><input type='text' name='Id' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Nome </span><input type='text' name='Nome' size='40'>"
            . "        </div>"
            . "    </div>"
            . "</div>"
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Numero di Telefono </span><input type='text' name='NTel' size='40'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>eMail </span><input type='text' name='eMail' size='50'>"
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

            
            
            
            
          
    
