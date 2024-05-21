<?php
    
    session_start();
    include '../include/funzioni.inc';  
    include '../include/connection.php';
    $titolo = 'User details';
    $css = '../styles/myStyle.css';

    stampa_head($titolo, $css);

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST')
        $input = $_POST;
    else
        $input = $_GET;


    if (isset($_SESSION['logged']) and $_SESSION['logged']) {
        echo "<h1 class='header'>$_SESSION[Nome] $_SESSION[Cognome] profile page</h1>";
        echo "<div>"
                . "<img src=\"../images/img-profile/".$_SESSION["Nome"].$_SESSION["Cognome"].".png\">"
            . "</div>";

        $sql = "SELECT U.Email, U.Telefono, U.Classe FROM Utente U WHERE U.Username = :Username";
        $bind['Username']['val'] = $_SESSION['Username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;

        $result = esegui_query_con_bind($sql, $bind);
        echo "<table>";
        foreach($result as $colonne){ 
            echo "<tr>";
            foreach($colonne as $chiave => $valore){ 
                echo "<td>$chiave: $valore</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        /*echo "<div><p>User's Email: ".$_SESSION["Email"]."</p></div>";
        echo "<div><p>User's Telefono: ".$_SESSION["Telefono"]."</p></div>";
        echo "<div><p>User's Classe: ".$_SESSION["Classe"]."</p></div>";*/
    }
    
    echo "<div><a href = \"../index.php\">TORNA ALL'INDICE</a></div>";
    
    
