<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";

session_start();

stampa_head($titolo, $css);

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

    echo '<h1 class="header">Informazioni relative ai prodotti cercati</h1>';
    $sql = "SELECT p.* "
         . "FROM PRODOTTO p "
         . "JOIN AZIENDA a ON p.Azienda = a.id "
         . "WHERE 0 = 0 ";
    // clausola where che mi serve solo per attaccare gli AND

    if (!empty($input['Nome'])) {
        $sql .= " AND p.Nome = :Nome";
        $bind['Nome']['val'] = $input['Nome'];
        $bind['Nome']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Linea'])) {
        $sql .= " AND p.Linea = :Linea";
        $bind['Linea']['val'] = $input['Linea'];
        $bind['Linea']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Gusto'])) {
        $sql .= " AND p.Gusto LIKE :Gusto";
        $bind['Gusto']['val'] = "%" . $input['Gusto'] . "%";
        $bind['Gusto']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Azienda'])) {
        $sql .= " AND a.Nome = :Azienda";
        $bind['Azienda']['val'] = $input['Azienda'];
        $bind['Azienda']['tipo'] = PDO::PARAM_STR;
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
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    // You might want to provide a link or redirection here

stampa_finehtml();



