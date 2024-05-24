<?php

session_start();

include './include/connection.php';
include './include/funzioni.inc';

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
    
    aggiungi_al_carrello($username, $prodotto, $data);
    
    //vecchio codice, non funziona. ora la funzione aggiungi_al_carrello($username, $prodotto, $data) pensa a tutto
    
    /*$sql = "INSERT INTO carrello (Username, Prodotto, qnt, Data_Inserimento) VALUES (\"$username\",\"$prodotto\",\"$data\");";
    
    $sql = "INSERT INTO carrello (Username, Prodotto, qnt, Data_Inserimento) 
        VALUES (:username, :prodotto, :qnt, :data)
        ON DUPLICATE KEY UPDATE 
        qnt = qnt + VALUES(qnt), 
        Data_Inserimento = VALUES(Data_Inserimento);";
    
    if (!empty($input["Username"])) {
    $bind['Username']['val'] = $username;
    $bind['Username']['tipo'] = PDO::PARAM_STR;
    }
    
    if(!empty($input['Prodotto'])){
        $bind['Prodotto']['val'] = $prodotto;
        $bind['Prodotto']['tipo'] = PDO::PARAM_STR;        
    }
    
    if(!empty($input['qnt']))*/