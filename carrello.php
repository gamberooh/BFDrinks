<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Cart page";

session_start(); // Start session to access session variables

stampa_head($titolo, $css);

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

print_r($input);

// Check if access is valid before proceeding
if (isset($_SESSION['logged']) and $_SESSION['logged']) {
    $sql = 'SELECT * '
            . 'FROM prodotto p '
            . 'JOIN carrello c ON p.indice = c.prodotto '
            . 'WHERE c.Username = :Username;';

    $bind['Username']['val'] = $_SESSION['Username'];
    $bind['Username']['tipo'] = PDO::PARAM_STR;

    $ris = esegui_query_con_bind($sql, $bind);
    print_table($ris);
    
    echo '<div>
        <form action="svuotaCarrello.php">
            <input type="submit" value="Compra">
        </form>
</div>';
} else
    echo '<h1>Accesso Negato!</h1>';