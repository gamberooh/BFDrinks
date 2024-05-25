<?php

session_start();

include './include/connection.php';
include './include/funzioni.inc';
$titolo = "Correctly Add";
$css = "./styles/myStyle.css";
$classebody = "corretta-aggiunta";
stampa_head($titolo, $css, $classebody);

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST')
        $input = $_POST;
     else 
        $input = $_GET;
    //USERNAME = SESSION, PRODOTTO = INDICE, DATA = METODO
    
    $username = $_SESSION['Username'];
    $prodotto = $input['Indice'];
    $data = date("d-m-y_h.m.sa");
    $qnt = $input["qnt"];
    
    aggiungi_al_carrello($username, $prodotto, $data, $qnt);
    
    echo "
        <div class=\"container\">
            <img src=\"./images/img-utility/logo.png\">
            <h1>
                PRODUCTS ADDED <br> 
                CORRECTLY TO CART 
            </h1>  
            <a href=\"catalogo_prodotti.php\"> BACK TO CATALOGUE</a>
        </div>
        ";
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
    stampa_finehtml();