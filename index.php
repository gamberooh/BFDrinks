<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include './include/funzioni.inc';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
stampa_head($titolo, $css);
?>

<header>
    <!<!-- menu a tendina -->
</header>

<div class="container">
    <div class="header">
        <h1>BF Drinks</h1>
    </div>
    <div class="item">
        <form id="form1" method="post" action="cercaProdotti.php">
            <span>Nome bibita:</span><input type="text" name="nome" size="50">
            
            <!-- 
            array('nome' => '', 'linea' => '', 'gassata' => '', 'preferita' => '', 'calorie' => 0, 'sede' => '','img-prodotto' => ''),
            -->
            
            <span>Linea</span>
            
            <span>Liscia o gassata:</span>
            
            <span>Preferita della classe:</span>
            
            <span>Calorie</span><input type="number">
            
            <span>Sede</span>
            
        </form>
    </div>
</div>


<footer>
    <div id="banner">
        <div class="scrolling-text">
            Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!
        </div>
    </div>
</footer>

<?php
stampa_finehtml();




