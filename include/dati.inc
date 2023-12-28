<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$prodotti = [
    array('nome' => 'EnerLITE Fusion ', 'linea' => 'light', 'gusto' => array('Frutta Tropicale'), 'gassata' => 'Gassata', 'acquistata' => array('1CI', '4CI'), 'calorie' => 24, 'collab' => 'Yoga' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'ZeroCharge Mint', 'linea' => 'light', 'gusto' => array('Limone', 'Menta'), 'gassata' => 'Gassata', 'acquistata' => array('2CI','3CI','4CI'), 'calorie' => 10, 'collab' => 'Mentos' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'PureVibe Spark', 'linea' => 'light', 'gusto' => array('Ciliegia'), 'gassata' => 'Liscia', 'acquistata' => array('1CI'), 'calorie' => 35, 'collab' => '#N/D' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'CalorieCrush Essence', 'linea' => 'light', 'gusto' => array('Arancia'), 'gassata' => 'Gassata', 'acquistata' => array('3CI','5CI'), 'calorie' => 3, 'collab' => 'Coke' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'RefreshZero Burst', 'linea' => 'light', 'gusto' => array('Melograno', 'Frutti di Bosco'), 'gassata' => 'Liscia', 'acquistata' => array('2CI','3CI'), 'calorie' => 12, 'collab' => 'Skipper' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'PureBurst Revive', 'linea' => 'light', 'gusto' => array('Frutta Tropicale', 'Frutti di Bosco'), 'gassata' => 'Liscia', 'acquistata' => array('1CI','2CI','4CI','5CI'), 'calorie' => 35, 'collab' => 'Yoga' , 'indice' => '', 'img-prodotto' => ''),
    array('nome' => 'VitalWave Harmony', 'linea' => 'light', 'gusto' => array('Limone', 'Arancia'), 'gassata' => 'Liscia', 'acquistata' => array('1CI','4CI','5CI'), 'calorie' => 2, 'collab' => 'Coke' , 'indice' =>0, 'img-prodotto' => ''),
    array('nome' => 'MegaFuel Surge', 'linea' => 'strong', 'gusto' => array('Frutti di Bosco'), 'gassata' => 'Gassata', 'acquistata' => array('5CI'), 'calorie' => 450, 'collab' => 'Skipper' , 'indice' =>0, 'img-prodotto' => ''),
    array('nome' => 'PowerPunch Intensity', 'linea' => 'strong', 'gusto' => array('Frutti di Bosco', 'Mirtillo'), 'gassata' => 'Liscia', 'acquistata' => array('3CI','4CI','5CI'), 'calorie' => 150, 'collab' => 'Skipper' , 'indice' => 0, 'img-prodotto' => ''),
    array('nome' => 'XtremeVital Blitz', 'linea' => 'strong', 'gusto' => array('Limone', 'Arancia', 'Bergamotto'), 'gassata' => 'Gassata', 'acquistata' => array('1CI', '2CI', '3CI'), 'calorie' => 95, 'collab' => 'Yoga' , 'indice' =>0 , 'img-prodotto' => ''),
    array('nome' => 'TurboThirst Revolt', 'linea' => 'strong', 'gusto' => array('Cola'), 'gassata' => 'Gassata', 'acquistata' => array('4CI','5CI'), 'calorie' => 500, 'collab' => 'Coke' , 'indice' =>0 , 'img-prodotto' => ''),
    array('nome' => 'CoffeePower Surge', 'linea' => 'strong', 'gusto' => array('Caffè'), 'gassata' => 'Liscia', 'acquistata' => array('1CI','2CI','3CI','4CI','5CI'), 'calorie' => 106, 'collab' => 'Lavazza' , 'indice' =>0 , 'img-prodotto' => ''),
    array('nome' => 'MegaVortex Fury', 'linea' => 'strong', 'gusto' => array('Kiwi', 'Bergamotto'), 'gassata' => 'Gassata', 'acquistata' => array('1CI','5CI'), 'calorie' => 230, 'collab' => '#N/D' , 'indice' =>0 , 'img-prodotto' => ''),
    array('nome' => 'ThunderFuel Storm', 'linea' => 'strong', 'gusto' => array('Ananas', 'Frutta Tropicale'), 'gassata' => 'Gassata', 'acquistata' => array('2CI','3CI','5CI'), 'calorie' => 332, 'collab' => '#N/D' , 'indice' =>0 , 'img-prodotto' => ''), 
];

$classi = ['1CI', '2CI', '3CI', '4CI', '5CI'];

$collab = ['Coke', 'Lavazza', 'Skipper', 'Yoga', 'Mentos'];

$gusti = ['Frutta Tropicale', 'Frutti di Bosco', 'Limone', 'Menta','Ciliegia', 'Melograno', 'Arancia', 'Mirtillo', 'Bergamotto', 'Cola', 'Caffè', 'Kiwi', 'Ananas'];