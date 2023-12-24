<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/*
 * Dati:
nome
gusto
linea(strong o light) --> radio
gassata(si o no)
acquistata della classe: 5ci, 4ci ecc. (menu a tendina)
calorie (checkbox)
sede di produzione(in caso lo facciamo è da cambiare l’organigramma)
 * 
Linea Light:
ZenBoost Elixir (Gusto: Pesca Serena)
VitalWave Harmony (Gusto: Limetta Fresca)
RadiantFuel Essence (Gusto: Zenzero Radiante)


Linea Strong:
TurboThirst Revolt (Gusto: Cola Shock)
HyperDrive Ignition (Gusto: Mela Cannella Ardente)
ThunderFuel Storm (Gusto: Ananas Tempesta)
UltraIgnite Blaze (Gusto: Frutto della Passione Ardente)
MegaVortex Fury (Gusto: Kiwi Vorticoso)
InfernoPower Surge (Gusto: Caffè Espresso)
TurboFusion Burst (Gusto: Limone Piccante)

 */

$prodotti = array(
    array('nome' => 'EnerLITE Fusion ', 'linea' => 'light', 'gusto' => array('Frutta tropicale'), 'gassata' => 'gassata', 'acquistata' => array('1CI', '4CI'), 'calorie' => 24, 'collab' => 'Yoga' , 'img-prodotto' => ''),
    array('nome' => 'ZeroCharge Mint', 'linea' => 'light', 'gusto' => array('Limone', 'Menta'), 'gassata' => 'gaassata', 'acquistata' => array('2CI','3CI','4CI'), 'calorie' => 10, 'collab' => 'Mentos' , 'img-prodotto' => ''),
    array('nome' => 'PureVibe Spark', 'linea' => 'light', 'gusto' => array('Ciliegia'), 'gassata' => 'liscia', 'acquistata' => array('1CI'), 'calorie' => 35, 'collab' => '' , 'img-prodotto' => ''),
    array('nome' => 'CalorieCrush Essence', 'linea' => 'light', 'gusto' => array('Arancia'), 'gassata' => 'gassata', 'acquistata' => array('3CI','5CI'), 'calorie' => 3, 'collab' => 'Coke' , 'img-prodotto' => ''),
    array('nome' => 'RefreshZero Burst', 'linea' => 'light', 'gusto' => array('Melograno', 'Frutti di bosco'), 'gassata' => 'liscia', 'acquistata' => array('2CI','3CI'), 'calorie' => 12, 'collab' => 'Skipper' , 'img-prodotto' => ''),
    array('nome' => 'PureBurst Revive', 'linea' => 'light', 'gusto' => array('Frutta tropicale', 'Frutti di Bosco'), 'gassata' => 'liscia', 'acquistata' => array('1CI','2CI','4CI','5CI'), 'calorie' => 35, 'collab' => 'Yoga' , 'img-prodotto' => ''),
    array('nome' => 'VitalWave Harmony', 'linea' => 'light', 'gusto' => array('Limone', 'Arancia'), 'gassata' => 'liscia', 'acquistata' => array('1CI','4CI','5CI'), 'calorie' => 2, 'collab' => 'Coke' , 'img-prodotto' => ''),
    
    array('nome' => 'MegaFuel Surge', 'linea' => 'strong', 'gusto' => array('Frutti di Bosco'), 'gassata' => 'gassata', 'acquistata' => array('5CI'), 'calorie' => 450, 'collab' => 'Skipper' , 'img-prodotto' => ''),
    array('nome' => 'PowerPunch Intensity', 'linea' => 'strong', 'gusto' => array('Frutti di Bosco', 'Mirtillo'), 'gassata' => 'liscia', 'acquistata' => array('3CI','4CI','5CI'), 'calorie' => 150, 'collab' => 'Skipper' , 'img-prodotto' => ''),
    array('nome' => 'XtremeVital Blitz', 'linea' => 'strong', 'gusto' => array('Limone', 'Arancia', 'Bergamotto'), 'gassata' => 'gassata', 'acquistata' => array('1CI', '2CI', '3CI'), 'calorie' => 95, 'collab' => 'Yoga' , 'img-prodotto' => ''),
    array('nome' => 'TurboThirst Revolt', 'linea' => 'strong', 'gusto' => array('Cola'), 'gassata' => 'gassata', 'acquistata' => array('4CI','5CI'), 'calorie' => 500, 'collab' => 'Coke' , 'img-prodotto' => ''),
    array('nome' => '', 'linea' => '', 'gusto' => array(), 'gassata' => '', 'acquistata' => array(), 'calorie' => 0, 'collab' => '' , 'img-prodotto' => ''),
    array('nome' => '', 'linea' => '', 'gusto' => array(), 'gassata' => '', 'acquistata' => array(), 'calorie' => 0, 'collab' => '' , 'img-prodotto' => ''),
    array('nome' => '', 'linea' => '', 'gusto' => array(), 'gassata' => '', 'acquistata' => array(), 'calorie' => 0, 'collab' => '' , 'img-prodotto' => ''),
    
);

$classi = array('1CI', '2CI', '3CI', '4CI', '5CI');

$collab = array('Coke', 'Lavazza', 'Skipper', 'Yoga', 'Mentos');

$gusti = array('Frutta tropicale', 'Frutti di bosco', 'Limone', 'Menta','Ciliegia', 'Melograno', 'Arancia', 'Mirtillo', 'Bergamotto', 'Cola');