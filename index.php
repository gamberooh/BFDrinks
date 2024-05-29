<?php

session_start();
include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
$classebody = "index-page";
$script = './scripts/controlloErrori.js';

stampa_head($titolo, $css, $classebody);
include_script($script);

if (check_login(isAdmin())) {

    echo "<div class=\"annunci\">";
    // Il secondo parametro è l'indice
    // x Deme: inserire i gusti corretti del 2, 3 e 4 banner (non li conosco)
    ad_banner("images/img-annunci/annuncio_tropical.png", 17);
    ad_banner("images/img-annunci/annuncio_powerboom.png", 18);
    ad_banner("images/img-annunci/annuncio_zenzerozero.png", 9);

    ad_banner("images/img-annunci/annuncio_zuccherofilato.png", 16);

    echo "</div>";
} else {
    torna_login();
}
?>
<?php

stampa_finehtml();

