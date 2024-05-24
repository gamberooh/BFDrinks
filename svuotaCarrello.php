<?php

session_start();

include './include/connection.php';
include './include/funzioni.inc';

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST')
        $input = $_POST;
     else 
        $input = $_GET;
     
     $username = $_SESSION['Username'];
     
     $sql = 'DELETE FROM carrello '
             . 'WHERE Username=:username';
     
    if(!empty($username)){
         $bind[':username']['val'] = $username;
         $bind[':username']['tipo'] = PDO::PARAM_STR;
    }
     
    esegui_query_con_bind($sql, $bind);