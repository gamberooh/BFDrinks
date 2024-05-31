<?php

session_start();
include './include/funzioni.inc';
include './include/connection.php';
$css = "styles/myStyle.css";
stampa_head("LOG-IN", $css, "accesso");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST')
    $input = $_POST;
 else 
    $input = $_GET;

$username = $input["Username"];
$password = $input["Pswd"];
$hashish;

if(empty($username) || empty($password)){
    if(isset($_SESSION["logged"]) and $_SESSION["logged"] == true){
        header("Location: index.php");
    } else {
        echo "
            <div class=\"back-to-login\">
                <img src=\"./images/img-utility/logo.png\">
                <h1>INSTATED CREDENTIALS</h1>  
                <a href=\"login.php\"> BACK TO LOGIN</a>
            </div>
            ";
    }
} else {
    $sql = "SELECT Username, Pswd, Nome, Cognome, Ruolo FROM utente WHERE (Username = :Username) AND (Pswd = :Pswd);";
    //bind username
    $bind['Username']['val'] = $username;
    $bind['Username']['tipo'] = PDO::PARAM_STR;
    $hashish = hash('sha256', $password);
    //bind password
    $bind['Pswd']['val'] = $hashish;
    $bind['Pswd']['tipo'] = PDO::PARAM_STR;
    
    if($user = esegui_query_con_bind($sql, $bind)){
        $_SESSION['logged'] = true;
        $_SESSION['Username'] = $username;
        $_SESSION["Nome"] = $user[0]['Nome'];
        $_SESSION["Cognome"] = $user[0]["Cognome"];
        $_SESSION['Ruolo'] = $user[0]['Ruolo'];
        
        header("Location: index.php");
    } else {
        echo "
                <div class=\"back-to-login\">
                    <img src=\"./images/img-utility/logo.png\">
                    <h1>INSTATED CREDENTIALS</h1>  
                    <a href=\"login.php\"> BACK TO LOGIN</a>
                </div>
            ";
    }
}

stampa_finehtml();
?>