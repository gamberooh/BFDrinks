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
    ad_banner("images/img-annunci/annuncio_zenzerozero.png");
    ad_banner("images/img-annunci/annuncio_powerboom.png");
    ad_banner("images/img-annunci/annuncio_zuccherofilato.png");
    ad_banner("images/img-annunci/annuncio_tropical.png");
    echo "</div>";
} else {
    torna_login();
}
?>
<?php

stampa_finehtml();

