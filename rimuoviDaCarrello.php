<?php


include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Article Removed";
$classe_body = "cart-page";

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

echo "<div class=\"messageRemove\">"
. "     <h1>Article removed from the user's cart</h1>"
. "     <a href=\"carrello.php\">Return to the cart</a>"
. "  </div>";


