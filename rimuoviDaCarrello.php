<?php


include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "ARTICLE REMOVED";
$classe_body = "accesso";

session_start(); // Start session to access session variables

stampa_head($titolo, $css, $classe_body);
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

$sql  =   "DELETE FROM carrello WHERE Prodotto IN (SELECT Indice FROM prodotto WHERE Nome = :Prodotto);";
$bind['Prodotto']['val'] = $input['Prodotto'];
$bind['Prodotto']['tipo'] = PDO::PARAM_STR;

if (!empty($bind)){
    $ris = esegui_query_con_bind($sql, $bind);
} else {
    $ris = esegui_query($sql);
}

echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>ARTICLE REMOVED FROM THE CART</h1>  
                <a href=\"carrello.php\"> MY CART </a>
            </div>
            ";


