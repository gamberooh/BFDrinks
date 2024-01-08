<?php

function stampa_head($titolo, $css, $classebody = '') {
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
function stampa_finehtml() {
    echo "</body></html>";
}

function include_script($script) {
    echo "<script src='$script'></script>";
}

function torna_home_page() {
    echo "<div><a href = \"index.php\">TORNA ALL'INDICE</a></div>";
}

//array: gusti, classi
function stampa_prodotti($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NOME</th><th>LINEA</th><th>GUSTO</th><th>TIPO MISCELA</th><th>ACQUISTATA DA</th><th>CALORIE</th><th>COLLABORAZIONE</th><th>IMMAGINE PRODOTTO</th></tr>";
    $n = 0;

    foreach ($prodotti as $i => $info_prodotto) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_prodotto[nome]</td>"
        . "<td class=\"link\"><a href = \"cercaProdotti.php?linea=$info_prodotto[linea]\" >$info_prodotto[linea]</a></td>";

        $gusto = $info_prodotto['gusto'];
        $stringa_gusto = '';
        for ($j = 0; $j < count($gusto); $j++) {
            if ($j != count($gusto) - 1) {
                $stringa_gusto .= "$gusto[$j], ";
            } else {
                $stringa_gusto .= "$gusto[$j]";
            }
        }//gestione del gusto (array interno)
        echo"<td>$stringa_gusto</td>" .
                "<td class=\"link\"><a href = \"cercaProdotti.php?gassata=$info_prodotto[gassata]\" >$info_prodotto[gassata]</a></td>";
        $classi = $info_prodotto['acquistata'];
        $stringa_classi = '';
        for ($j = 0; $j < count($classi); $j++) {
            if ($j != count($classi) - 1) {
                $stringa_classi .= "$classi[$j], ";
            } else {
                $stringa_classi .= "$classi[$j]";
            }
        }//gestione delle classi (array interno)

        echo "<td>$stringa_classi</td>"
        . "<td>$info_prodotto[calorie]</td>"
        . "<td>$info_prodotto[collab]</td>";

        if (!file_exists("images\\" . $info_prodotto['nome'] . ".jpg")) {
            if ($method == 'POST') {
                echo "<td><form method = \"post\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_prodotto[indice]\"  accept=\"image/*\"/>
                    <input type = \"file\" name= \"fileprodotto\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
            } else {
                echo "<td><form method = \"get\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"indice\" value = \"$info_prodotto[indice]\" accept=\"image/*\"/>
                    <input type = \"file\" name= \"fileprodotto\" />
                    <input type = \"submit\" name= \"carica\" value = \"Carica\" />
                    </form>
                    </td>";
            }
        } else {
            echo "<td><a href = \"dettagliProdotto.php?indice=$info_prodotto[indice]\" >Info Prodotto</a></td>\n";
        }
    }//tabella stampata in modo completo
    echo "</table>";
}

function calorie_inferiori($prodotti, $valore_calorie) {
    $risultati = array();

    foreach ($prodotti as $dettaglioProdotto) {
        if (isset($dettaglioProdotto['calorie']) && $dettaglioProdotto['calorie'] <= $valore_calorie) {
            $risultati[] = $dettaglioProdotto;
        }
    }
    
    return $risultati;
}
