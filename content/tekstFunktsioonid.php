<?php
function clearVarsExcept($url, $varname) {
    // basename - makes the link relative, url must contain a filename that it returns basename('http://www.ee/index.php') > index.php
    $url = basename($url);
    if (str_starts_with($url, "?")) {
        return "?$varname=".$_REQUEST[$varname];
    }
    // strtok - returns first token after spliting on separator "?" strtoken('index.php?haha=lala', '?') > index.php
    return strtok($url, "?")."?$varname=".$_REQUEST[$varname];
}
$tekst="PHP on skriptikeel serveri pool";
echo "<h2>Tekst funktsioonid</h2>";
echo $tekst;
echo "<br>";
echo "Teksti pikkus (strlen()) on: ".strlen($tekst). " tähte";
echo "<br>";
echo "Esimesed 6 tähte on (substr()): ".substr($tekst,0,6);
echo "<br>";
echo "Alates 6 tähest on (substr()): ".substr($tekst,6);
echo "<br>";
echo "Sõnade arv lauses on (str_word_count()): ".str_word_count($tekst). " tk";
echo "<br>";
echo "Esimese tühiku asukoht on peale (strpos(): ". strpos($tekst, " "). " sümboolit" ;
echo "<br>";
echo " Näita kõik sümboolid peale esimese tühiku: ";
echo substr($tekst, strpos($tekst, " "));
echo "<br>";
echo "Kõik tähed on väiksed (strtolower) - ".strtolower($tekst);
echo "<br>";
echo "Kõik tähed on suured (strtoupper) - ".strtoupper($tekst);
echo "<br>";
echo "Iga sõna lauses algab suure tähega (ucwords) - ".ucwords($tekst);

echo "<br>";
echo "Mõistatus. Õppeaine.";
// PHP-Tekstfunktsioonid -https://www.metshein.com/unit/php-tekstifunktsioonid-ulesanne-9/

//Дай 6 подсказок с использованием  текстовых функций,
// чтобы отгадать название предмета.
//добавить проверку через ввод в текстовое поле
echo "<br>";
$aine="";
echo "<ol>";
echo "<li>Количество символов в названии предмета ".strlen($aine). "</li>";

echo "</ol>";
?>
<form name="tekstkontroll" action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "leht")?>" method='post'>
    <label for="tekst">Arv1</label>
    <input type="number" name="tekst" id="tekst" min="0" max="10" step="1">
    <br>
    <input type="submit" value="Kontrolli">
</form>
