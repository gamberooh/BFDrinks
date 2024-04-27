<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";

session_start(); // Start session to access session variables

stampa_head($titolo, $css);

$method = $_SERVER['REQUEST_METHOD'];

// Check if access is valid before proceeding
if (isAccessValid()) {
    //echo "method = $method <br />";
    //selezione del metodo utilizzato per l'invio del form
    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

    echo '<h1 class="header">Informazioni relative ai prodotti cercati</h1>';

    $sql = "SELECT p.*, CONCAT(c.Anno, c.Sez, c.Acr) as Classe "
         . "FROM PRODOTTO p "
         . "JOIN AZIENDA a ON p.collab = a.id "
         . "JOIN ORDINE o ON p.Indice = o.indProdotto "
         . "JOIN CLASSE c ON (o.anno = c.anno) AND (o.sez = c.sez) AND (o.acr = c.acr) "
         . "WHERE 0 = 0";
    // clausola where che mi serve solo per attaccare gli AND

    if (!empty($input['nome'])) {
        $sql .= " AND p.nome = :nome";
        $bind['nome']['val'] = $input['nome'];
        $bind['nome']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['linea'])) {
        $sql .= " AND p.linea = :linea";
        $bind['linea']['val'] = $input['linea'];
        $bind['linea']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['gusto'])) {
        $sql .= " AND p.miscela LIKE :miscela";
        $bind['miscela']['val'] = "%" . $input['gusto'] . "%";
        $bind['miscela']['tipo'] = PDO::PARAM_STR;
    }

    //problema con l'input della classe (acquistata per php)
    if (!empty($input['classe'])) {
        $sql .= " AND CONCAT(c.Anno, c.Sez, c.Acr) = :classe";
        $bind['classe']['val'] = $input['classe'];
        $bind['classe']['tipo'] = PDO::PARAM_INT;
    }
    
    if (!empty($input['collab'])) {
        $sql .= " AND a.nome = :collab";
        $bind['collab']['val'] = $input['collab'];
        $bind['collab']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['calorie'])) {
        $sql .= " AND p.calorie <= :calorie";
        $bind['calorie']['val'] = $input['calorie'];
        $bind['calorie']['tipo'] = PDO::PARAM_INT;
    }

    if (empty($bind)) {
        $ris = esegui_query($sql);
    } else {
        $ris = esegui_query_con_bind($sql, $bind);
    }

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_prodotti($ris);
    } else {
        echo "<h1>NESSUN PRODOTTO TROVATO</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    torna_home_page();
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Credenziali non valide. Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();

?>

