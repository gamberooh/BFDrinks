<?php
include './include/funzioni.inc';
include './include/connection.php';
$titolo = 'BFDrinks Signup page';
$css = './styles/myStyle.css';
$classebody = "signup-page";
stampa_head($titolo, $css, $classebody);
?>

<div class="container">
    <h1 class='header'>Register on our website!</h1>
    <form method="post" action="registrazione.php" enctype="multipart/form-data">
        <div class="element">
            <input type="text" name="Nome" placeholder="Name" required>
            <input type="text" name="Cognome" placeholder="Surname" required>

        </div>
        <div class="element">
            <input type="text" name="Username" placeholder="Username" required>
            <input type="password" name="Pswd" placeholder="Password" required>
        </div>
        <div class="element">
            <select name="Classe">
                <option value=""> --- </option>
                <?php
                $sql = "SELECT Classe FROM classe";
                $classeDB = esegui_query($sql);
                foreach ($classeDB as $classe) {
                    echo "<option value = \"$classe[Classe]\">$classe[Classe]</option>";
                }
                ?>
            </select>
            <input type="number" name="Telefono" placeholder="Phone Number" required>
        </div>
        <div class="element">
            <input type="mail" name="Email" placeholder="E-Mail" required>
        </div>
        <div class="element">
            <span>Profile picture: </span><input type="file" name="Propic" >
        </div>
        
        <div class="button">
            <a href ="login.php">Back to Login</a>
        </div>
        
        <div class="button">
            <input type="submit" name="invio" value="Sign-up">
        </div>
    </form>
</div>

<?php
stampa_finehtml();
