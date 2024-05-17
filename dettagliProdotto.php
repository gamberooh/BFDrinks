<?php

include './include/funzioni.inc';
$titolo = 'Product Details';
$css = './styles/myStyle.css';

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $input = $_POST;
} else {
    $input = $_GET;
}

// Check if access is valid before proceeding
if (isset ($_SESSION['logged']) and $_SESSION['logged']) {
    stampa_head($titolo, $css);
    if (isset($_GET['indice']) 
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

        $image_string = "./images/img-prodotti/" . $nome. ".png"; 
?>
        <div class='container'>
                <div class = 'img-prodotto'>
                    <?php
                      echo"<img src=\"$image_string\" alt='Product image'>";
                    ?>
                    </div>
        
       <?php 
            echo "<div class='element'"
                    . "<p>$nome</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$linea</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$miscela</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$gusto</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$prezzo</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$calorie</p>"
                . "</div>";
            echo "<div class='element'"
                    . "<p>$descrizione</p>"
                . "</div>";
        echo '</div>'; //close container
    }

        echo '<div class="container">';
            echo '<div class="link">';
                torna_home_page();
            echo '</div>';
        echo '</div>';
        stampa_finehtml();
    
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Credenziali non valide. Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

