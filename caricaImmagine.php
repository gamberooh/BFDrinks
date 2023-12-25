<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include './include/funzioni.inc';
include './include/dati.inc';
$css = './styles/myStyle.css';
$titolo = "Dettaglio sguadra";
stampa_head($titolo, $css);
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;


$indice_prodotto = $input['indice']; //id numerico del prodotto

$nome = 'fileprodotto';
$img_tmp = $_FILES[$nome]['tmp_name'];
$img_name = $_FILES[$nome]['name'];
$img_type = $_FILES[$nome]['type'];
$img_size = $_FILES[$nome]['size'];
$img_err = $_FILES[$nome]['error'];

echo "<p>$nome - tmp_name = $img_tmp - name = $img_name - size = $img_size - type = $img_type errore = $img_err<br></p>";

$path_from = $img_tmp;
$path_to = "./images/$img_name";

$is_file_moved = move_uploaded_file($path_from, $path_to);
//rinomina il file con il nom edella squadra selezionata
rename($path_to, './images/' . $prodotti[$indice_prodotto]['nome'] . ".jpg");


//controllo sull'esistenza del nome_squadra
if (isset($prodotti[$indice_prodotto]['nome'])) {
    $nome_prodotto = $prodotti[$indice_prodotto]['nome'];
} else {
    $nome_prodotto = 'Prodotto non disponibile nel catalogo';
}

if ($is_file_moved) {
    echo '<h4>File caricato correttamente</h4>';
} else {
    echo "<h4>Si è verificato un errore nel caricamento del file - Codice Errore: $img_err</h4>";
    echo "<p>Informazioni sul file: </p>";
    print_r($_FILES[$nome]);
}

echo " Ho caricato l'immagine del $nome<br>"
    . "<p><img src=\"./images/{$nome}.jpg\" class = \"\"/></p>"
    . $nome;

torna_home_page();
stampa_finehtml();

