<?php
include './include/funzioni.inc';
include './include/dati.inc';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";
stampa_head($titolo, $css);
$method = $_SERVER['REQUEST_METHOD'];
//echo "method = $method <br />";
//selezione del metodo utilizzato per l'invio del form
if($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

echo '<h1 class="header">Informazioni relative hai prodotti cercati</h1>';


stampa_prodotti($prodotti);

torna_home_page();
stampa_finehtml();
