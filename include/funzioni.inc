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

function stampa_prodotti ($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    
    foreach ($prodotti as $i => $info_prodotto) {
        echo "<div>";
        foreach ($prodotti as $i => $info_prodotto) {
            $image_string = "./img-prodotti/" . $info_prodotto['Nome']. ".png";

            echo "<div>"
            
                . "<img src=\"$image_string\" alt='Product image'>"
                . "<div class='product-name'>"
                    . "<p>$info_prodotto[Nome]</p>"
                . "</div>"
                . "<div class='product-link'>"
                    . "<a href='dettagliProdotto.php' />VEDI DETTAGLIO</a>"
                . "</div>"
            . "</div>";
        }
        echo "</div>";
    }
    
}

// stampa prodotti per gli addetti ai lavori
function stampa_prodotti_utility($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>NAME</th><th>LINE</th><th>MIXTURE</th><th>FLAVOUR</th><th>PRICE</th><th>CALORIES</th><th>COLLABORATION</th><th>PRODUCT IMAGE</th></tr>";
    $n = 0;

    foreach ($prodotti as $i => $info_prodotto) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_prodotto[Nome]</td>"
        . "<td class=\"link\"><a href = \"cercaProdotti.php?linea=$info_prodotto[Linea]\" >$info_prodotto[Linea]</a></td>"
        . "<td>$info_prodotto[Miscela]</td>"
        . "<td>$info_prodotto[Gusto]</td>"
        . "<td>$info_prodotto[Prezzo]€</td>"
        . "<td>$info_prodotto[Calorie]</td>"
        . "<td>$info_prodotto[Azienda]</td>";

        if (!file_exists("images\\" . $info_prodotto['Nome'] . ".jpg")) {
            if ($method == 'POST') {
                
                if (isAdmin()) {
                    //se il metodo di richesta è post
                    echo "<td><form method = \"post\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\"/>
                    <input type = \"file\" name= \"fileprodotto\" />";
                   echo "<input type = \"submit\" name= \"carica\" value = \"Carica\" />";
                   echo "</form>"
                 . "</td>";
                }
            } else {
                //se il metodo di richiesta è get
                if (isAdmin()) {
                    echo "<td><form method = \"get\" action = \"caricaImmagine.php\"  enctype=\"multipart/form-data\">
                    <input type = \"hidden\" name = \"Indice\" value = \"$info_prodotto[Indice]\"  accept=\"image/*\">
                    <input type = \"file\" name= \"fileprodotto\">";
                    echo "<input type = \"submit\" name= \"carica\" value = \"Carica\">";
                    echo "</form>"
                    . "</td>";
                }   
            }
        } else {
            echo "<td><a href = \"dettagliProdotto.php?Indice=$info_prodotto[Indice]\" >Info Prodotto</a></td>\n";
        }
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}



// DA MODIFICARE --> usato negli insert
function stampa_classi($classi) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Anno</th><th>Sezione</th><th>Acronimo</th><th>NAlunni</th><th>Aula</th></tr>";
    $n = 0;

    foreach ($classi as $i => $info_classe) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_classe[Classe]</td>"
        . "<td>$info_classe[Sez]</td>"
        . "<td>$info_classe[Acr]</td>"
        . "<td>$info_classe[NAlunni]</td>"
        . "<td>$info_classe[Aula]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

// DA MODIFICARE --> usato negli insert
function stampa_aziende($aziende) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>ID</th><th>Nome</th><th>NTel</th><th>eMail</th></tr>";
    $n = 0;
    foreach ($aziende as $i => $info_aziende) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_aziende[Id]</td>"
        . "<td>$info_aziende[Nome]</td>"
        . "<td>$info_aziende[NTel]</td>"
        . "<td>$info_aziende[eMail]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

// DA MODIFICARE --> usato negli insert
function stampa_ordini($ordini) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>ID</th><th>ID</th><th>QTA</th><th>Data</th><th>Indice Prodotto</th><th>Anno</th><th>Sezione</th><th>Acronimo</th></tr>";
    $n = 0;

    foreach ($ordini as $i => $info_ordini) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_ordini[Id]</td>"
        . "<td>$info_ordini[qta]</td>"
        . "<td>$info_ordini[data]</td>"
        . "<td>$info_ordini[indProdotto]</td>"
        . "<td>$info_ordini[Anno]</td>"
        . "<td>$info_ordini[indProdotto]</td>"
        . "<td>$info_ordini[Sez]</td>"
        . "<td>$info_ordini[Acr]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

// DA MODIFICARE --> usato negli insert
function stampa_prodotti2($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Indice</th><th>Nome</th><th>Linea</th><th>Miscela</th><th>Calorie</th><th>Collaborazione</th></tr>";
    $n = 0;

    foreach ($prodotti as $i => $info_prodotti) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_prodotti[Indice]</td>"
        . "<td>$info_prodotti[Nome]</td>"
        . "<td>$info_prodotti[Linea]</td>"
        . "<td>$info_prodotti[Miscela]</td>"
        . "<td>$info_prodotti[Calorie]</td>"
        . "<td>$info_prodotti[Collab]</td>";
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

// DOVREBBE ESSERE COMPLETA, controllare una volta che è stato gestito L'ACCESSO con form
function isAccessValid() {
    
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method == 'POST'){
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    $validation = false;
    
    // La query dovrà controllare che username e pswd inseriti facciano parte del db
    if (isset($input['Username']) && isset($input['Pswd'])) {
    // Ottieni le credenziali inserite dall'utente
        
        $sql = "SELECT Username, Pswd, Nome, Cognome, Ruolo
                FROM UTENTE 
                WHERE (Username = :Username) AND (Pswd = :Pswd);";
        
        $bind = null;
        $bind['Username']['val'] = $input['Username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;
        $bind['Pswd']['val'] = $input['Pswd'];
        $bind['Pswd']['tipo'] = PDO::PARAM_STR;
        /*
        $bind['Nome']['val'] = $input['Nome'];
        $bind['Nome']['tipo'] = PDO::PARAM_STR;
        $bind['Cognome']['val'] = $input['Cognome'];
        $bind['Cognome']['tipo'] = PDO::PARAM_STR;
        $bind['Ruolo']['val'] = $input['Ruolo'];
        $bind['Ruolo']['tipo'] = PDO::PARAM_STR;
        */
        $user = esegui_query_con_bind($sql, $bind); 
        
        // Credenziali corrette, autentica l'utente utilizzando una variabile di sessione solo le variabili necessarie
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user[0]['Username'];
        $_SESSION['nome'] = $user[0]['Nome'];
        $_SESSION['cognome'] = $user[0]['Cognome'];
        $_SESSION['ruolo'] = $user[0]['Ruolo'];
        
        // Imposta un cookie per ricordare l'utente per un giorno
        setcookie('remember_user', $user[0]['Username'], time() + (24 * 60 * 60));
        $validation = true;

    } else if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { 
        $validation = true;
    }
    return $validation;
}

// parto col presupposto che L'UTENTE SIA GIA LOGGATO
// (potere dell'utente) funzione utilizzata per il controllo per la modifica delle immagini
function isAdmin(){
    
    //include 'connection.php';
    $method = $_SERVER['REQUEST_METHOD'];
    
    if($method = 'POST'){
        $input = $_POST;
    } else {
        $input = $_GET;
    }
    
    $isAdmin = false;
    
    if ( $_SESSION['logged_in'] and $_SESSION['ruolo'] == 'superuser') {
        $isAdmin = true;
    }
    
    return $isAdmin;
}
