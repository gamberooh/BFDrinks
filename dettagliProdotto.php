<?php

include './include/funzioni.inc';
$titolo = 'Product Details';
$css = './styles/myStyle.css';
$classe_body = "details-page";

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $input = $_POST;
} else {
    $input = $_GET;
}

// Check if access is valid before proceeding
if (isset($_SESSION['logged']) and $_SESSION['logged']) {
    stampa_head($titolo, $css, $classe_body);
    if (
        isset($_GET['indice'])
        and isset($_GET['nome'])
        and isset($_GET['linea'])
        and isset($_GET['miscela'])
        and isset($_GET['gusto'])
        and isset($_GET['prezzo'])
        and isset($_GET['calorie'])
        and isset($_GET['descrizione'])
    ) {
        $indice = urldecode($_GET['indice']);
        $nome = urldecode($_GET['nome']);
        $linea = urldecode($_GET['linea']);
        $miscela = urldecode($_GET['miscela']);
        $gusto = urldecode($_GET['gusto']);
        $prezzo = urldecode($_GET['prezzo']);
        $calorie = urldecode($_GET['calorie']);
        $descrizione = urldecode($_GET['descrizione']);

        $image_string = "./images/img-prodotti/" . $nome . ".png";
?>
        <div class='container'>
            <?php
            echo "<img src=\"$image_string\" alt='Product image'>";
            ?>
            <div class="elements">

        <?php
        echo "<div class='element' id=\"nome\">"
            . "<p>$nome</p>"
            . "</div>";
        echo "<div class='element'>"
            . "<span>LINE</span>"
            . "<p>$linea</p>"
            . "</div>";
        echo "<div class='element'>"
            . "<span>MIXTURE</span>"
            . "<p>$miscela</p>"
            . "</div>";
        echo "<div class='element'>"
            . "<span>FLAVOUR</span>"
            . "<p>$gusto</p>"
            . "</div>";
        echo "<div class='element'>"
            . "<span>PRICE</span>"
            . "<p>$prezzo €</p>"
            . "</div>";
        echo "<div class='element'>"
            . "<span>CALORIES</span>"
            . "<p>$calorie kcal</p>"
            . "</div>";
        //echo "<div class='element' id=\"descr\">"
        echo "<div class='element'>"
            . "<span>DESCRIPTION</span> <br><br>"
            . "<p>$descrizione</p>"
            . "</div>";
        echo '</div>'; //close container
    }

    echo '</div>';
    echo '<div class="link_2">';
    torna_home_page();
    echo "<a href=\"catalogo_prodotti.php\">CATALOGUE</a>";
    echo '</div>';
    echo '';
    stampa_finehtml();
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Credenziali non valide. Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}
