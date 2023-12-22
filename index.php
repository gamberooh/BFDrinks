<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include './include/funzioni.inc';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
stampa_head($titolo, $css);

echo "<h1>BF Drinks</h1>";
echo '<footer>
    <div id="banner">
        <div class="scrolling-text">
            Dal Belluzzi per il Belluzzi, le bibite energetiche che ti fanno stare attento ad ogni lezione!
        </div>
    </div>
</footer>';

stampa_finehtml();




