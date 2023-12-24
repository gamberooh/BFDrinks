<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function stampa_head($titolo, $css, $classebody =''){
    echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>$titolo</title>";
    if (!empty($css))
        echo "<link rel=\"stylesheet\" href=\"$css\">";
    
    echo "
    </head>
    <body class = \"$classebody\">";
}
//ho splittato le due funzioni perché nell'index non serve a nulla torna_home_page()   
function stampa_finehtml(){
    echo "</body></html>";
}

function include_script($script){
    echo "<script src='$script'></script>";
}

function torna_home_page(){
    echo "<div><a href = \"index.php\">TORNA ALL'INDICE</a></div>";
}
//array: gusti, classi
function stampa_prodotti($prodotti){
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NOME</th><th>LINEA</th><th>GUSTO</th><th>TIPO MISCELA</th><th>ACQUISTATA DA</th><th>CALORIE</th><th>COLLABORAZIONE</th><th>IMMAGINE PRODOTTO</th></tr>";
        $n=0;
        
        foreach($prodotti as $i => $info_prodotto){
            $n++;
            echo "<tr><td>$n</td>";
            echo "<td>$info_prodotto[nome]</td>"
               ."<td><a href = \"cercaProdotti.php?linea=$info_prodotto[linea]\">$info_prodotto[linea]</a></td>";
            
            $gusto = $info_prodotto['gusto'];
            $stringa_gusto = '';
            for($j = 0; $j < count($gusto); $j++){
                if($j != count($gusto) - 1){
                    $stringa_gusto .= "$gusto[$j], ";
                }else{
                    $stringa_gusto .= "$gusto[$j]";
                }
            }//gestione del gusto (array interno)
            echo"<td>$stringa_gusto</td>".
                    "<td>$info_prodotto[gassata]</td>";
            $classi = $info_prodotto['acquistata'];
            $stringa_classi = '';
            for($j = 0; $j < count($classi); $j++){
                if($j != count($classi) - 1){
                    $stringa_classi .= "$classi[$j], ";
                }else{
                    $stringa_classi .= "$classi[$j]";
                }
            }//gestione delle classi (array interno)
            
            echo "<td>$stringa_classi</td>"
                . "<td>$info_prodotto[calorie]</td>"
                . "<td>$info_prodotto[collab]</td>";

                     
            if(!file_exists("images\\" .$info_prodotto['nome']. ".jpg")){
                if($method == 'POST'){
                    echo "<td><form method = \"post\" action = \"caricaProdotti.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_prodotto[indice]\" />
                    <input type = \"file\" name= \"fileprodotto\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
                }else{
                    echo "<td><form method = \"get\" action = \"caricaStemma.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_prodotto[indice]\" />
                    <input type = \"file\" name= \"filestemma\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
                }
                
            }else{
                echo "<td><a href = \"dettagliSquadra.php?indice=$info_prodotto[indice]\">Info squadra</a></td>\n";
            }
             
        }//tabella stampata in modo completo
        echo "</table>";
         
}
