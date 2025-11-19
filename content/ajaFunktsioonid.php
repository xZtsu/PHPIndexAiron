<?php
echo "<div class='flex-container'>";

echo "<div>";

echo "<h2>Aja funktsioonid</h2>";
echo "Tänane kuupäev ".date ('d.m.y');
// timezone- juhul kuyi timezoen ei ole määratud
// siis php kasutab aega mis on localhostis
date_default_timezone_set('Europe/Tallinn');
echo "<br>";
echo "<a href='https://www.php.net/manual/en/timezones.php'>timezones</a>";
echo "<br>";
echo "time()- aeg sekundites ".time();
echo "<br>";
echo "date() -".date("d.m.y G:i:s", time());
echo "<pre>




date('d.m.y G:i:s', time());
d - 01..31
m - 1...12
y - aastaarv
G - 24h formaat
i - minutit 0...59
s - sekundid 0....59



</pre>";

echo "</div>";

echo "<div>";

echo "<h2>Aja funktsioonid</h2>";

echo "<br>";
echo "+1min = time()+60 = ".date("d.m.y G:i:s", time()+60);
echo "<br>";
echo "+1tund = time()+60 = ".date("d.m.y G:i:s", time()+60*60);
echo "<br>";
echo "+1paev = time()+60 = ".date("d.m.y G:i:s", time()+60*60*24);
echo "<br>";
echo "mktime(tunnid, minutit, sekundid, kuu, päev, aasta)";
echo "<br>";

echo "</div>";
echo "<div>";
echo "<h2>Sünnipäeva arvutamine</h2>";
$synnipaev=mktime(13,23,43,3,15,2006);
echo "Minu sünnipäev ".date("d.m.Y G:i:s", $synnipaev);
echo "<br>";
echo "massiivi (array) abil kuvada tänane kuu nimi";
$kuud=array(1=>'Jaanuar','Veebruar','Märts','Aprill','Mai','Juuni','Juuli','September','Oktoober','November','Detsember');
$paev=date('d');
$aasta=date('Y');
$kuu=$kuud[date('m')]; // kuu nimega
echo "<br>";
echo "Tänane kuupäev kuunimega: ".$paev.".".$kuu.".".$aasta." aeg";
// kirjuta ise oma sünnipäeva kuu nimega
echo "<br>";

// kuu nimega
$synnikuu = date('n', $synnipaev);
$synniaasta=date('Y', $synnipaev);
$synnipaev1=date('d', $synnipaev);
echo "Minu sünnipäev kuu nimega: ".$synnipaev1." ".$kuud[$synnikuu]." ".$synniaasta;
echo "</div>";


