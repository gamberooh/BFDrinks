<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Companies";

session_start();

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

    echo "<h1 class=\"header\">Companies after $input[Nome] add</h1>";

        
    $sql_azienda = 'INSERT INTO azienda (Id, Nome, Telefono, Indirizzo, Email) VALUES'
        . '(:Id, :Nome, :Telefono, :Indirizzo, :Email);';
    $risAzienda['Id']['val'] = $input['Id'];
    $risAzienda['Id']['tipo'] = PDO::PARAM_STR;
    $risAzienda['Nome']['val'] = $input['Nome'];
    $risAzienda['Nome']['tipo'] = PDO::PARAM_STR;
    $risAzienda['Telefono']['val'] = $input['Telefono'];
    $risAzienda['Telefono']['tipo'] = PDO::PARAM_INT;
    $risAzienda['Indirizzo']['val'] = $input['Indirizzo'];
    $risAzienda['Indirizzo']['tipo'] = PDO::PARAM_INT;
    $risAzienda['Email']['val'] = $input['Email'];
    $risAzienda['Email']['tipo'] = PDO::PARAM_STR;

    if (empty($risAzienda)) {
        esegui_query($sql_azienda);
    } else {
        esegui_query_con_bind($sql_azienda, $risAzienda);

    }
    // Selezione completa da Classe
    
    $sql = "SELECT a.* "
            . "FROM Azienda a";
    
    $ris = esegui_query($sql);

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_aziende($ris);
    } else {
        echo "<h1>Companies not found</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insertCompanies.php\">Back to Insert</a>";
    echo '</div>';
    echo '</div>';
} else {
    echo "<h1>Accesso negato.</h1>";
}

stampa_finehtml();



