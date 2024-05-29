<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Insert Comapnies';
$css = './styles/myStyle.css';
$classebody = "insert";
stampa_head($titolo, $css, $classebody);
session_start();
if (check_login(isAdmin())) {


    echo '<div class="home"><form id="form3" method="post" action="cercaAzienda.php">'
    . '<div class ="container">'
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>ID </span><input type='text' name='Id' size='10'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Name </span><input type='text' name='Nome' size='50'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Address </span><input type='text' name='Nome' size='100'>"
    . "        </div>"
    . "    </div>"
    . "</div>"
    . '<div class ="container">'
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Telephone </span><input type='text' name='Telefono' size='15'>"
    . "        </div>"
    . "    </div>"
    . "    <div class='item'>"
    . "        <div class='element'>"
    . "            <span class='titolo-item'>Email </span><input type='text' name='Email' size='100'>"
    . "        </div>"
    . "    </div>"
    . '</div>'
    . "<div class='button'>"
    . "    <input type='submit' value='Send'>"
    . "    <input type='reset' value='Reset'>"
    . "</div>"
    . '</form></div>';
} else {
    echo '<header>';
    echo '<div class=".container-home">';
    echo '<div class="header">ACCESS DENIED</h1>';
    echo '</div>';
    echo '</div>';
    echo '</header>';
}

stampa_finehtml();
