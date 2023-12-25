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

//Con la '&' andiamo a fare rifermiento diretto alla cella, quindi possiamo modifcarla direttamente?
foreach ($prodotti as $indice => &$dettaglioProdotto) {
    $dettaglioProdotto['indice'] = $indice;

}
 
$ris = $prodotti;

stampa_prodotti($ris);

torna_home_page();
stampa_finehtml();
