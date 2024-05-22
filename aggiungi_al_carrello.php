<?php

session_start();

include './include/connection.php';

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST')
        $input = $_POST;
     else 
        $input = $_GET;
    print_r($input);
    //USERNAME = SESSION, PRODOTTO = INDICE, DATA = METODO
    
    $username = $_SESSION['Username'];
    $prodotto = $input['Indice'];
    $data = date("d-m-y_h.m.sa");
    
    $sql = "INSERT INTO carrello (Username, Prodotto, Data_Inserimento) VALUES (\"$username\",\"$prodotto\",\"$data\");";
    
    esegui_insert($sql);
            