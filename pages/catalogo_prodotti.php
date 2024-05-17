<html>
    <head>
        <title>CATALOGO PRODOTTI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type="text/css" href="../styles/myStyle.css">
    </head>
    <body>

        <h1 class="header">Our Catalogue</h1>

        <div class="topnav">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../pages/chi_siamo.html">CHI SIAMO</a></li>
                <li><a href="../pages/organigramma.html">ORGANIGRAMMA</a></li>
            </ul>
        </div>
            <?php
            include '../include/connection.php';
            include '../include/funzioni.inc';
            
            $sql = "SELECT p.* "
                        . "FROM PRODOTTO p "
                        . "JOIN AZIENDA a ON p.Azienda = a.id ";
            
            $ris = esegui_query($sql);
            
            stampa_catalogo($ris);
            
            ?>
</body>
</html>