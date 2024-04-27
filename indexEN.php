<?php
include './include/funzioni.inc';
include './include/connection.php';

$titolo = 'Home Page BF Drinks EN';
$css = './styles/myStyle.css';
$script = './scripts/controlloErrori.js';

session_start();

stampa_head($titolo, $css);
include_script($script);

if (isAccessValid()) {
    echo "<header>";
    echo "    <div class='.container-home'>";
    echo "        <div class='header'>";
    echo "        <h1>Welcome to BF Drinks</h1>";
    echo "    </div>";
    echo "    </div>";
    echo "</header>";

    echo "<div class='topnav'>";
    echo "    <ul>";
    echo "        <li><a href='./pages/about_us.html'>ABOUT US</a></li>";
    echo "        <li><a href='./pages/organizational_chart.html'>ORGANIZATIONAL CHART</a></li>";
    echo "        <li><a href='./pages/product_catalog.php'>PRODUCT CATALOG</a></li>";
    echo "        <li><a href='https://docs.google.com/document/d/1P19mnaMvYSd0aeM-bNHawe6aXZkFh1jB5sdIKbmEBLk/edit'>LOGBOOK</a></li>";
    echo "    </ul>";
    echo "</div>";

    echo "<form id='form1' method='post' action='cercaProdotti.php'>";
    echo "<div class='container'>";
    
    echo "    <div class='item'>";
    echo "        <div class='element'>";
    echo "            <span class='titolo-item'>Drink Name </span><input type='text' name='nome' size='40'>";
    echo "        </div>"; 
        
    echo "        <div class='element'>";    
    echo "            <span class='titolo-item'>Line </span>";
    echo "            <input type='radio' name='linea' value='light'><label>Light</label>";
    echo "            <input type='radio' name='linea' value='strong'><label>Strong</label>";
    echo "        </div>";

    echo "        <div class='element'>";    
    echo "            <span class='titolo-item'>Flavours </span>";
    echo "            <select name='gusto' value='Scegli gusto'>";
    echo "                <option value=''>Choose flavour</option>";
    // Fetch flavours dynamically from the database
    $flavours = esegui_query("SELECT Miscela FROM PRODOTTO");
    foreach ($flavours as $flavour) {
        echo "                <option value=\"{$flavour['Miscela']}\">{$flavour['Miscela']}</option>";
    }
    echo "            </select>";
    echo "        </div>"; 
    
    echo "    </div>"; // close item
    
    echo "    <div class='item'>";
    echo "        <div class='element'>"; 
    echo "            <span class='titolo-item'>Purchased by class</span><br>";
    // Fetch classes dynamically from the database
    $classes = esegui_query("SELECT CONCAT(Anno, Sez, Acr) AS Classe FROM CLASSE");
    foreach ($classes as $class) {
        echo "            <input type='checkbox' name='classe' value='{$class['Classe']}'><span>{$class['Classe']}</span>";
    }
    echo "        </div>";

    echo "        <div class='element'>"; 
    echo "            <span class='titolo-item'>Calories </span>";
    echo "            <input type='number' id='calorie' name='calorie' oninput='controllaNumero()'>";
    echo "        </div>";
        
    echo "        <div class='element'>"; 
    echo "            <span class='titolo-item'>Collaborations </span>";
    echo "            <select name='collab' value='Scegli collaborazione'>";
    echo "                <option value=''>Choose collab</option>";
    echo "                <option value='#N/D'>None</option>"; // Option for products without collaborations
    // Fetch collaborations dynamically from the database
    $collaborations = esegui_query("SELECT Nome FROM AZIENDA");
    foreach ($collaborations as $collab) {
        echo "                <option value=\"{$collab['Nome']}\">{$collab['Nome']}</option>";
    }
    echo "            </select>";
    echo "        </div>";
    
    echo "    </div>"; // close item
    
    echo "</div>"; // close container
    
    echo "<div class='button'>";
    echo "    <input type='submit' value='Send'>";
    echo "    <input type='reset' value='Reset'>";
    echo "</div>";
    echo "</form>";
    echo "<br>";

    echo "<footer>";
    echo "    <div id='banner'>";
    echo "        <div class='scrolling-text'>";
    echo "            From Belluzzi for Belluzzi, BF Drinks keeps you attentive in every lesson!";
    echo "        </div>";
    echo "    </div>";
    echo "</footer>";
} else {
    echo "<h1 class='header'>Invalid Credentials</h1>"; 
    echo '<div class="container">';
    echo '<div class="link">';
    torna_login();
    echo '</div>';
    echo '</div>';
}

stampa_finehtml();
?>
