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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

function stampa_prodotti($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];

    echo "<div>";
    foreach ($prodotti as $i => $info_prodotto) {
        // $_SESSION['info-prodotto'] = $info_prodotto;
        $indice_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
        $nome_prodotto_url_encoded = urlencode($info_prodotto['Nome']);
        $linea_prodotto_url_encoded = urlencode($info_prodotto['Linea']);
        $miscela_prodotto_url_encoded = urlencode($info_prodotto['Miscela']);
        $gusto_prodotto_url_encoded = urlencode($info_prodotto['Gusto']);
        $prezzo_prodotto_url_encoded = urlencode($info_prodotto['Prezzo']);
        $calorie_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
        $descrizione_prodotto_url_encoded = urlencode($info_prodotto['Descrizione']);
        $image_string = "./images/img-prodotti/" . $info_prodotto['Nome'] . ".png";
        echo "<div>"
        . "<img src=\"$image_string\" alt='Product image'>"
        . "<div class='product-name'>"
        . "<p>$info_prodotto[Nome]</p>"
        . "</div>"
        . "<div class='product-link'>"
        . "<a href='dettagliProdotto.php"
        . "?indice=$indice_prodotto_url_encoded"
        . "&nome=$nome_prodotto_url_encoded"
        . "&linea=$linea_prodotto_url_encoded"
        . "&miscela=$miscela_prodotto_url_encoded"
        . "&gusto=$gusto_prodotto_url_encoded"
        . "&prezzo=$prezzo_prodotto_url_encoded"
        . "&calorie=$calorie_prodotto_url_encoded"
        . "&descrizione=$descrizione_prodotto_url_encoded'>SHOW DETAILS</a>"
        . "</div>"
        . "<div class='button'>"
        . "<button>+</button>"
        . "</div>"
        . "</div>";
    }
    echo "</div>";
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

function stampa_classi($classi) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Classe</th>th>Aula</th><th>NAlunni</th></tr>";
    $n = 0;
    foreach ($classi as $i => $info_classe) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_classe[Classe]</td>"
        . "<td>$info_classe[Aula]</td>"
        . "<td>$info_classe[NAlunni]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

function stampa_aziende($aziende) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>ID</th><th>Name</th><th>Telephone</th><th>Email</th></tr>";
    $n = 0;
    foreach ($aziende as $i => $info_aziende) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_aziende[Id]</td>"
        . "<td>$info_aziende[Nome]</td>"
        . "<td>$info_aziende[Telefono]</td>"
        . "<td>$info_aziende[Email]</td>";
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
        . "<td>$info_prodotti[Gusto]</td>"
        . "<td>€$info_prodotti[Prezzo]</td>"
        . "<td>$info_prodotti[Calorie]</td>"
        . "<td>$info_prodotti[Azienda]</td>"
        . "<td>$info_prodotti[Descrizione]</td>";
        echo "</tr>";
    }//tabella stampata in modo completo
    echo "</table>";
}

function stampa_catalogo($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];

    echo "<div>";
    foreach ($prodotti as $i => $info_prodotto) {
        // $_SESSION['info-prodotto'] = $info_prodotto;
        $indice_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
        $nome_prodotto_url_encoded = urlencode($info_prodotto['Nome']);
        $linea_prodotto_url_encoded = urlencode($info_prodotto['Linea']);
        $miscela_prodotto_url_encoded = urlencode($info_prodotto['Miscela']);
        $gusto_prodotto_url_encoded = urlencode($info_prodotto['Gusto']);
        $prezzo_prodotto_url_encoded = urlencode($info_prodotto['Prezzo']);
        $calorie_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
        $descrizione_prodotto_url_encoded = urlencode($info_prodotto['Descrizione']);
        $image_string = "../images/img-prodotti/" . $info_prodotto['Nome'] . ".png";
        echo "<div>"
        . "<img src=\"$image_string\" alt='Product image'>"
        . "<div class='product-name'>"
        . "<p>$info_prodotto[Nome]</p>"
        . "</div>"
        . "<div class='product-link'>"
        . "<a href='../dettagliProdotto.php"
        . "?indice=$indice_prodotto_url_encoded"
        . "&nome=$nome_prodotto_url_encoded"
        . "&linea=$linea_prodotto_url_encoded"
        . "&miscela=$miscela_prodotto_url_encoded"
        . "&gusto=$gusto_prodotto_url_encoded"
        . "&prezzo=$prezzo_prodotto_url_encoded"
        . "&calorie=$calorie_prodotto_url_encoded"
        . "&descrizione=$descrizione_prodotto_url_encoded'>SHOW DETAILS</a>"
        . "</div>"
        . "<div class='button'>"
        . "<button>+</button>"
        . "</div>"
        . "</div>";
    }
    echo "</div>";
}

function torna_home_page() {
    echo "<div><a href = \"index.php\">TORNA ALL'INDICE</a></div>";
}

function torna_login() {
    echo "<div>
            <h1>YOU HAVEN'T LOGGED IN YET</h1>  
            <a href=\"login.php\">GO BACK TO LOG-IN</a>
        </div>";
}

function check_login($isAdmin) {
    if (!empty($_SESSION) and array_key_exists("logged", $_SESSION)) {
        if ($_SESSION["logged"]) {
            if ($isAdmin) {
                navbar_admin();
                return true;
            } else {
                navbar_user();
                return true;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// DOVREBBE ESSERE COMPLETA, controllare una volta che è stato gestito L'ACCESSO con form
// parto col presupposto che L'UTENTE SIA GIA LOGGATO
// (potere dell'utente) funzione utilizzata per il controllo per la modifica delle immagini
function isAdmin() {
    //include 'connection.php';
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method = 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

    $isAdmin = false;

    if (!empty($_SESSION) and array_key_exists("logged", $_SESSION)) {
        if ($_SESSION['logged'] and $_SESSION['Ruolo'] == 'superuser') {
            $isAdmin = true;
        }
    }
    return $isAdmin;
}

//NAVBAR PER UTENTI
function navbar_user() {
    echo"
        <div class=\"navbar\">
            <div class=\"navbar-left\">
                <img> <!--immagine azienda-->
                <a href='./pages/catalogo_prodotti.php'>CATALOGUE</a>
                <form id='form-ricerca' method='post' action='cercaProdotti.php'>
                    <select name='Gusto' value='Gusto'>
                        <option value=''>Flavours</option>";
    $sql_gusto = "SELECT Gusto FROM prodotto;";
    $prodotti = esegui_query($sql_gusto);
    for ($i = 0; $i < count($prodotti); $i++) {
        $val = $prodotti[$i]['Gusto'];
        echo "<option value=\"$val\">$val</option>";
    }
    echo '</select>
                    <select name = "Azienda" value = "Azienda">
                        <option value = "">Collaboration</option>
                        <option value = \"NULL\">None</option>';

    $sql_azienda = "SELECT Nome FROM azienda;";
    $prodotti = esegui_query($sql_azienda);

    for ($i = 0; $i < count($prodotti); $i++) {
        $val = $prodotti[$i]['Nome'];
        echo "<option value=\"$val\">$val</option>";
    }

    echo '</select>
        
                    <select name="Linea" value="Linea">
                        <option value="">Line</option>
                        <option value="Light">Light</option>
                        <option value="Strong">Strong</option>
                    </select>
        <div class="button">
            <input type="submit" value="Search">
        </div>';

    echo "</form>
    </div>

    <div class = \"navbar-right\">
        <a href='./pages/chi_siamo.html'>ABOUT US</a>
        <div class='active-profile'></div>
    </div>
    
</div>";
}

//NAVBAR PER SUPERUSER
function navbar_admin() {
    echo"
<div class=\"navbar\">
    <div class=\"navbar-left\">
            <img src = \"./images/img-utility/logo.png\" height=\"120\">
            <div class=\"menu\">
                <div class=\"visibile\">
                    INSERT
                </div>
                <div class=\"sub-menu\">
                    <div> <a href=\"\"> INSERT CLASSES </a>  </div>
                    <div> <a href=\"\"> INSERT COMPANIES </a></div>
                    <div> <a href=\"\"> INSERT ORDERS</a></div>
                    <div> <a href=\"\"> INSERT PRODUCTS</a></div>
                </div>
            </div>
            
                <a href='./pages/catalogo_prodotti.php' id=\"catalogo\">CATALOGUE</a>
                <form id='form-ricerca' method='post' action='cercaProdotti.php'>
                    <select name='Gusto' value='Gusto'>
                        <option value=''>Flavours</option>";
    $sql_gusto = "SELECT Gusto FROM prodotto;";
    $prodotti = esegui_query($sql_gusto);
    for ($i = 0; $i < count($prodotti); $i++) {
        $val = $prodotti[$i]['Gusto'];
        echo "<option value=\"$val\">$val</option>";
    }

    echo '</select>
                    <select name = "Azienda" value = "Azienda">
                        <option value = "">Collaboration</option>
                        <option value = \"NULL\">None</option>';

    $sql_azienda = "SELECT Nome FROM azienda;";
    $prodotti = esegui_query($sql_azienda);

    for ($i = 0; $i < count($prodotti); $i++) {
        $val = $prodotti[$i]['Nome'];
        echo "<option value=\"$val\">$val</option>";
    }

    echo '</select>
        
                    <select name="Linea" value="Linea">
                        <option value="">Line</option>
                        <option value="Light">Light</option>
                        <option value="Strong">Strong</option>
                    </select>
                
        <div class="button">
           <button type=\"submit\"><i class=\'bx bx-search-alt-2\'></i> </button> 
        </div>
            </form>
        
    </div>
    <div class=\'navbar-right\'>
        <a href="./pages/chi_siamo.html">ABOUT US</a>
        <div class="active-profile">';
    if ($_SESSION["logged"] == true) {
        if (file_exists("./images/img-profile/".$_SESSION["Nome"].$_SESSION["Cognome"].".png")) {
            echo "<a href=\"\"> <img width=\"70\" src=\"./images/img-profile/".$_SESSION["Nome"].$_SESSION["Cognome"].".png\"> </a>";
        } else {
            echo "<a href=\"./profile.php\"> <img width=\"70\" src=\"./images/img-profile/standard.png\"></a>";
        }
    } else {
        echo "<div> <a href='login.php'> LOG-IN </a> </div>";
    }
    echo "</div>
    </div>
</div>";
}

function ad_banner($img) {
    echo "<div class=\"annuncio\"><img src='$img'></div>";
}

function add_to_cart($prodotto) {
    
}
