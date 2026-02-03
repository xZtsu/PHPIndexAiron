<?php
require('config.php');
global $yhendus;
// Uue teate lisamine


?>
    <!DOCTYPE html>
    <html lang="et">
    <head>
        <title>Tootede leht</title>


        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" href="FirmaStyle.css">
    </head>
    <body>
    <nav class="menu">

        <a href="Firma.php">Esileht</a>
        <a href="Hinnakiri.php">Tooted</a>
        <a href="Adminleht.php">Administraatori leht</a>
    </nav>
    <div id="lehepakett">

        <div id="sisukiht">
            <?php
            {
                $kask = $yhendus->prepare(
                    "SELECT nimi, kirjeldus, hind FROM tooted"
                );
                $kask->bind_result($nimi, $kirjeldus, $hind);
                $kask->execute();

                echo "<h2>Kõik Tooted</h2>";

                while ($kask->fetch()) {
                    echo "<div class='toode'>";
                    echo "<h3>"."Toode: ".htmlspecialchars($nimi)."</h3>";
                    echo "<p>"."Kirjeldus: ".htmlspecialchars($kirjeldus)."</p>";
                    echo "<strong>Hind: </strong>".htmlspecialchars($hind)." €";

                    echo "</div>";
                }



            }
            ?>

        </div>
    </div>
    <a href="Firma.php">Esileht</a>

    <div id="jalusekiht">
        Airon
    </div>
    </body>
    </html>
<?php
$yhendus->close();
?>