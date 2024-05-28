<?php

session_start();
include "./include/connection.php";
include "./include/funzioni.inc";
$titolo = 'Update Products';
$css = './styles/myStyle.css';
$classe_body = 'update-products';

stampa_head($titolo, $css, $classe_body);
if (isAdmin()) {
?>

<form method="post" action="updateProduct.php">
    <div>
        <span>Product id</span> <input type="number" name="Indice" placeholder="Product Index">
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