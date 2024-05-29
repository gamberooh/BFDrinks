<?php

session_start();

include "./include/funzioni.inc";
include "./include/connection.php";

$titolo = "Registraion Done";
$css = "./styles/myStyle.css";
$classebody = "accesso";
stampa_head($titolo, $css, $classebody);

$metodo = $_SERVER["REQUEST_METHOD"];

if ($metodo == "POST")
    $input = $_POST;
else
    $input = $_GET;


$controlloUsername = isset($input["Username"]);
$controlloPassword = isset($input["Pswd"]);
$controlloEmail = isset($input["Email"]);
$controlloNome = isset($input["Nome"]);
$controlloCognome = isset($input["Cognome"]);
$controlloTelefono = isset($input["Telefono"]);
$controlloClasse = isset($input["Classe"]);

$bind = [];
$emailExists = false;
$telefonoExists = false;

if (!empty($input["Username"])) {
    $sql = "SELECT COUNT(*) FROM utente WHERE Username = :Username";
    $stmt = $myconnection->prepare($sql);
    $stmt->bindParam(':Username', $input['Username'], PDO::PARAM_STR);
    $stmt->execute();
    $usernameExists = ($stmt->fetchColumn() > 0);
}

if (!empty($input["Email"])) {
    $sql = "SELECT COUNT(*) FROM utente WHERE Email = :Email";
    $stmt = $myconnection->prepare($sql);
    $stmt->bindParam(':Email', $input['Email'], PDO::PARAM_STR);
    $stmt->execute();
    $emailExists = ($stmt->fetchColumn() > 0);
}

if (!empty($input["Telefono"])) {
    $sql = "SELECT COUNT(*) FROM utente WHERE Telefono = :Telefono";
    $stmt = $myconnection->prepare($sql);
    $stmt->bindParam(':Telefono', $input['Telefono'], PDO::PARAM_STR);
    $stmt->execute();
    $telefonoExists = ($stmt->fetchColumn() > 0);
}

/* AGGIUNGER ECONTROLLO PER L'USERNAME GIA ESISTENTE */

if ($emailExists) {
    echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>EMAIL ALREADY USED</h1>  
                <a href=\"signup.php\"> BACK TO REGISTRATION</a>
            </div>
            ";
} elseif ($telefonoExists) {
    echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>PHONE NUMBER ALREADY USED</h1>  
                <a href=\"signup.php\"> BACK TO REGISTRATION</a>
            </div>
            ";
} elseif ($usernameExists) {
    echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>USERNAME ALREADY USED</h1>  
                <a href=\"signup.php\"> BACK TO REGISTRATION</a>
            </div>
            ";
} else {


//Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo
    $sql = "INSERT INTO utente(Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo) VALUES(";

    if (!empty($input["Username"])) {
        $sql .= ":Username";
        $bind['Username']['val'] = $input['Username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;
    }
    if (!empty($input["Pswd"])) {
        $hash;
        $sql .= ",:Pswd";
        $hash = hash('sha256', $input['Pswd']);
        $bind['Pswd']['val'] = $hash;
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

    if (empty($bind))
        esegui_insert($sql);
    else
        esegui_insert_con_bind($sql, $bind);

    // CONTROLLO FOTO
    if (!empty($input["Picture"])) {
        $nome = "Picture";
        $foto_tmp = $_FILES[$nome]["tmp_name"];
        $nome_foto = $_FILES[$nome]["name"];
        $tipo_foto = $_FILES[$nome]["type"];
        $grandezza_foto = $_FILES[$nome]["size"];
        $errore_foto = $_FILES[$nome]["error"];

        $radice = $foto_tmp;
        $destinazione = "./images/img-profile/$nome_foto";

        $file_spostato = move_uploaded_file($radice, $destinazione);
        // non sposta l'immagine qui (vedi caricaFoto.php che funziona)
        $name = $bind['Nome']['val'];
        $surname = $bind['Cognome']['val'];
        
        rename($destinazione, "./images/img-profile/" . $name . $surname . ".png");
        if ($file_spostato) {
            echo "Image uploaded correctly";
        } else {
            echo "Error";
            print_r($_FILES[$nome]);
        }
    }


    if ($controlloUsername && $controlloPassword && $controlloEmail && $controlloNome && $controlloCognome && $controlloTelefono && $controlloClasse && !$emailExists && !$telefonoExists && !$usernameExists) {
        echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>YOU ARE NOW REGISTERED</h1>  
                <a href=\"login.php\"> BACK TO LOGIN</a>
            </div>
            ";
    } else {
        echo '<div>
            echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>YOU DIDN\'T PUT ANYTHING IN THE PREVIOUS FORM</h1>  
                <a href=\"signup.php\"> BACK TO REGISTRATION</a>
            </div>
            ";
        </div>';
    }
}

stampa_finehtml();
