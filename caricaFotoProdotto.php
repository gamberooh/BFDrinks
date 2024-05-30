<?php
    session_start();
    include './include/funzioni.inc';
    $titolo = 'Upload product image';
    $css = './styles/myStyle.css';
    $classebody = 'accesso';
    stampa_head($titolo, $css, $classebody);
    
    $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST')
            $input = $_POST;
        else 
            $input = $_GET;
    
    if (isAdmin()) {
        
        $nome = "Productpic";
        $foto_tmp = $_FILES[$nome]["tmp_name"];
        $nome_foto = $_FILES[$nome]["name"];
        $tipo_foto = $_FILES[$nome]["type"];
        $grandezza_foto = $_FILES[$nome]["size"];
        $errore_foto = $_FILES[$nome]["error"];

        $radice = $foto_tmp;
        $destinazione = "./images/img-prodotti/$nome_foto";

        $file_spostato = move_uploaded_file($radice, $destinazione);


        rename($destinazione, "./images/img-prodotti/" . $input["Nome"] . ".png");
        
        if ($file_spostato) {
            echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>IMAGE UPLOADED CORRECTLY</h1>  
                <a href=\"index.php\"> HOME PAGE</a>
            </div>
            ";
        } else {
            echo "Error: file not moved";
            print_r($_FILES[$nome]);
        }
    } else {
        echo "<h1>ACCESS DENIED</h1>";
    }
    