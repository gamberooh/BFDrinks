<?php
    
    session_start();
    include './include/funzioni.inc';    
    $titolo = 'Pagina di login del sito PHP';
    $css = './styles/myStyle.css';
    stampa_head($titolo, $css);
    if ($_SESSION['logged_in']) {
        echo "<h1 class='header'>$_SESSION[Nome] $_SESSION[Cognome] profile page</h1>";
        echo "<div>"
                . "<img sr"
            . "</div>";
    
    }
    
    
    
    
    torna_home_page();
    
    
