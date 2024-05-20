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

    $sql = 'INSERT INTO classe (Classe, NAlunni, Aula) VALUES '
            . '(:Classe, :NAlunni, :Aula);';
    
    $risClassi['Classe']['val'] = $input['Classe'];
    $risClassi['Classe']['tipo'] = PDO::PARAM_STR;
    $risClassi['NAlunni']['val'] = $input['NAlunni'];
    $risClassi['NAlunni']['tipo'] = PDO::PARAM_INT;
    $risClassi['Aula']['val'] = $input['Aula'];
    $risClassi['Aula']['tipo'] = PDO::PARAM_STR;
    
    if (empty($risClassi)) {
        esegui_query($sql);
    } else {
        esegui_query_con_bind($sql, $risClassi);
    }
    
    // Selezione completa da Classe
    
    $sql = "SELECT c.* "
            . "FROM Classe c";
    
    $ris = esegui_query($sql);

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_classi($ris);
    } else {
        echo "<h1>NESSUNA CLASSE TROVATA</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insert/insertClasses.php\">TORNA ALL'INSERIMENTO</a>";
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();



