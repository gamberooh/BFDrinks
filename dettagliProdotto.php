<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


    include './include/funzioni.inc';
    include './include/dati.inc';
    $css = './styles/myStyle.css';
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method == 'POST')
        $input = $_POST;
    else
        $input = $_GET;
    
    $infoProdotto = $prodotti[$input['indice']];
    $titolo = "Profilo " . $infoProdotto['nome_squadra'];
    stampa_head($titolo, $css);  
    echo "<h1 class=\"header\">$titolo</h1>";
    echo '<div class="container">';
        echo '<div class="item">';
            $gusto = $infoProdotto['gusto'];
            $stringa_gusto = '';
            for($j = 0; $j < count($gusto); $j++){
                if($j != count($gusto) - 1){
                    $stringa_gusto .= "$gusto[$j], ";
                }else{
                    $stringa_gusto .= "$gusto[$j]";
                }
            }//gestione del gusto (array interno)

            $classi = $infoProdotto['acquistata'];
            $stringa_classi = '';
            for($j = 0; $j < count($classi); $j++){
                if($j != count($classi) - 1){
                    $stringa_classi .= "$classi[$j], ";
                }else{
                    $stringa_classi .= "$classi[$j]";
                }
            }//gestione delle classi (array interno)
//NOME	LINEA	GUSTO	TIPO MISCELA	ACQUISTATA DA	CALORIE	COLLABORAZIONE	IMMAGINE PRODOTTO

            print "<h2>$infoProdotto[nome]</h2>";
            echo "<p><b>Anno di fondazione:</b> $infoProdotto[anno_fondazione]</p>"
                    . "<p>Prodotto della linea $infoProdotto[linea]</p>"
                    . "<p>Gusto: $stringa_gusto</p>"
                    . "<p>Bevanda di tipo: $infoProdotto[gassata]</p>"
                    . "<p>Acquistata da: $stringa_classi</p>"
                    . "<p>Calorie: $infoProdotto[calorie]</p>";
            if($infoPododotto['collab'] != '') {
                echo "<p>Collaborazione: $infoPododotto[collab]</p>";
            }

            echo  "<b>Stemma:</b><p><img src=\"./images/{$infoProdotto['nome']}.jpg\" class = \"\"/></p>";
        echo '</div>'; //close item
    echo '</div>'; //close container       
    
    torna_home_page();
    stampa_finehtml();
