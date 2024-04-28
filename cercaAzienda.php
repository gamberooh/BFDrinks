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

    echo '<h1 class="header">Informazioni relative alle Aziende</h1>';

        
    $sql_azienda = 'INSERT INTO azienda (Id, Nome, NTel, eMail) VALUES'
        . '(:Id, :Nome, :NTel, :eMail);';
    $risAzienda['Id']['val'] = $input['Id'];
    $risAzienda['Id']['tipo'] = PDO::PARAM_STR;
    $risAzienda['Nome']['val'] = $input['Nome'];
    $risAzienda['Nome']['tipo'] = PDO::PARAM_STR;
    $risAzienda['NTel']['val'] = $input['NTel'];
    $risAzienda['NTel']['tipo'] = PDO::PARAM_INT;
    $risAzienda['eMail']['val'] = $input['eMail'];
    $risAzienda['eMail']['tipo'] = PDO::PARAM_STR;

    esegui_query_con_bind($sql_azienda, $risAzienda);

    // Selezione completa da Classe
    
    $sql = "SELECT a.* "
            . "FROM Azienda a";
    
    $ris = esegui_query($sql);

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_aziende($ris);
    } else {
        echo "<h1>NESSUNA AZIENDA TROVATA</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insert/insertCompanies.php\">TORNA ALL'INSERIMENTO</a>";
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();



