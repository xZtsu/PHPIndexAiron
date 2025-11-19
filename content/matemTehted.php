<?php
// eemalda urlist muutujad

function clearVarsExcept($url, $varname) {
    // basename - makes the link relative, url must contain a filename that it returns basename('http://www.ee/index.php') > index.php
    $url = basename($url);
    if (str_starts_with($url, "?")) {
        return "?$varname=".$_REQUEST[$varname];
    }
    // strtok - returns first token after spliting on separator "?" strtoken('index.php?haha=lala', '?') > index.php
    return strtok($url, "?")."?$varname=".$_REQUEST[$varname];
}
    echo "<h2>Matemaatilised tehted</h2>";
    echo "<a href='https://www.metshein.com/unit/php-matemaatilised-tehted-ulesanne-2/'>
    PHP matemaatilised tehted</a>";

//mõistatus
echo "<h2>Загадали 2 числа до ...</h2>";
$arv1=5;
$arv2=5;
echo "<ul>";
echo "<li>Если из первого числа вычесть второе, то будет  ".($arv1-$arv2)."</li>";
echo "<li>Если первое возвести в степень 3".pow($arv1, 3)."</li>";
//в подсказках перебрать все матем операции
//пару операторов присваивания (omistamise operaatorid)


echo "</ul>";
echo $arv1. " ja ". $arv2. "<br>";
echo "<h2>Vastuste kontroll</h2>";
?>
    <form name="arvud" action="<?=clearVarsExcept($_SERVER['REQUEST_URI'], "leht")?>" method='post'>
        <label for="arv1">Arv1</label>
        <input type="number" name="arv1" id="arv1" min="0" max="10" step="1">
        <br>
        <label for="arv2">Arv2</label>
        <input type="number" name="arv2" id="arv2" min="0" max="10" step="1">
        <input type="submit" value="Kontrolli">
    </form>
<?php
if(isset($_REQUEST["arv1"])){
    if($_REQUEST["arv1"]==$arv1){
        if($_REQUEST["arv2"]==$arv2){

            echo "õige";
            echo "<body style='background-color: lightgreen'>";
        }
    }
}
highlight_file('matemTehted.php');