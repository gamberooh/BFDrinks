<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Update Products';
$css = './styles/myStyle.css';

stampa_head($titolo, $css);
session_start();

$method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
        $input = $_POST;
    } else {
        $input = $_GET;
    }

if (isAdmin()) {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header">';
                echo '<h1>Update Products</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
    echo '<div class="topnav">'
        . '<ul>'
            . '<li><a href="./index.php">Home Page</a></li>'
            . '<li><a href="./insertClasses.php">Insert Classes</a></li>'
            . '<li><a href="./insertOrders.php">Insert Orders</a></li>'
            . '<li><a href="./insertCompanies.php">Insert Companies</a></li>'
        . '</ul>'
    . '</div>';
    
    echo '<form id="form5" method="post" action="cercaProdotti2.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Index </span><input type='number' name='Indice' value='$input[Indice]' size='6' readonly>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Name </span><input type='text' name='Nome'>"
            . "        </div>"
            . "    </div>"
            . '    <div class="item">'
            . '     <span class="titolo-item">Line </span>'
            . '         <input type="radio" name="Linea" value="light"><label>Light</label>'
            . '         <input type="radio" name="Linea" value="strong"><label>Strong</label>'
            . ' </div>'
            . "</div>"
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Mixture </span><input type='text' name='Miscela'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Calories </span><input type='number' name='Calorie'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Flavour </span><input type='text' name='Gusto'>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Price </span><input type='number' name='Prezzo'>"
            . "        </div>"
            .       "</div>"
            .       "<div class='item'>"
            .           "<div class='element'>
                            <span class='titolo-item'>Description </span> <textarea row='4' cols='50' name='Gusto'></textarea>
                       </div>"
            . "     </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Company Id </span><input type='text' name='Azienda'>"
            . "        </div>"
            . "    </div>"
            . '</div>'
            . "<div class='button'>"
            . "    <input type='submit' value='Send'>"
            . "    <input type='reset' value='Reset'>"
            . "</div>"
        . '</form>';
    
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"Access Denied</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}
    
stampa_finehtml();