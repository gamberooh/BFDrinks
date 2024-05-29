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
    } //tabella stampata in modo completo
    echo "</table>";
}

function stampa_classi($classi) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Classe</th><th>Aula</th><th>NAlunni</th></tr>";
    $n = 0;
    foreach ($classi as $i => $info_classe) {
        $n++;
        echo "<tr><td>$n</td>";
        echo "<td>$info_classe[Classe]</td>"
        . "<td>$info_classe[Aula]</td>"
        . "<td>$info_classe[NAlunni]</td>";
        echo "</tr>";
    } //tabella stampata in modo completo
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
    } //tabella stampata in modo completo
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
    } //tabella stampata in modo completo
    echo "</table>";
}

function stampa_prodotti2($prodotti) {
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];
    echo "<table border = 1 align = \"center\"><tr><th>N.</th><th>Index</th><th>Name</th><th>Line</th><th>Mixture</th><th>Flavour</th><th>Price</th><th>Calories</th><th>Collaboration</th><th>Description</th></tr>";
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
    } //tabella stampata in modo completo
    echo "</table>";
}

function stampa_catalogo($prodotti) {
    include_script("./scripts/controlloErrori.js");
    echo "<link rel=\"stylesheet\" href=\"./styles/myStyle.css\">";
    $method = $_SERVER['REQUEST_METHOD'];

    echo "<div class=\"container-catalogo\">";
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
        echo "<div class=\"product\">"
        . "<img src=\"$image_string\" alt='Product image'>"
        . "<div class='product-name'>"
        . "<p>$info_prodotto[Nome]</p>"
        . "</div>"
        . "<div class='product-link'>"
        . "<a href='./dettagliProdotto.php"
        . "?indice=$indice_prodotto_url_encoded"
        . "&nome=$nome_prodotto_url_encoded"
        . "&linea=$linea_prodotto_url_encoded"
        . "&miscela=$miscela_prodotto_url_encoded"
        . "&gusto=$gusto_prodotto_url_encoded"
        . "&prezzo=$prezzo_prodotto_url_encoded"
        . "&calorie=$calorie_prodotto_url_encoded"
        . "&descrizione=$descrizione_prodotto_url_encoded'>SHOW DETAILS</a>"
        . "</div>"
        . "<form method='get' action='aggiungi_al_carrello.php'>"
        . " <div class='button'>"
        . "     <input type='number' name='Indice' value=\"$indice_prodotto_url_encoded\" style=\"display: none\"/>"
        . "     <button type='submit' value=\"\"><i class='bx bx-cart-add'></i></button>"
        . "     <input type='number' name='qnt' value='1' min='1' oninput=\"controlloErrori()\">"
        . " </div>";
        if(isAdmin()){
          echo "     <div class=\"remove\">"
        . "   <a href='rimuovi_dal_catalogo.php?Indice=$indice_prodotto_url_encoded'><i class='bx bx-trash'></i></a>"
        . "     </div>";
        }
        echo "</form>";

        echo "</div>"
        ;
    }
    echo "</div>";
}

function torna_home_page() {
    echo "<div class=\"link\"><a href = \"index.php\">HOME PAGE</a></div>";
}

function torna_login() {
    echo "<div class=\"back-to-login\">
            <img src=\"./images/img-utility/logo.png\">
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
    // https://www.w3schools.com/howto/howto_css_searchbar.asp --> per implementare nel css una searchbar
    /* <?php
      require 'database.php';

      $query = isset($_GET['query']) ? $_GET['query'] : '';

      $sql = '
      SELECT p.Nome AS ProdottoNome, p.Linea, p.Miscela, p.Gusto, p.Prezzo, p.Calorie, a.Nome AS AziendaNome
      FROM Prodotto p
      JOIN Azienda a ON p.Azienda = a.Id
      WHERE p.Nome LIKE :query OR p.Linea LIKE :query OR p.Miscela LIKE :query OR p.Gusto LIKE :query OR a.Nome LIKE :query
      ';

      $stmt = $pdo->prepare($sql);
      $searchQuery = '%' . $query . '%';
      $stmt->execute(['query' => $searchQuery]);

      $results = $stmt->fetchAll();
      echo json_encode($results);
      ?>

      codice fabrice per implementare il back end di una search bar che controlli i prodotti (esborra)
     */
    echo "
        <div class=\"navbar\">
            <div class=\"navbar-left\">
                <a href=\"index.php\"><img src = \"./images/img-utility/logo.png\" height=\"120\"></a>
                <a href='catalogo_prodotti.php' id=\"catalogo\">CATALOGUE</a>
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
        </div>';

    echo "</form>
    </div>
    <div class = \"navbar-right\">
        <a href='./chi_siamo.php'>ABOUT US</a>
        <div class='active-profile'>";
    // cambierei il modo di salvare l'immagine, userei l'username perché è univoco
    if ($_SESSION["logged"] == true) {
        if (file_exists("./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png")) {
            echo "<img width=\"70\" src=\"./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png\">";
        } else {
            echo "<img width=\"70\" src=\"./images/img-profile/standard.png\">";
        }
    } else {
        echo "<div> <a href='login.php'> LOG-IN </a> </div>";
    }
    echo "
            <div class=\"menu-user\">   
                <div class=\"spazio\"></div>
                <a href=\"user-profile.php\">
                    <i class='bx bxs-user'></i>
                    <div>PROFILE</div>
                </a>
                <a href=\"carrello.php\">
                    <i class='bx bx-cart-alt' ></i>
                    <div>MY CART</div>
                </a>
                <a href=\"logout.php\" class=\"log-out\">
                    <i class='bx bx-log-out'></i>
                    <div>LOG-OUT</div>
                </a>
            </div>
        </div>
    </div>
</div>";
}

//NAVBAR PER SUPERUSER
function navbar_admin() {
    echo "
<div class=\"navbar\">
    <div class=\"navbar-left\">
            <a href=\"index.php\"><img src = \"./images/img-utility/logo.png\" height=\"120\"></a>
            <div class=\"menu\">
                <div class=\"visibile\">
                    INSERT
                </div>
                <div class=\"sub-menu\">
                    <div class=\"spazio\"></div>
                    <div> <a href=\"./insertClasses.php\"> INSERT CLASSES </a>  </div>
                    <div> <a href=\"./insertCompanies.php\"> INSERT COMPANIES </a></div>
                    <!--<div> <a href=\"./insert/\"> INSERT ORDERS</a></div>-->
                    <div id=\"last\"> <a href=\"./insertProducts.php\"> INSERT PRODUCTS</a></div>
                </div>
            </div>
            
                <a href='catalogo_prodotti.php' id=\"catalogo\">CATALOGUE</a>
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
        <a href="chi_siamo.php">ABOUT US</a>
        <div class="active-profile">';
    // cambierei il modo di salvare l'immagine, userei l'username perché è univoco
    if ($_SESSION["logged"] == true) {
        if (file_exists("./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png")) {
            echo "<img width=\"70\" src=\"./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png\">";
        } else {
            echo "<img width=\"70\" src=\"./images/img-profile/standard.png\">";
        }
    } else {
        echo "<div> <a href='login.php'> LOG-IN </a> </div>";
    }
    echo "
            <div class=\"menu-user\">
                <div class=\"spazio\"></div>
                <a href=\"user-profile.php\">
                    <i class='bx bx-wrench'></i>
                    <div>PROFILE</div>
                </a>
                <a href=\"selezionaProdottoDaModificare.php\">
                    <i class='bx bx-edit-alt'></i>
                    <div>EDIT PRODUCT</div>
                </a>
                <a href=\"carrello.php  \">
                    <i class='bx bx-cart-alt' ></i>
                    <div>MY CART</div>
                </a>
                <a href=\"./logout.php\" class=\"log-out\">
                    <i class='bx bx-log-out'></i>
                    <div>LOG-OUT</div>
                </a>
            </div>
        </div>
    </div>
</div>";
}

function ad_banner($img, $indice) {

    $sql = "SELECT * FROM prodotto WHERE Indice=$indice";
    $info_prodotto = esegui_query($sql)[0];
    $indice_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
    $nome_prodotto_url_encoded = urlencode($info_prodotto['Nome']);
    $linea_prodotto_url_encoded = urlencode($info_prodotto['Linea']);
    $miscela_prodotto_url_encoded = urlencode($info_prodotto['Miscela']);
    $gusto_prodotto_url_encoded = urlencode($info_prodotto['Gusto']);
    $prezzo_prodotto_url_encoded = urlencode($info_prodotto['Prezzo']);
    $calorie_prodotto_url_encoded = urlencode($info_prodotto['Indice']);
    $descrizione_prodotto_url_encoded = urlencode($info_prodotto['Descrizione']);
    echo "<div class=\"annuncio\">"
    . "<a href='dettagliProdotto.php"
    . "?indice=$indice_prodotto_url_encoded"
    . "&nome=$nome_prodotto_url_encoded"
    . "&linea=$linea_prodotto_url_encoded"
    . "&miscela=$miscela_prodotto_url_encoded"
    . "&gusto=$gusto_prodotto_url_encoded"
    . "&prezzo=$prezzo_prodotto_url_encoded"
    . "&calorie=$calorie_prodotto_url_encoded"
    . "&descrizione=$descrizione_prodotto_url_encoded'>"
    . "<img src='$img'></div></a>";
}

/* function aggiungi_al_carrello($prodotto)
  {
  $sql_carrello = 'INSERT into carrello (Username, Prodotto, Data_Inserimento) VALUES( '
  . ''
  . ');';


  } */

function aggiungi_al_carrello($username, $prodotto, $data, $quantita) {

    // Controlla se il prodotto esiste già nella tabella
    $check_sql = 'SELECT qnt FROM carrello WHERE Username = :Username AND Prodotto = :Prodotto';

    $check_bind[':Username']['val'] = $username;
    $check_bind[':Username']['tipo'] = PDO::PARAM_STR;

    $check_bind[':Prodotto']['val'] = $prodotto;
    $check_bind[':Prodotto']['tipo'] = PDO::PARAM_INT;

    $result = esegui_query_con_bind($check_sql, $check_bind);

    if (!empty($result)) {
        // Auemnta la quantità
        $new_qnt = $result[0]['qnt'] + $quantita;
        $update_sql = 'UPDATE carrello SET qnt = :qnt, Data_Inserimento = :Data_Inserimento WHERE Username = :Username AND Prodotto = :Prodotto';

        $update_bind[':qnt']['val'] = $new_qnt;
        $update_bind[':qnt']['tipo'] = PDO::PARAM_INT;

        $update_bind[':Data_Inserimento']['val'] = $data;
        $update_bind[':Data_Inserimento']['tipo'] = PDO::PARAM_STR;

        $update_bind[':Username']['val'] = $username;
        $update_bind[':Username']['tipo'] = PDO::PARAM_STR;

        $update_bind[':Prodotto']['val'] = $prodotto;
        $update_bind[':Prodotto']['tipo'] = PDO::PARAM_INT;

        esegui_insert_con_bind($update_sql, $update_bind);
    } else {
        // Inseriesce una nuova tupla se il prodotto non esiste
        $insert_sql = 'INSERT INTO carrello (Username, Prodotto, qnt, Data_Inserimento) VALUES (:Username, :Prodotto, :qnt, :Data_Inserimento)';

        $insert_bind[':Username']['val'] = $username;
        $insert_bind[':Username']['tipo'] = PDO::PARAM_STR;

        $insert_bind[':Prodotto']['val'] = $prodotto;
        $insert_bind[':Prodotto']['tipo'] = PDO::PARAM_INT;

        $insert_bind[':qnt']['val'] = $quantita;
        $insert_bind[':qnt']['tipo'] = PDO::PARAM_INT;

        $insert_bind[':Data_Inserimento']['val'] = $data;
        $insert_bind[':Data_Inserimento']['tipo'] = PDO::PARAM_STR;

        esegui_insert_con_bind($insert_sql, $insert_bind);
    }
}

function print_table($array) {
    if (empty($array)) {
        echo "No data available to display.";
        return;
    }

    // Start the table and add the table headers
    echo '<table border="1" cellspacing="0" cellpadding="5">';
    echo '<thead><tr>';
    foreach (array_keys($array[0]) as $header) {
        echo '<th>' . htmlspecialchars($header) . '</th>';
    }
    echo '</tr></thead>';

    // Add the table rows
    echo '<tbody>';
    foreach ($array as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

function print_cart($carrello) {
    print_total($carrello);
    echo "<div class=\"carrello\">";

    foreach ($carrello as $acquisto) {
        echo "
            <div class=\"acquisto\">
                <img src=\"./images/img-prodotti/$acquisto[Prodotto].png\">
                <div class=\"info\">
                    <div class=\"nome\">$acquisto[Prodotto]</div>
                    <div class=\"data\">
                        <h3><span>AGGIUNTO IL:</span>" . substr($acquisto["Data_Inserimento"], 0, 8) . "</h3>
                    </div>
                    <h3 id=\"qnt\"><span>QUANTITA':</span> $acquisto[qnt]</h3>
                    <h3 id=\"\"><span>PREZZO':</span> $acquisto[Total] €</h3>
                </div>
                <div class=\"remove\">
                    <a href=\"rimuoviDaCarrello.php?Prodotto=$acquisto[Prodotto]\"><i class='bx bx-trash'></i></a>
                </div>
            </div>
        ";
    }
    echo "</div>";
}

function print_total($carrello) {
    echo "
        <div class=\"totale\">";
    $totale = 0;
    foreach ($carrello as $acquisto) {
        $totale += $acquisto["Total"];
    }
    echo "<span>TOTALE CARRELLO:</span> $totale €";
    echo "</div>
    ";
}
