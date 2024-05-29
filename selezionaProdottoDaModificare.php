<<<<<<< HEAD
<?php

session_start();
include "./include/connection.php";
include "./include/funzioni.inc";
$titolo = 'Update Products';
$css = './styles/myStyle.css';
$classe_body = 'select-update';

stampa_head($titolo, $css, $classe_body);
if (isAdmin()) {
?>

<form method="post" action="updateProduct.php">
    <div>
        <input type="number" name="Indice" placeholder="Product ID" required>
    </div>
    <div>
        <input type="submit" value="Modify Product">
    </div>
</form>


<?php
} else {
    echo '<h1>Access Denied</h1>';
}
torna_home_page();
stampa_finehtml();