<?php

include "./include/funzioni.inc";
include "./include/connection.php";

$titolo = "Registrazione Effettuata";
$css = "./styles/myStyle.css";
$classebody = "registrazione";
stampa_head($titolo, $css, $classebody);

$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo == "POST") {
    $input = $_POST;
} else {
    $input = $_GET;
}
$bind = [];
print_r($input);

//Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo
$sql = "INSERT INTO utente(Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo) VALUES(";

if (!empty($input["Username"])) {
    $sql .= ":Username";
    $bind['Username']['val'] = $input['Username'];
    $bind['Username']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Pswd"])) {
    $sql .= ",:Pswd";
    $bind['Pswd']['val'] = $input['Pswd'];
    $bind['Pswd']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Email"])) {
    $sql .= ",:Email";
    $bind['Email']['val'] = $input['Email'];
    $bind['Email']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Nome"])) {
    $sql .= ",:Nome";
    $bind['Nome']['val'] = $input['Nome'];
    $bind['Nome']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Cognome"])) {
    $sql .= ",:Cognome";
    $bind['Cognome']['val'] = $input['Cognome'];
    $bind['Cognome']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Telefono"])) {
    $sql .= ",:Telefono";
    $bind['Telefono']['val'] = $input['Telefono'];
    $bind['Telefono']['tipo'] = PDO::PARAM_STR;
}
if (!empty($input["Classe"])) {
    $sql .= ",:Classe";
    $bind['Classe']['val'] = $input['Classe'];
    $bind['Classe']['tipo'] = PDO::PARAM_STR;
}

//di base un utente registrato è uno user
$sql .= ",:Ruolo";
$bind['Ruolo']['val'] = "user";
$bind['Ruolo']['tipo'] = PDO::PARAM_STR;

$sql .= ");";

if (empty($bind)) {
    esegui_insert($sql);
} else {
    esegui_insert_con_bind($sql, $bind);
}

echo "
        <div>
            <h1> You are now registered! </h1>
            <a href=\"login.php\">Go back to login</a>
        </div>
";


stampa_finehtml();
