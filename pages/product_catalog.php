<html>
    <head>
        <title>PRODUCT CATALOG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type="text/css" href="../styles/myStyle.css">
    </head>
    <body>

        <h1 class="header">Our product catalog</h1>

        <div class="topnav">
            <ul>
                <li><a href="../indexEN.php">HOME</a></li>
                <li><a href="../pages/about_us.html">ABOUT US</a></li>
                <li><a href="../pages/organizational_chart.html">ORGANIZATIONAL CHART</a></li>
                <li><a href="https://docs.google.com/document/d/1P19mnaMvYSd0aeM-bNHawe6aXZkFh1jB5sdIKbmEBLk/edit?usp=sharing">LOGBOOK</a></li>
            </ul>
        </div>
            <?php
            include '../include/funzioni.inc';
            include '../include/connection.php';

            $sql = "SELECT p.*, CONCAT(c.Anno, c.Sez, c.Acr) as Classe "
                . "FROM PRODOTTO p "
                . "JOIN ORDINE o ON p.Indice = o.indProdotto "
                . "JOIN CLASSE c ON (o.anno = c.anno) AND (o.sez = c.sez) AND (o.acr = c.acr) ";
            
            $ris = esegui_query($sql);
            stampa_catalogo($ris);
            ?>
</body>
</html>
