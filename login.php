<?php

include './include/funzioni.inc';
$titolo = 'Pagina di login del sito PHP';
$css = './styles/myStyle.css';
$classe_body = 'login-page';
stampa_head($titolo, $css, $classe_body);


// LOG IN

echo '<div class="container">';
echo "<h1 class='header'>Enter BFDrinks</h1>";
echo "  <form method='post' action='index.php'>"
   . "      <div class='element'>"
   . "          <input type='text' name='Username' placeholder='Username...'>"
   . "      </div>"
   . "      <div class='element'>"
   . "          <input type='password' name='Pswd' placeholder='Password...'>"
   . "      </div>"
   . "      <div class='button'>"
   . "          <input type='submit' name='invio' value='Login'>"
   . "      </div>"
   . "  </form>";
echo "<div class=\"sign-up-link\">  "
.       "<a href=\"signup.php\">Are you not registered yet? Do it now!.</a>"
.    "</div>";
echo '</div>';

// SIGN UP
/*
echo "<div class='container'>"
 . "    <form method='post' action='signup.php'>"
 . "  <div class='button'>"
 . "    <input type='submit' name='invio' value='Signup'>"
 . "  </div>"
 . "</form>"
 . "</div>";*/



stampa_finehtml();

