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

    echo '<h1 class="header">INFORMATION ABOUT SEARCHED PRODUCTS</h1>';
    
    $sql_ordine = 'INSERT INTO ORDINE (Id, qta, data, indProdotto, Anno, Sez, Acr) VALUES'
        .'(:Id, :qta, :data, :indProdotto, :Anno, :Sez, :Acr);';
    
    $risOrdine['Id']['val'] = $input['Id'];
    $risOrdine['Id']['tipo'] = PDO::PARAM_INT;
    $risOrdine['qta']['val'] = $input['qta'];
    $risOrdine['qta']['tipo'] = PDO::PARAM_INT;
    $risOrdine['data']['val'] = $input['data'];
    $risOrdine['data']['tipo'] = PDO::PARAM_STR;
    $risOrdine['indProdotto']['val'] = $input['indProdotto'];
    $risOrdine['indProdotto']['tipo'] = PDO::PARAM_INT;
    $risOrdine['Anno']['val'] = $input['Anno'];
    $risOrdine['Anno']['tipo'] = PDO::PARAM_INT;
    $risOrdine['Sez']['val'] = $input['Sez'];
    $risOrdine['Sez']['tipo'] = PDO::PARAM_STR;
    $risOrdine['Acr']['val'] = $input['Acr'];
    $risOrdine['Acr']['tipo'] = PDO::PARAM_STR;

    esegui_query_con_bind($sql_ordine, $risOrdine);
    
    // Selezione completa da Classe
    
    $sql = "SELECT o.* "
            . "FROM Ordine o";
    
    $ris = esegui_query($sql);

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_ordini($ris);
    } else {
        echo "<h1>NESSUN ORDINE TROVATO</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insert/insertOrders.php\">TORNA ALL'INSERIMENTO</a>";
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();



    