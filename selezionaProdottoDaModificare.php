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
=======
<?php

session_start();
include "./include/connection.php";
include "./include/funzioni.inc";
$titolo = 'Update Products';
$css = './styles/myStyle.css';
$classe_body = 'insert';

stampa_head($titolo, $css, $classe_body);
if (isAdmin()) {
?>

<form id="normale" method="post" action="updateProduct.php">
    <div class = "container">
        <div class='item'>
            <div class='element'>
                <span class='titolo-item'>Product id</span> <input type="number" name="Indice" placeholder="Product Index" required>
            </div>
        </div>
        <div class='item'>
            <div class='element'>
                <input type="submit" value="Modify Product">
            </div>
        </div>
    </div>
</form>


<?php
} else {
    echo '<h1>Access Denied</h1>';
}
torna_home_page();
>>>>>>> 9d88ef04f72d51187c04a74a9d4e1fd6f25b3a60
stampa_finehtml();