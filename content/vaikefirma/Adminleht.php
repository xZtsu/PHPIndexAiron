
<?php
require('config.php');
global $yhendus;
// Uue teate lisamine

if (isset($_REQUEST["uusleht"])) {
    if (!empty(["nimi"])){
        $kask = $yhendus->prepare("INSERT INTO tooted (nimi, kirjeldus, hind) VALUES (?,?,?)");
        $kask->bind_param("ssi", $_REQUEST["nimi"], $_REQUEST["kirjeldus"], $_REQUEST["hind"]);
        $kask->execute();
        header("Location: " . $_SERVER["PHP_SELF"]);
        $yhendus->close();
        exit();
    }
}
// Teate kustutamine
if (isset($_REQUEST["kustutusid"])) {
    $kask = $yhendus->prepare("DELETE FROM tooted WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustutusid"]);
    $kask->execute();
}

// Teate muutmine
if (isset($_REQUEST["muutmisid"])) {
    $kask = $yhendus->prepare("UPDATE tooted SET nimi=?, kirjeldus=?, hind=? WHERE id=?");
    $kask->bind_param(
            "ssii",
            $_REQUEST["nimi"],
            $_REQUEST["kirjeldus"],
            $_REQUEST["hind"],
            $_REQUEST["muutmisid"]
    );
    $kask->execute();
}

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>Administraatori tootede leht</title>

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
    <div id="menyykiht">
        <h2>Administraatori toodete leht</h2>
        <ul>
            <?php
            //loendi kuvamine
            $kask = $yhendus->prepare(
                    "SELECT id, nimi FROM tooted"
            );
            $kask->bind_result($id, $nimi);
            $kask->execute();
            while ($kask->fetch()) {
                echo "<li><a href='".$_SERVER["PHP_SELF"].
                        "?id=$id'>".htmlspecialchars($nimi)."</a></li>";
            }
            ?>
        </ul>
        <a href="<?=$_SERVER['PHP_SELF']?>?lisamine=jah">Lisa uus toode/teenus</a>
    </div>
    <div id="sisukiht">
        <?php
        // Ühe teate kuvamine või muutmine
        if (isset($_REQUEST["id"])) {
            $kask = $yhendus->prepare("SELECT id, nimi, kirjeldus, hind FROM tooted WHERE id=?");
            $kask->bind_param("i", $_REQUEST["id"]);
            $kask->bind_result($id, $nimi, $kirjeldus, $hind);
            $kask->execute();

            if ($kask->fetch()) {
                if (isset($_REQUEST["muutmine"])) {
                    echo "
                        
                   <form action='".$_SERVER["PHP_SELF"]."'>
                     <input type='hidden' name='muutmisid' value='$id'/>
                     <h2>Toote muutmine</h2>
                     <dl>
                       <dt>Toote nimi:</dt>
                       <dd>
                         <input type='text' name='nimi' value='".
                            htmlspecialchars($nimi)."'/>
                       </dd>
                       <dt>Toote kirjeldus:</dt>
                       <dd>
                         <textarea rows='20' cols='30' name='kirjeldus'>".
                            htmlspecialchars($kirjeldus)."</textarea>
                       </dd>
                     </dl>                      
                      <dt>Toote hind:</dt>
                       <dd>
                         <input type='number' name='hind' value='".
                            htmlspecialchars($hind)."'/>
                         </dd>
                       
                     <input type='submit' value='Muuda' />
                   </form>
                   
                ";
                } else {
                    echo "<h2>".htmlspecialchars($nimi)."</h2>";
                    echo "Toote kirjeldus: ".htmlspecialchars($kirjeldus);
                    echo "<br />";
                    echo "Toote hind: ".htmlspecialchars($hind);
                    echo "<br />";
                    echo "<br /><a href='".$_SERVER["PHP_SELF"].
                            "?kustutusid=$id'>kustuta</a> ";
                    echo "<a href='".$_SERVER["PHP_SELF"].
                            "?id=$id&amp;muutmine=jah'>muuda</a>";
                }
            } else {
                echo "Vigased andmed.";
            }
        }

        // Uue teate lisamise vorm
        if (isset($_REQUEST["lisamine"])) {
            ?>
            <form action="<?=$_SERVER["PHP_SELF"]?>">
                <input type="hidden" name="uusleht" value="jah" />
                <h2>Uue toote lisamine</h2>
                <dl>
                    <dt><label for="nimi">Nimi:</label></dt>
                    <dd>
                        <input type="text" name="nimi" id="nimi" />
                    </dd>
                    <dt><label for="kirjeluds">Toote kirjeldus:</label></dt>
                    <dd>
                        <input type="text" name="kirjeldus" id="kirjeldus" />
                    </dd>
                </dl>

                <dt><label for="hind">Hind:</label></dt>
                <dd>
                    <input type="number" name="hind" id="hind" />
                </dd>
                <input type="submit" value="Sisesta" />
            </form>

            <?php

        }
        ?>
    </div>


</div>



<div id="jalusekiht">
    Airon
</div>
</body>
</html>
<?php
$yhendus->close();
?>
