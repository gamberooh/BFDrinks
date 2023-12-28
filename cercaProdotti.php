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
}//fine aggiunta degli indici

foreach ($prodotti as $indice => $dettaglioProdotto) {
    $inserito = false;
    
    if((empty($input['nome']) or $input['nome'] == $dettaglioProdotto['nome'])
    and (empty($input['linea']) or $input['linea'] == $dettaglioProdotto['linea'])
    and (empty($input['gassata']) or $input['gassata'] == $dettaglioProdotto['gassata'])
    and (empty($input['collab']) or $input['collab'] == $dettaglioProdotto['collab'])   
    ) {
        
        /*
         * il gusto va gestito scorrendo all'interno
         * idem acquistata
         * calorie vorrei fare che il valore restituito debba restituire tutti i
         * prodotti che si avvicinano di x valore al risultato inviato
         */
        $ris[] = $dettaglioProdotto;
    }
}

if (!empty($ris)) {
    //print_r($risultati);
    stampa_prodotti($ris);
} else {
    echo "<h1>NESSUN PRODOTTO TROVATO</h1>";
}



torna_home_page();
stampa_finehtml();
