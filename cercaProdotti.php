<?php

include './include/funzioni.inc';
include './include/connection.php';
$css = './styles/myStyle.css';
$titolo = "Prodotti consoni con la ricerca";

session_start(); // Start session to access session variables

stampa_head($titolo, $css);

$method = $_SERVER['REQUEST_METHOD'];

// Check if access is valid before proceeding
if (isAccessValid()) {
    //echo "method = $method <br />";
    //selezione del metodo utilizzato per l'invio del form
    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

    echo '<h1 class="header">Informazioni relative ai prodotti cercati</h1>';

    if (isAdmin()) {
        echo '<div class="topnav">'
            . '<ul>'
                . '<li><a href="./insert/insertClasses.php">Insert classes</a></li>'
                . '<li><a href="./insert/insertCompanies.php">Insert Companies</a></li>'
                . '<li><a href="./insert/insertOrders.php">Insert Orders</a></li>'
                . '<li><a href="./insert/insertProducts.php">Insert Products</a></li>'
            . '</ul>'
        . '</div>';
    }
    
    $sql = "SELECT p.* "
         . "FROM PRODOTTO p "
         . "JOIN AZIENDA a ON p.Azienda = a.id "
         . "WHERE 0 = 0 ";
    // clausola where che mi serve solo per attaccare gli AND
    
    /*
                Nome	Tipo	
	1	Indice Primaria	int(11)
	2	Nome	varchar(50)	
	3	Linea	varchar(50)	
	4	Miscela	varchar(50)	
	5	Gusto	varchar(50)		
	6	Prezzo	decimal(10,2)			
	7	Calorie	int(11)	
	8	Azienda varchar
     */

    if (!empty($input['Nome'])) {
        $sql .= " AND p.Nome = :Nome";
        $bind['Nome']['val'] = $input['Nome'];
        $bind['Nome']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Linea'])) {
        $sql .= " AND p.Linea = :Linea";
        $bind['Linea']['val'] = $input['Linea'];
        $bind['Linea']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Gusto'])) {
        $sql .= " AND p.Gusto LIKE :Gusto";
        $bind['Gusto']['val'] = "%" . $input['Gusto'] . "%";
        $bind['Gusto']['tipo'] = PDO::PARAM_STR;
    }

    //problema con l'input della classe (acquistata per php)
    
    if (!empty($input['Azienda'])) {
        $sql .= " AND a.Id = :Azienda";
        $bind['Azienda']['val'] = $input['Azienda'];
        $bind['Azienda']['tipo'] = PDO::PARAM_STR;
    }

    if (!empty($input['Calorie'])) {
        $sql .= " AND p.calorie <= :Calorie";
        $bind['Calorie']['val'] = $input['Calorie'];
        $bind['Calorie']['tipo'] = PDO::PARAM_INT;
    }
    

    if (empty($bind)) {
        $ris = esegui_query($sql);
    } else {
        $ris = esegui_query_con_bind($sql, $bind);
    }

    if (!empty($ris)) {
        //print_r($risultati);
        stampa_prodotti($ris);
    } else {
        echo "<h1>NESSUN PRODOTTO TROVATO</h1>";
    }

    echo '<br>';
    echo '<div class="container">';
    echo '<div class="link">';
    torna_home_page();
    echo '</div>';
    echo '</div>';
} else {
    // If access is not valid, handle accordingly (e.g., redirect to login page)
    echo "<h1>Credenziali non valide. Accesso negato.</h1>";
    // You might want to provide a link or redirection here
}

stampa_finehtml();



