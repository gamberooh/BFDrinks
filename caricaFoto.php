<?php
    session_start();
    
    // utilizzato da user-profile.php
    
    include './include/funzioni.inc';
    $titolo = 'Upload user image';
    $css = './styles/myStyle.css';
    $classebody = 'index-page';
    stampa_head($titolo, $css, $classebody);
    
    $nome = "Propic";
    $foto_tmp = $_FILES[$nome]["tmp_name"];
    $nome_foto = $_FILES[$nome]["name"];
    $tipo_foto = $_FILES[$nome]["type"];
    $grandezza_foto = $_FILES[$nome]["size"];
    $errore_foto = $_FILES[$nome]["error"];

    $radice = $foto_tmp;
    $destinazione = "./images/img-profile/$nome_foto";

    $file_spostato = move_uploaded_file($radice, $destinazione);

    rename($destinazione, "./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png");
    if ($file_spostato) {
        echo "Image uploaded correctly";
        torna_home_page();
    } else {
        echo "Error";
        print_r($_FILES[$nome]);
    }