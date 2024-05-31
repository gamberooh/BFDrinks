<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "CART-PAGE";
$classe_body = "cart-page";

session_start();

stampa_head($titolo, $css, $classe_body);

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

if (isset($_SESSION['logged']) and $_SESSION['logged'] && isAdmin()) {
    
    navbar_admin();
    
    $sql = "DELETE FROM prodotto WHERE Indice = $input[Indice] ";
    $filename = "./images/img-prodotti/$input[Nome]" . ".png";
    
    unlink($filename); //elimina il file immagine del prodotto
    esegui_query($sql);
    echo "<div class='container'>"
            . "<h1 class='header'>Catalogue after '$input[Nome]' removal</h1>";
    $sql_print = 'SELECT * FROM Prodotto;';
    stampa_prodotti2(esegui_query($sql_print));
        echo "<div class='link'><br>"; 
            torna_home_page();
        echo "</div>" .
        "</div>";
} else {
    echo "<h1>ACCESS DENIED</h1>";
}

stampa_finehtml();