<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Classes";

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

    echo "<h1 class=\"header\">Classes after $input[Classe] add</h1>";

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
        echo "<h1>CLASSES NOT FOUND</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    echo "<a href = \"./insertClasses.php\">BACK TO INSERT</a>";
    echo '</div>';
    echo '</div>';
} else {
    
    echo "<h1>ACCESS DENIED</h1>";
    
}

stampa_finehtml();



