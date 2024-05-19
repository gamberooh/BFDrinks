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
            <input type="text" name="Nome" placeholder="Name">
            <input type="text" name="Cognome" placeholder="Surname">

        </div>
        <div class="element">
            <input type="text" name="Username" placeholder="Username">
            <input type="password" name="Pswd" placeholder="Password">
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
            <input type="number" name="Telefono" placeholder="Phone Number">
        </div>
        <div class="element">
            <input type="mail" name="Email" placeholder="E-Mail">
        </div>
        <div class="element">
            <span>Profile picture: </span><input type="file" name="Propic">
        </div>
        <div class="button">
            <input type="submit" name="invio" value="Sign-up">
        </div>
    </form>
</div>

<!-- 
// Username Pswd Email Nome Cognome Telefono Classe (Ruolo)
/*
echo '<div class="container">';
echo "<form method='post' action='registrazione.php'>"
 . "<div class='item'>"
 . "<div class='element'>"
 . "<span>Name: </span><input type='text' name='Nome'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Surname: </span><input type='text' name='Cognome'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Username: </span><input type='text' name='Username'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Password: </span><input type='password' name='Pswd'>"
 . "</div>"
 . "</div"
 . "<div class='item'>"
 . "<div class='element'>"
 . "<span>Email: </span><input type='mail' name='Email'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Telefono: </span><input type='number' name='Telefono'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Classe: </span><input type='mail' name='Classe'>"
 . "</div>"
 . "<div class='element'>"
 . "<span>Profile picture: </span><input type = \"file\" name='Propic'/>" //immagine profilo
 . "</div>"
 . "<input type='hidden' name='Ruolo' value='user'>"
 . "<div class='element'>"
 . "<div class='button'>"
 . "<input type='submit' name='invio' value='Access'>"
 . "</div>"
 . "</div>"
 . "</div>"
 . "</form>";
echo '</div>';
-->
<?php
stampa_finehtml();
