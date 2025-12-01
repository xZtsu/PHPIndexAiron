<?php
function clearVarsExcept($url, $varname){
    $url=basename($url);
    if(str_starts_with($url, "?")){
        return "?$varname=".$_REQUEST[$varname];
    }
    return strtok($url, "?")."?$varname=".$_REQUEST[$varname];

}
echo "<h2>Matemaatilised tehted/funktsioonid</h2>";
$arv1 = 100;
$arv2 = 15;
$liitmine=$arv1+$arv2;
$lahutamine=$arv1-$arv2;
$korrutis=$arv1*$arv2;
$jagamine=$arv1/$arv2;
echo "arv1 on ".$arv1." ja arv2 on ".$arv2."<br>";
echo "<strong>Vastused:</strong> Liitmine ".$liitmine."<br>";
echo "Lahutaamine: ".$lahutamine."<br>";
echo "Korrutis: ".$korrutis."<br>";
echo "Jagamine: ".$jagamine."<br>";
echo "Omistamise operaatorid: ";
echo "<br>";
// $arv1++ - suurendamine ühe võrra $arv1=$arv1+1
$arv1++;
echo $arv1." - suurendamine ühe võrra";
echo "<br>";
// $arv1-- - vähendamine ühe võrra $arv1=$arv1-1
$arv1--;
echo $arv1." - vähendamine ühe võrra";
echo "<br>";
echo "<strong>Ruutjuur -sqrt()</strong>  = ".sqrt($arv1);
echo "<br>";
$arvud = array(11,21,32,43,54);
echo "Suurim arv massiivist - ".max($arvud);
echo "<br>";
echo "Väikseim arv massiivist - ".min($arvud);
echo "<br>";
echo "Juhuslik arv - ".rand();
echo "<br>";
$arv3 = 3.456;
echo "Ümardamine - ".round($arv3);
echo "<br>";
$a = 12;
$b = 10;
$pindala = 2*($a + $b);
echo "Ristküliku pindala arvudega 12 ja 10 = ".$pindala;
echo "<br>";
echo "Arvu 5 ruut = ".pow(5,2);
echo "<br>";
echo "<h2>Arvmõistatus. Arva ära kaks arvu vahemikus 0-10</h2>";
$slaarv1 = 9;
$slaarv2 = 5;
//kiruta matemaatiliste tehtede või funktsioonide abil 5 vihje
echo "<ol><li>Kui esimene arv korrutada 5, siis tuleb ".($slaarv1*5)."</li>";
echo "<li>Kui teine arv korrutada 5, siis tuleb ".($slaarv2*5)."</li>";
echo "<li>Kui arvud liita kokku, siis tuleb  ".($slaarv1+$slaarv2)."</li>";
echo "<li>Kui arvud lahutada, siis tuleb  ".($slaarv2-$slaarv1)."</li>";
echo "<li>Kui arvud jagada, siis tuleb  ".($slaarv2/$slaarv1)."</li></ol>";
?>
    <form action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "leht")?>" method="post">
        <label for="arv1">Arv1: </label>
        <input type="number" id="arv1" name="arv1" min="0" max="10" step="1">
        <br>
        <label for="arv2">Arv2: </label>
        <input type="number" id="arv2" name="arv2" min="0" max="10" step="1">
        <input type="submit" value="Kontrolli">
    </form
<?php
if(isset($_REQUEST["arv1"]) && $_REQUEST["arv1"]!=""){
    if($_REQUEST["arv1"] == $slaarv1){
        echo "<span id='correct'>";
        echo $_REQUEST["arv1"]." on õige!";
        echo "</span>";
    } else {
        echo "<span id='incorrect'>";
        echo $_REQUEST["arv1"]." on vale!";
        echo "</span>";
    }

}
echo "<br>";
if(isset($_REQUEST["arv2"]) && $_REQUEST["arv2"]!=""){
    if($_REQUEST["arv2"] == $slaarv2){
        echo "<span id='correct'>";
        echo $_REQUEST["arv2"]." on õige!";
        echo "</span>";
    } else {
        echo "<span id='incorrect'>";
        echo $_REQUEST["arv2"]." on vale!";
        echo "</span>";
    }
}