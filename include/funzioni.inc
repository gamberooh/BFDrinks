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
 
function stampa_prodotti($squadre){
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NOME</th><th>CITTÀ</th><th>COLORI MAGLIA</th><th>ANNO FONDAZIONE</th><th>PRESIDENTE</th><th>PAESE PROPRIETA</th><th>SCUDETTI</th><th>PUNTI</th><th>STEMMA</th></tr>";
        $n=0;
        //scorro ogni squadra e ciascuna squadra diventa info_squadra
        /*
        foreach($squadre as $i => $info_squadra){
            $n++;
            echo "<tr><td>$n</td>";
            echo "<td>$info_squadra[nome_squadra]</td>"
               ."<td><a href = \"cercaSquadre.php?citta=$info_squadra[citta]\">$info_squadra[citta]</a></td>";
            
            $colori = $info_squadra['colori'];
            $stringa_colori = '';
            for($j = 0; $j < count($colori); $j++){
                if($j != count($colori) - 1){
                    $stringa_colori .= "$colori[$j], ";
                }else{
                    $stringa_colori .= "$colori[$j]";
                }
            }//gestione dei colori (array interno)
            echo"<td>$stringa_colori</td>";
            echo "<td>$info_squadra[anno_fondazione]</td>"
                    . "<td>$info_squadra[presidente]</td>"
                    . "<td><a href = \"cercaSquadre.php?paese=$info_squadra[paese]\">$info_squadra[paese]</a></td>"
                    . "<td>$info_squadra[scudetti]</td>"
                    . "<td>$info_squadra[punti]</td>";
            
            if(!file_exists("images\\" .$info_squadra['nome_squadra']. ".jpg")){
                if($method == 'POST'){
                    echo "<td><form method = \"post\" action = \"caricaStemma.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_squadra[indice]\" />
                    <input type = \"file\" name= \"filestemma\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
                }else{
                    echo "<td><form method = \"get\" action = \"caricaStemma.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_squadra[indice]\" />
                    <input type = \"file\" name= \"filestemma\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
                }
                
            }else{
                echo "<td><a href = \"dettagliSquadra.php?indice=$info_squadra[indice]\">Info squadra</a></td>\n";
            }
        }//tabella stampata in modo completo
        echo "</table>";
         * 
         */
}
