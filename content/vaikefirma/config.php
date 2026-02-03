<?php
$serverinimi='localhost';
$kasutajanimi='airon';
$parool='';
$andmebaasinimi='d141163_firma';
$yhendus=new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
$yhendus->set_charset('UTF8');