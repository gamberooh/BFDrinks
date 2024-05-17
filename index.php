<?php

session_start();
include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css;';
$script = './scripts/controlloErrori.js';

stampa_head($titolo, $css);
include_script($script);

check_login(isAdmin());
stampa_finehtml();

