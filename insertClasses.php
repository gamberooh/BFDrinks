<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Insert Classes';
$css = './styles/myStyle.css';
$classebody = "insert";
stampa_head($titolo, $css, $classebody);
session_start();

if (check_login(isAdmin())){
    echo '<div class="home"><form id="form2" method="post" action="../cercaClassi.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Nome Classe </span><input type='text' name='Classe' size='5'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Aula </span><input type='text' name='Aula' size='7'>"
            . "        </div>"
            . "    </div>"
            . "</div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Numero alunni </span><input type='number' name='NAlunni' size='40'>"
            . "        </div>"
            . "    </div>"
            . "<div class='button'>"
            . "    <input type='submit' value='Invio'>"
            . "    <input type='reset' value='Reset'>"
            . "</div>"
        . '</form></center>';
    
    
    
} else {
    echo '<center><header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Non hai i permessi per accedere a questo file</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header></center>';
}

stampa_finehtml();
    
