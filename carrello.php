<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "MY CART";
$classe_body = "cart-page";

session_start(); // Start session to access session variables

stampa_head($titolo, $css, $classe_body);

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST')
    $input = $_POST;
else
    $input = $_GET;

// Check if access is valid before proceeding
if (isset($_SESSION['logged']) and $_SESSION['logged']) {
    if (isAdmin()) {
        navbar_admin();
    } else {
        navbar_user();
    }

    $sql = "SELECT c.*, (c.qnt*p.prezzo) AS Total, p.Nome AS Prodotto "
            . "FROM carrello c "
            . "JOIN prodotto p ON c.prodotto = p.indice  "
            . "WHERE c.Username = :Username; ";

    $bind['Username']['val'] = $_SESSION['Username'];
    $bind['Username']['tipo'] = PDO::PARAM_STR;

    $ris = esegui_query_con_bind($sql, $bind);

    if ($ris && count($ris) > 0) {
        echo "<div class=\"container\">";
        echo "<h1 class='header'>$_SESSION[Nome] $_SESSION[Cognome]'s cart</h1>";

        print_cart($ris);

        echo '  <div class="buy-container">
                    <form action="svuotaCarrello.php">
                        <input type="submit" value="Buy">
                    </form>
                </div>';
    } else {
        echo "<div class=\"empty-cart\"><h1>Your cart is empty!</h1>"
        . "</div>";
    }
    echo "</div>";
} else
    echo '<h1>Access Denied!</h1>';

stampa_finehtml();
