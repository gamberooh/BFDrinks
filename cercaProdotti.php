<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";
$classebody = "catalogue-page";

session_start();

stampa_head($titolo, $css, $classebody);
if (check_login(isAdmin()) == true) {
$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

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
        stampa_catalogo($ris);
    } else {
        echo "<div class=\"no-product\"><h1>NESSUN PRODOTTO TROVATO</h1></div>";
    }

    echo '<br>';
    //torna_home_page();
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    // You might want to provide a link or redirection here
}
stampa_finehtml();



