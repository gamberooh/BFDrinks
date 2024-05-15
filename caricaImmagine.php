<?php

    include './include/funzioni.inc';
    include './include/dati.inc';
    $css = './styles/myStyle.css';
    $titolo = "Dettaglio squadra";

    session_start(); // Start session to access session variables

    stampa_head($titolo, $css);

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    
    // Check if access is valid before proceeding
    if (isAccessValid()) {
        $indice_prodotto = $input['indice']; //id numerico del prodotto

        $nome = 'fileprodotto';
        $img_tmp = $_FILES[$nome]['tmp_name'];
        $img_name = $_FILES[$nome]['name'];
        $img_type = $_FILES[$nome]['type'];
        $img_size = $_FILES[$nome]['size'];
        $img_err = $_FILES[$nome]['error'];
        
        // echo "<p>$nome - tmp_name = $img_tmp - name = $img_name - size = $img_size - type = $img_type errore = $img_err<br></p>";

        $path_from = $img_tmp;
        $path_to = "./images/$img_name";

        $is_file_moved = move_uploaded_file($path_from, $path_to);
        // Rinomina il file con il nome della squadra selezionata
        rename($path_to, './images/' . $prodotti[$indice_prodotto]['nome'] . ".jpg");

        // Controllo sull'esistenza del nome_squadra
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
    } else {
        // If access is not valid, handle accordingly (e.g., redirect to login page)
        echo "<h1>Credenziali non valide. Accesso negato.</h1>";
        // You might want to provide a link or redirection here
    }

    stampa_finehtml();

?>
