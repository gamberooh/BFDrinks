
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

//array: gusti, classi
function stampa_prodotti($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NOME</th><th>LINEA</th><th>MISCELA GUSTO</th><th>CLASSE</th><th>CALORIE</th><th>COLLABORAZIONE</th><th>IMMAGINE PRODOTTO</th></tr>";
    $n = 0;

    foreach ($prodotti as $i => $info_prodotto) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_prodotto[Nome]</td>"
        . "<td class=\"link\"><a href = \"cercaProdotti.php?linea=$info_prodotto[Linea]\" >$info_prodotto[Linea]</a></td>"
        . "<td>$info_prodotto[Miscela]</td>"
        . "<td>$info_prodotto[Classe]</td>"
        . "<td>$info_prodotto[Calorie]</td>"
        . "<td>$info_prodotto[Collab]</td>";

        if (!file_exists("images\\" . $info_prodotto['Nome'] . ".jpg")) {
            if ($method == 'POST') {
                
                if (isAdmin()) {
                    //se il metodo di richesta è post
                    echo "<td><form method = \"post\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\"/>
                    <input type = \"file\" name= \"fileprodotto\" />";
                   echo "<input type = \"submit\" name= \"carica\" value = \"Carica\" />";
                } else {
                    echo "<td><form method = \"post\" action = \"erroreRuolo.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\">
                    <input type = \"file\" name= \"fileprodotto\">";
                   echo "<input type = \"submit\" name= \"carica\" value = \"Carica\">"; 
                }
                echo "</form>"
                . "</td>";
            } else {
                //se il metodo di richiesta è get
                if (isAdmin()) {
                    echo "<td><form method = \"get\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\">
                    <input type = \"file\" name= \"fileprodotto\">";
                   echo "<input type = \"submit\" name= \"carica\" value = \"Carica\">";
                } else {
                    echo "<td><form method = \"get\" action = \"erroreRuolo.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\">
                    <input type = \"file\" name= \"fileprodotto\">";
                   echo "<input type = \"submit\" name= \"carica\" value = \"Carica\">"; 
                }
                echo "</form>"
                    . "</td>";
            }
        } else {
            echo "<td><a href = \"dettagliProdotto.php?Indice=$info_prodotto[Indice]\" >Info Prodotto</a></td>\n";
        }
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}


function stampa_classi($classi) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Anno</th><th>Sezione</th><th>Acronimo</th><th>NAlunni</th><th>Aula</th></tr>";
    $n = 0;

    foreach ($classi as $i => $info_classe) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_classe[Anno]</td>"
        . "<td>$info_classe[Sez]</td>"
        . "<td>$info_classe[Acr]</td>"
        . "<td>$info_classe[NAlunni]</td>"
        . "<td>$info_classe[Aula]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

function stampa_catalogo($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NOME</th><th>LINEA</th><th>MISCELA GUSTO</th><th>CLASSE</th><th>CALORIE</th><th>COLLABORAZIONE</th></tr>";
    $n = 0;

    foreach ($prodotti as $i => $info_prodotto) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_prodotto[Nome]</td>"
        . "<td class=\"link\"><a href = \"cercaProdotti.php?linea=$info_prodotto[Linea]\" >$info_prodotto[Linea]</a></td>"
        . "<td>$info_prodotto[Miscela]</td>"
        . "<td>$info_prodotto[Classe]</td>"
        . "<td>$info_prodotto[Calorie]</td>"
        . "<td>$info_prodotto[Collab]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

function torna_home_page() {
    echo "<div><a href = \"index.php\">TORNA ALL'INDICE</a></div>";
}

function torna_login() {
    echo "<div><a href = \"login.php\">TORNA ALLA PAGINA DI LOGIN</a></div>";
}

function isAccessValid() {
    include 'dati.inc';
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method == 'POST'){
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    $validation = false;
    
    if (isset($input['username']) && isset($input['password'])) {
    // Ottieni le credenziali inserite dall'utente
    $username = $input['username'];
    $password = $input['password'];
        if (isset($utenti[$username]) && ($utenti[$username]['password'] == $password)){
           // Credenziali corrette, autentica l'utente utilizzando una variabile di sessione
           $_SESSION['logged_in'] = true;
           $_SESSION['username'] = $username;
           $_SESSION['nome'] = $utenti[$username]['nome'];
           $_SESSION['cognome'] = $utenti[$username]['cognome'];
           $_SESSION['ruolo'] = $utenti[$username]['ruolo'];
           // Imposta un cookie per ricordare l'utente per un giorno
           setcookie('remember_user', $username, time() + (24 * 60 * 60));
           $validation = true;
       }//fine login corretto
    } else if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $validation = true;
    }
    return $validation;
}
// (potere dell'utente) funzione utilizzata per il controllo per la modifica delle immagini
function isAdmin(){
    
    include 'dati.inc';
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method = 'POST'){
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    $isAdmin = false;
    if (isset($_SESSION['username']) and $_SESSION['ruolo'] == 'admin') {
        $isAdmin = true;
    }
    return $isAdmin;
}

/*
function calorieinferiori($prodotti, $valore_calorie) {
    $risultati = array();

    foreach ($prodotti as $dettaglioProdotto) {
        if (isset($dettaglioProdotto['calorie']) && $dettaglioProdotto['calorie'] <= $valore_calorie) {
            $risultati[] = $dettaglioProdotto;
        }
    }
    return $risultati;
}
*/