<?php

    include './include/funzioni.inc';    
    $titolo = 'Pagina di login del sito PHP';
    $css = './styles/myStyle.css';
    stampa_head($titolo, $css);
    echo "<h1 class='header'>Entra in BF Drinks</h1>";
    
    // LOG IN
    
    echo '<div class="container">';
    echo "<form method='post' action='index.php'>"
            . "<div class='element'>"
                . "<span>Username: </span><input type='text' name='Username'>"
            . "</div>"
            . "<div class='element'>"
                . "<span>Password: </span><input type='password' name='Pswd'>"
            . "</div>"
            . "<div class='button'>"
                . "<input type='submit' name='invio' value='Login'>"
            . "</div>"
        . "</form>"; 
    echo '</div>';
    
    // SIGN UP
    
    echo "<div class='container'>"
        . "<form method='post' action='signup.php'>"
            . "<div class='button'>"
                . "<input type='submit' name='invio' value='Signup'>"
            . "</div>"
        . "</form>"
    . "</div>";
    
    stampa_finehtml();
    
    



