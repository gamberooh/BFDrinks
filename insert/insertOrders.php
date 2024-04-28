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
    
    
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Non hai i permessi per accedere a questo file</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}
    
stampa_finehtml();