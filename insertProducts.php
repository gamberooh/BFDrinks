<?php

include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Insert Products';
$css = './styles/myStyle.css';
$classebody = "insert";
stampa_head($titolo, $css, $classebody);
session_start();

if (check_login(isAdmin())) {
    echo '<div class="home"><form id="form5" method="post" action="cercaProdotti2.php">'
            . '<div class ="container">'
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Product Index </span><input type='number' name='Indice' size='6' required>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Name </span><input type='text' name='Nome' size='30' required>"
            . "        </div>"
            . "    </div>"
            . '    <div class="item">'
            . '     <span class="titolo-item">Line </span>'
            . '         <input type="radio" name="Linea" value="light" required><label id="normale">Light</label>'
            . '         <input type="radio" name="Linea" value="strong" required><label id="normale">Strong</label>'
            . '    </div>'
            . "</div>"
            . '<div class ="container">'
            . "    <div class='element'>"
            . "        <div class='item'>"
            . "            <span class='titolo-item'>Mixture </span>"
            . "                 <input type=\"radio\" name=\"Miscela\" value=\"Sparkling\" required><label id=\"normale\">Sparkling</label>"
            . "                 <input type=\"radio\" name=\"Miscela\" value=\"Still\" required><label id=\"normale\">Still</label>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Calories </span><input type='number' name='Calorie' size='50' required>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Flavour </span><input type='text' name='Gusto' size='50' required>"
            . "        </div>"
            . "    </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Price </span><input type='number' name='Prezzo' size='50' required>"
            . "        </div>"
            .       "</div>"
            .       "<div class='item'>"
            .           "<div class='element'>
                            <span class='titolo-item'>Description </span> <textarea row='4' cols='50' name='Descrizione' size='50' required></textarea>
                       </div>"
            . "     </div>"
            . "    <div class='item'>"
            . "        <div class='element'>"
            . "            <span class='titolo-item'>Company Id </span>
                <select name = \"Azienda\" value = \"Azienda\" required>
                        <option value = \"\">Collaboration</option>
                        <option value = \"NULL\">None</option>";

    $sql_azienda = "SELECT Id FROM azienda;";
    $prodotti = esegui_query($sql_azienda);

    for ($i = 0; $i < count($prodotti); $i++) {
        $val = $prodotti[$i]['Id'];
        echo "<option value=\"$val\">$val</option>";
    }
    echo "</select>"
            . "        </div>"
            . "    </div>"
            . '</div>'
            . "<div class='button'>"
            . "    <input type='submit' value='Send'>"
            . "    <input type='reset' value='Reset'>"
            . "</div>"
        . '</form></div>';
    
} else {
    echo '<header>';
        echo '<div class=".container-home">';
            echo '<div class="header"ACCESS DENIED</h1>';
            echo '</div>';
        echo '</div>';
    echo '</header>';
}

stampa_finehtml();