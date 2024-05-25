<?php

session_start();

include './include/connection.php';
include './include/funzioni.inc';

$titolo = 'Buy products';
$css = './styles/myStyle.css';

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST')
        $input = $_POST;
    else 
        $input = $_GET;
    stampa_head($titolo, $css);
    ?>
        <div class='loader'>
            <i class='bx bx-loader-alt bx-spin bx-rotate-90' ></i>
        </div>

    <?php
    $username = $_SESSION['Username'];
    
    $sql = 'DELETE FROM carrello '
             . 'WHERE Username=:username';
     
    if(!empty($username)){
         $bind[':username']['val'] = $username;
         $bind[':username']['tipo'] = PDO::PARAM_STR;
    }
     
    esegui_query_con_bind($sql, $bind);
    torna_home_page();
    stampa_finehtml();