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

check_login(isAdmin());

ad_banner("images/img-annunci/annuncio_zenzerozero.png");
ad_banner("images/img-annunci/annuncio_powerboom.png");
ad_banner("images/img-annunci/annuncio_zuccherofilato.png");
ad_banner("images/img-annunci/annuncio_tropical.png");
?>
<?php
stampa_finehtml();

