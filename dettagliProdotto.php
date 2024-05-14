<?php

include './include/funzioni.inc';
include './include/dati.inc';
$titolo = 'Product Details';
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
    stampa_head($titolo, $css);
    if (isset($_GET['nome_prodotto'])) {
    $nome_prodotto = urldecode($_GET['nome_prodotto']); // Decode the URL parameter
    echo "$nome_prodotto";
    // Cerca il prodotto nell'array $prodotti
    /*
    foreach ($ris as $prodotto) {
        if ($prodotto['Nome'] === $nome_prodotto) {
            $_SESSION['info-prodotto'] = $prodotto;
            break;
        }
    }*/
    
    //servirà il salvataggio di una session con l'info_prodotto per descrizione, prezzo ecc..
}
    
    
    $image_string = "./images/img-prodotti/" . $nome_prodotto. ".png";
    
    echo "<div>"
        . "<div class = 'img-prodotto'>";
    
           echo "<img src=\"$image_string\" alt='Product image'>";
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
