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
    
    
    $sql = 'INSERT INTO azienda (Id, Nome, NTel, eMail) VALUES '
        . '(:Id, :Nome, :NTel, :eMail)';
    for ($i = 0; $i < count($azienda); $i++) {
        $risazienda['Id']['val'] = $i + 1;
        $risazienda['Id']['tipo'] = PDO::PARAM_INT;
        $risazienda['Nome']['val'] = $azienda[$i];
        $risazienda['Nome']['tipo'] = PDO::PARAM_STR;
        $risazienda['Ntel']['val'] = $azienda[$i];
        $risazienda['Ntel']['tipo'] = PDO::PARAM_INT;
        $risazienda['eMail']['val'] = $azienda[$i];
        $risazienda['eMail']['tipo'] = PDO::PARAM_STR;
        esegui_query_con_bind($sql, $risazienda);
    }
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Non hai i permessi per accedere a questo file</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}
   
stampa_finehtml();
        
            
            
            
            
          
    
