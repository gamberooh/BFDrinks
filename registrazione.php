<?php

session_start();

include "./include/funzioni.inc";
include "./include/connection.php";

$titolo = "Registrazione Effettuata";
$css = "./styles/myStyle.css";
$classebody = "registrazione";
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
    echo "<div><h1>Email già esistente</h1><a href=\"signup.php\">Torna alla registrazione</a></div>";
} elseif ($telefonoExists) {
    echo "<div><h1>Telefono già esistente</h1><a href=\"signup.php\">Torna alla registrazione</a></div>";
} elseif ($usernameExists) {
    echo "<div><h1>Username già esistente</h1><a href=\"signup.php\">Torna alla registrazione</a></div>";
} else {

    print_r($_FILES["Propic"]);

//Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo
    $sql = "INSERT INTO utente(Username,Pswd,Email,Nome,Cognome,Telefono,Classe,Ruolo) VALUES(";

    if (!empty($input["Username"])) {
        $sql .= ":Username";
        $bind['Username']['val'] = $input['Username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;
    }
    if (!empty($input["Pswd"])) {
        $hashish;
        $sql .= ",:Pswd";
        $hashish = hash('sha256', $input['Pswd']);
        $bind['Pswd']['val'] = $hashish;
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


    if (!empty($input["Propic"])) {
        $nome = "Propic";
        $foto_tmp = $_FILES[$nome]["tmp_name"];
        $nome_foto = $_FILES[$nome]["name"];
        $tipo_foto = $_FILES[$nome]["type"];
        $grandezza_foto = $_FILES[$nome]["size"];
        $errore_foto = $_FILES[$nome]["error"];

        $radice = $foto_tmp;
        $destinazione = "./images/img-profile/$nome_foto";

        $file_spostato = move_uploaded_file($radice, $destinazione);

        rename($destinazione, "./images/img-profile/" . $bind["Nome"]["val"] . $bind["Cognome"]["val"] . ".png");
        if ($file_spostato) {
            echo "image loaded correctly";
        } else {
            echo "error";
        }
    }


    if ($controlloUsername && $controlloPassword && $controlloEmail && $controlloNome && $controlloCognome && $controlloTelefono && $controlloClasse && !$emailExists && !$telefonoExists && !$usernameExists) {
        echo '<div>
            <h1> You are now registered! </h1>
            <a href=\"login.php\">Go back to login</a>
        </div>';
    } else {
        echo '<div>
            <h1> You didn\'t put anything in the previus form! </h1>
            <a href=\"signup.php\">Go back to the registration page</a>
        </div>';
    }
}

stampa_finehtml();
