<?php

include './include/funzioni.inc';
include './include/dati.inc';
$css = './styles/myStyle.css';

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $input = $_POST;
} else {
    $input = $_GET;
}

// Check if access is valid before proceeding
if ($_SESSION['logged']) {
    
    
    
    echo  "<img src=\"./images/{$infoProdotto['nome']}.jpg\" class = 'img-prodotto'>";
    echo '</div>'; //close item
    echo '</div>'; //close container

    echo '<div class="container">';
    echo '<div class="link">';
    torna_home_page();
    echo '</div>';
    echo '</div>';
    stampa_finehtml();
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Credenziali non valide. Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

?>
