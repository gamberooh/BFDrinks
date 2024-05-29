<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Cart page";
$classe_body = "cart-page";

session_start();

stampa_head($titolo, $css, $classe_body);

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

if (isset($_SESSION['logged']) and $_SESSION['logged']) {
    /*
    if (isAdmin())
        navbar_admin();
    else
        navbar_user();
    */
    print_r($input);

    $sql = 'DELETE FROM prodotti WHERE Indice =:Indice';
    $bind['Indice']['val']=$input['Indice'];
    $bind['Indice']['tipo']=PDO::PARAM_INT;
    esegui_query_con_bind($sql, $bind);
}

stampa_finehtml();