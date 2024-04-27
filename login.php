<?php

    include './include/funzioni.inc';    
    $titolo = 'Pagina di login del sito PHP';
    $css = './styles/myStyle.css';
    stampa_head($titolo, $css);
    echo "<h1 class='header'>Entra in BF Drinks</h1>";
    echo '<div class="container">';
    echo "<form method='post' action='index.php'>"
            . "<div class='element'>"
                . "<span>Username: </span><input type='text' name='username'>"
            . "</div>"
            . "<div class='element'>"
                . "<span>Password: </span><input type='password' name='password'>"
            . "</div>"
            . "<div class='button'>"
                . "<input type='submit' name='invio' value='Login'>"
            . "</div>"
        . "</form>";
    echo '</div>';
    stampa_finehtml();
    
    



