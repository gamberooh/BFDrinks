<?php

session_start();
include './include/funzioni.inc';
include './include/connection.php';
$css = "styles/myStyle.css";
stampa_head("Aggiornamento prodotto", $css, "accesso");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

print_r($input);

$sql = "UPDATE prodotto SET Nome=:Nome, Linea=:Linea, Miscela=:Miscela, Gusto=:Gusto, Prezzo=:Prezzo, Calorie=:Calorie, Azienda=:Azienda, Descrizione=:Descrizione WHERE Indice='$input[Indice]'";
//bind Nome
$bind['Nome']['val'] = $input["Nome"];
$bind['Nome']['tipo'] = PDO::PARAM_STR;
//bind Linea
$bind['Linea']['val'] = $input["Linea"];
$bind['Linea']['tipo'] = PDO::PARAM_STR;
//bind Miscela
$bind['Miscela']['val'] = $input["Miscela"];
$bind['Miscela']['tipo'] = PDO::PARAM_STR;
//bind Miscela
$bind['Gusto']['val'] = $input["Gusto"];
$bind['Gusto']['tipo'] = PDO::PARAM_STR;
//bind Miscela
$bind['Prezzo']['val'] = $input["Prezzo"];
$bind['Prezzo']['tipo'] = PDO::PARAM_INT;
//bind Miscela
$bind['Calorie']['val'] = $input["Calorie"];
$bind['Calorie']['tipo'] = PDO::PARAM_INT;
//bind Azienda
$bind['Azienda']['val'] = $input["Azienda"];
$bind['Azienda']['tipo'] = PDO::PARAM_STR;
//bind Descrizione
$bind['Descrizione']['val'] = $input["Descrizione"];
$bind['Descrizione']['tipo'] = PDO::PARAM_STR;

if (empty($bind))
    esegui_insert($sql);
else
    esegui_insert_con_bind($sql, $bind);


echo "
                <div class=\"back-to-login\">
                    <img src=\"./images/img-utility/logo.png\">
                    <h1>Product updated successfully</h1>  
                    <a href=\"login.php\">BACK TO HOME</a>
                </div>
            ";

stampa_finehtml();
?>