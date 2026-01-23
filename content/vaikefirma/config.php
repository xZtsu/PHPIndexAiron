<?php
$serverinimi='localhost';
$kasutajanimi='airon';
$parool='12345';
$andmebaasinimi='firmadb';
$yhendus=new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
$yhendus->set_charset('UTF8');