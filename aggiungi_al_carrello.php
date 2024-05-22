<?php

session_start();

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    //USERNAME = SESSION, PRODOTTO = INDICE, DATA = METODO
    
    $username = $_SESSION['Username'];
    $prodotto = $input['Indice'];
    $data = date();

