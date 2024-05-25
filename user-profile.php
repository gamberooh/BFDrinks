<?php
    
    session_start();
    include './include/funzioni.inc';  
    include './include/connection.php';
    $titolo = 'User details';
    $css = './styles/myStyle.css';
    $classe_body = 'profile-page';
    stampa_head($titolo, $css, $classe_body);

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST')
        $input = $_POST;
    else
        $input = $_GET;


    if (isset($_SESSION['logged']) and $_SESSION['logged']) {
        echo "<h1 class='header'>$_SESSION[Nome] $_SESSION[Cognome] profile page</h1>";
        
        if(isAdmin()) {
            navbar_admin();
        } else {
            navbar_user();
        }
        
        $sql = "SELECT U.Email, U.Telefono, U.Classe FROM Utente U WHERE U.Username = :Username";
        $bind['Username']['val'] = $_SESSION['Username'];
        $bind['Username']['tipo'] = PDO::PARAM_STR;
        
        if (file_exists("./images/img-profile/" . $_SESSION["Nome"] . $_SESSION["Cognome"] . ".png")) {
            echo "<div class='propic-user'>"
                . "<img src=\"./images/img-profile/".$_SESSION["Nome"].$_SESSION["Cognome"].".png\">"
            . "</div>";
        } else {
            ?>
            <form method="post" action="./caricaFoto.php" enctype="multipart/form-data">
                <div class="element">
                    <span>Profile picture: </span><input type="file" name="Propic">
                </div>
                <div class="button">
                    <input type="submit" name="invio" value="Sign-up">
                </div>
            </form>
            <?php
        }

        $result = esegui_query_con_bind($sql, $bind);
        echo "<div class='descr-profilo'>";
        foreach($result as $colonne){ 
            echo "<div class='info-profilo'>";
            foreach($colonne as $chiave => $valore){ 
                echo "<div class='info'>";
                
                        if($chiave == "Telefono") 
                            $chiave = 'Telephone';
                        else if($chiave == 'Classe')
                            $chiave = 'Class';
                        
                        echo "<span>$chiave:</span> $valore"
                   . "</div>";
            }
            echo "</div>";
        }
        echo "</div>";
    }
    
    echo "<div><a href = \"./index.php\">TORNA ALL'INDICE</a></div>";
    
    
