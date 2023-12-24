<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include './include/funzioni.inc';
include './include/dati.inc';

$titolo = 'Home Page BF Drinks';
$css = './styles/myStyle.css';
$script = './scripts/controlloErrori.js';
stampa_head($titolo, $css);
include_script($script);
?>

<header>
    
    <div class="header">
        <h1>BF Drinks</h1>
    </div>
    
    <div "container">
        
    </div>
</header>
<form id="form1" method="post" action="cercaProdotti.php">
<div class="container">
    
    <div class="item">
        
            <span class="titolo-item">Nome bibita</span><input type="text" name="nome" size="40">
            
            <br>
            <span class="titolo-item">Linea</span>
            <input type="radio" name="linea" value="light"><label>Light</label>
            <input type="radio" name="linea" value="strong"><label>Strong</label>
            <br>
            <span class="titolo-item">Liscia o gassata</span>
            <input type="radio" name="gassata" value="liscia"><label>Liscia</label>
            <input type="radio" name="gassata" value="gassata"><label>Gassata </label>
            <br>
            <span class="titolo-item">Gusti</span>
            <select name='gusto' value='Scegli gusto'>
                <?php
                for($i = 0; $i<count($gusti); $i++){
                    echo"<option value=\"$gusti[$i]\">$gusti[$i]</option>";
                }
                
                ?>
            </select>
    </div>
    <div class="item">
        <span class="titolo-item">Acquistata dalla classe</span><br>
            <?php
            for($i = 0; $i<count($classi); $i++){
                echo "<input type=\"checkbox\" name=\"acquistata\" value=\"$classi[$i]\"><span>$classi[$i]</span>";
            }
            ?>
        <br>
            <span class="titolo-item">Calorie</span>
            <input type="number" id="calorie" name="calorie" oninput="controllaNumero()">
            <br>
            <span class="titolo-item">Collaborazioni</span>
            <select name='collab' value='Scegli collaborazione'>
                <?php
                echo "<option value=\"\">Nessuna</option>";
                for($i = 0; $i<count($collab); $i++){
                    echo"<option value=\"$collab[$i]\">$collab[$i]</option>";
                }
                
                ?>
            </select>
            
            menu-tendina
            <br>
            
        
    </div>
</div>
        <div class="button">
                <input type="submit" value="Invio">
                <input type="reset" value="Reset">
            </div>
</form>
<br>


<footer>
    <div id="banner">
        <div class="scrolling-text">
            Dal Belluzzi per il Belluzzi, BF Drinks ti fa stare attento ad ogni lezione!
        </div>
    </div>
</footer>

<?php
stampa_finehtml();




