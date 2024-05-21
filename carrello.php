<?php

    include './include/funzioni.inc';
    include './include/dati.inc';
    $css = './styles/myStyle.css';
    $titolo = "Cart page";

    session_start(); // Start session to access session variables

    stampa_head($titolo, $css);

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST')
        $input = $_POST;
    else
        $input = $_GET;

    // Check if access is valid before proceeding
    if (isset($_SESSION['logged']) and $_SESSION['logged']) {
        $sql = 'SELECT *'
                . 'FROM carrello c'
                . 'JOIN prodotto p ON c.prodotto = p.indice'
                . 'JOIN utente u ON c.Username = u.Username'
                . 'WHERE (c.Username = :Username)';
        $bind['Username']['val'] = $_SESSION['username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;
        
        $ris = esegui_query_con_bind($sql, $bind);
        stampa_prodotti($ris);
    } else
        echo '<h1>Accesso Negato!</h1>';