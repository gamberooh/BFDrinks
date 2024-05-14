<?php


    include './include/funzioni.inc';    
    $titolo = 'Pagina di login del sito PHP';
    $css = './styles/myStyle.css';
    stampa_head($titolo, $css);
    echo "<h1 class='header'>Entra in BF Drinks</h1>";

// Username Pswd Email Nome Cognome Telefono Classe (Ruolo)

echo '<div class="container">';
    echo "<form method='post' action='registrazione.php'>"
            . "<div class='item'>"
                . "<div class='element'>"
                    . "<span>Name: </span><input type='text' name='Nome'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Surname: </span><input type='text' name='Cognome'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Username: </span><input type='text' name='Username'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Password: </span><input type='password' name='Pswd'>"
                . "</div>"
                
            . "</div"
            . "<div class='item'>"
                . "<div class='element'>"
                    . "<span>Email: </span><input type='mail' name='Email'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Telefono: </span><input type='number' name='Telefono'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Classe: </span><input type='mail' name='Classe'>"
                . "</div>"
                . "<div class='element'>"
                    . "<span>Profile picture: </span><input type = \"file\" name='Propic'/>" //immagine profilo
                . "</div>"
                . "<input type='hidden' name='Ruolo' value='user'>"
                     
                
                . "<div class='element'>"
                    . "<div class='button'>"
                        . "<input type='submit' name='invio' value='Access'>"
                    . "</div>"
                . "</div>"
            . "</div>"
        . "</form>"; 
    echo '</div>';