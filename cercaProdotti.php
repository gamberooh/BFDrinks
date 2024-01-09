<?php

include './include/funzioni.inc';
include './include/dati.inc';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";
stampa_head($titolo, $css);
$method = $_SERVER['REQUEST_METHOD'];
//echo "method = $method <br />";
//selezione del metodo utilizzato per l'invio del form
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

echo '<h1 class="header">Informazioni relative ai prodotti cercati</h1>';

//assegnazione degli indici
$indiciProdotti = array_keys($prodotti);
foreach ($indiciProdotti as $indice) {
    $prodotti[$indice]['indice'] = $indice;
}

if (!empty($input['calorie'])) {
    $valore_calorie = (int) $input['calorie']; // Converti in intero il valore delle calorie
    // Chiamata alla funzione per filtrare i prodotti con calorie inferiori al valore specificato
    $ris = calorie_inferiori($prodotti, $valore_calorie);
} else {
//ultimo prodotto viene sostituito dal penultimo che viene duplicato
    foreach ($prodotti as $indice => $dettaglioProdotto) {
        $inserito = false;
        $arr_gusto = $dettaglioProdotto['gusto'];
        $arr_acquistata = $dettaglioProdotto['acquistata'];
        if ((empty($input['nome']) or $input['nome'] == $dettaglioProdotto['nome'])
                and (empty($input['linea']) or $input['linea'] == $dettaglioProdotto['linea'])
                and (empty($input['gassata']) or $input['gassata'] == $dettaglioProdotto['gassata'])
                and (empty($input['collab']) or $input['collab'] == $dettaglioProdotto['collab'])
                and (empty($input['gusto']) or in_array($input['gusto'], $arr_gusto))
                and (empty($input['acquistata']) or in_array($input['acquistata'], $arr_acquistata))) {

            $ris[] = $dettaglioProdotto;
        }
    }
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
stampa_finehtml();
