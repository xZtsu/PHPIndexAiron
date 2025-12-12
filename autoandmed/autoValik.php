<?php


require('config.php');
//kustutamine
global $yhendus;
if(isset($_REQUEST['kustuta'])){
    $kask = $yhendus->prepare("DELETE FROM auto WHERE autoID=?");

    $kask->bind_param("i",$_REQUEST["kustuta"]);
    $kask->execute();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Autode valik SQL andmebaasist</title>
    <link rel="stylesheet" href="autoStyle.css">
</head>
<body>
<h1>Autode valik SQL andmebaasist</h1>
<div id="menyy">
    <ul>
        <?php
        global $yhendus;
        $kask=$yhendus->prepare("SELECT autoID, autonumber FROM auto");
        $kask->bind_result($autoID,$autonumber);

        $kask->execute();
        while($kask->fetch()){
            echo "<li><a href='?autoID=$autoID'>".$autonumber."<a/></li>";
        }
        ?>

    </ul>
</div>

<div id="sisu">
    <?php
    global $yhendus;
    $kask=$yhendus->prepare("SELECT autoID, autonumber, mark, varv, pilt FROM auto where autoID=?");
    $kask->bind_result($autoID,$autonumber, $mark,$varv,$pilt);
    $autoID=$_REQUEST["autoID"];
    $kask->bind_param("i",$autoID); //i-integer
    $kask->execute();
    if($kask->fetch()){
        echo "<h3>".$autonumber."</h3>";
        echo "<div>".$mark.", ".$varv."</div>";
        echo "<img src='$pilt'>";
        echo "</br>";
        echo "<a href='?kustuta=$autoID'>Kustuta</a>";
    }
    ?>
</div>

<div id="footer">
    Leht on tehtud Veebi tunnis
</div>

</body>
</html>
