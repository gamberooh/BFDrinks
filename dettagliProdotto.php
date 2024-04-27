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
if (isAccessValid()) {
    $infoProdotto = $prodotti[$input['indice']];
    $titolo = "Profilo " . $infoProdotto['nome'];
    stampa_head($titolo, $css);
    echo '<div class="container" align="center">';
    echo '<div class="item">';
    $gusto = $infoProdotto['gusto'];
    $stringa_gusto = '';
    for ($j = 0; $j < count($gusto); $j++) {
        if ($j != count($gusto) - 1) {
            $stringa_gusto .= "$gusto[$j], ";
        } else {
            $stringa_gusto .= "$gusto[$j]";
        }
    } //gestione del gusto (array interno)

    $classi = $infoProdotto['acquistata'];
    $stringa_classi = '';
    for ($j = 0; $j < count($classi); $j++) {
        if ($j != count($classi) - 1) {
            $stringa_classi .= "$classi[$j], ";
        } else {
            $stringa_classi .= "$classi[$j]";
        }
    } //gestione delle classi (array interno)
    //NOME	LINEA	GUSTO	TIPO MISCELA	ACQUISTATA DA	CALORIE	COLLABORAZIONE	IMMAGINE PRODOTTO

    print "<h2>$infoProdotto[nome]</h2>";
    echo "<p>Prodotto della linea $infoProdotto[linea]</p>"
        . "<p>Gusto: $stringa_gusto</p>"
        . "<p>Bevanda di tipo: $infoProdotto[gassata]</p>"
        . "<p>Acquistata da: $stringa_classi</p>"
        . "<p>Calorie: $infoProdotto[calorie]</p>";
    if ($infoProdotto['collab'] != '') {
        echo "<p>Collaborazione: $infoProdotto[collab]</p>";
    }

    echo  "<img src=\"./images/{$infoProdotto['nome']}.jpg\" class = \"img-prodotto\"/>";
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
