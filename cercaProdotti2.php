<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";

session_start(); // Start session to access session variables

stampa_head($titolo, $css);

$method = $_SERVER['REQUEST_METHOD'];

// Check if access is valid before proceeding
if (isAdmin()) {
    //echo "method = $method <br />";
    //selezione del metodo utilizzato per l'invio del form
    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

    echo '<h1 class="header">Informazioni relative ai prodotti cercati</h1>';
    
    $sql_prodotto = 'INSERT INTO PRODOTTO (Indice, Nome, Linea, Miscela, Calorie, Collab) VALUES'
        .'(:Indice, :Nome, :Linea, :Miscela, :Calorie, :Collab);';
    $risProdotto['Indice']['val'] = $input['Indice'];
    $risProdotto['Indice']['tipo'] = PDO::PARAM_INT;
    $risProdotto['Nome']['val'] = $input['Nome'];
    $risProdotto['Nome']['tipo'] = PDO::PARAM_STR;
    $risProdotto['Linea']['val'] = $input['Linea'];
    $risProdotto['Linea']['tipo'] = PDO::PARAM_STR;
    $risProdotto['Miscela']['val'] = $input['Miscela'];
    $risProdotto['Miscela']['tipo'] = PDO::PARAM_STR;
    $risProdotto['Calorie']['val'] = $input['Calorie'];
    $risProdotto['Calorie']['tipo'] = PDO::PARAM_INT;
    $risProdotto['Collab']['val'] = $input['Collab'];
    $risProdotto['Collab']['tipo'] = PDO::PARAM_STR;

    esegui_query_con_bind ($sql_prodotto, $risProdotto);
    
    // Selezione completa da Classe
    
    $sql = "SELECT p.* "
            . "FROM Prodotto p";
    
    $ris = esegui_query($sql);

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_prodotti2($ris);
    } else {
        echo "<h1>NESSUN ORDINE TROVATO</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insert/insertProducts.php\">TORNA ALL'INSERIMENTO</a>";
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();



    