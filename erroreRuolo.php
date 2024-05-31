<?php

include './include/funzioni.inc';
$css = "./styles/myStyle.css";
stampa_head('ERROR', $css);

echo '<h1 class="header">YOU DON\'T HAVE PERMISSION!!</h1>';

echo "<div class='link' align='center'><a href = \"cercaProdotti.php\">TORNA AL CATALOGO</a></div>";
stampa_finehtml();

