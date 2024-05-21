<?php
session_start();
include './include/connection.php';
include './include/funzioni.inc';
$titolo = "CATALOGO";
$css = "./styles/myStyle.css";
$classebody = "catalogue-page";
stampa_head($titolo, $css, $classebody);

if (check_login(isAdmin()) == true) {
    $sql = "SELECT p.* "
            . "FROM PRODOTTO p "
            . "JOIN AZIENDA a ON p.Azienda = a.id ";

    $ris = esegui_query($sql);

    stampa_catalogo($ris);
} else {
    torna_login();
}

stampa_finehtml();
