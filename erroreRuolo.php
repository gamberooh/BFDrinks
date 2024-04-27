<?php

include './include/funzioni.inc';
$css = "./styles/myStyle.css";
stampa_head('Errore', $css);

echo '<h1 class="header">NON HAI I PERMESSI PER CARICARE L IMMAGINE</h1>';

echo "<div class='link' align='center'><a href = \"cercaProdotti.php\">TORNA AL CATALOGO</a></div>";
stampa_finehtml();

