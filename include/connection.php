<?php
//mi connetto al db archiviofilm sul dbms localhost di mySql
    $dns = 'mysql:host=localhost; dbname=bfdrinks;';
    //utente linux
    //$username = "studente";
    //$password = "studente";
    //
    //utente windows
    $username = "root";
    $password = "";

    try {
        $myconnection = new PDO($dns, $username, $password);
    }catch(PDOException $e){
        echo "Connessione fallita: ".$e->getMessage();
    }

    //eseguo una query e restituisco un array coi dati estratti
    function esegui_query($sql){
        global $myconnection;
        //parse della query
            if($stmt = $myconnection->prepare($sql)){
                //eseguo la query
                if($stmt->execute())
                    //fetch dei dati
                    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                else{
                    echo "<div class = \"errore\"> <i>$sql</i> <br />ERRORE DI ESECUZIONE</div>";
                }
            }
            else{
                echo "<div class = \"errore\"> <i>$sql</i> <br />SINTATTICAMENTE ERRATA</div>";
            }
            return $result;
     }//fine fun esegui_query
     
    function esegui_query_con_bind($sql, $bind = null){
        global $myconnection;
        //echo "<pre>$sql</pre>";
        //parse della query
            if($stmt = $myconnection->prepare($sql)){
                //faccio il bind
                if(!empty($bind)){
                    foreach ($bind as $parametro => $valore){
                        $stmt ->bindParam($parametro, $valore['val'], $valore['tipo']);
                        //echo " bind $parametro = $valore[val] - $valore[tipo]<br />";
                    }
                }
                //eseguo la query
                if($stmt->execute())
                    //fetch dei dati
                    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                else{
                    echo "<div class = \"errore\"> <i>$sql</i> <br />ERRORE DI ESECUZIONE</div>";
                }
            }
            else{
                echo "<div class = \"errore\"> <i>$sql</i> <br />SINTATTICAMENTE ERRATA</div>";
            }
            return $result;
    }//fine fun esegui_query_con_bind