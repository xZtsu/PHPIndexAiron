<?php
$serverinimi = "localhost";
$kasutajanimi = "airon";
$parool = '';
$andmebaasinimi = "airon";
$yhendus=new mysqli($serverinimi,$kasutajanimi,$parool,$andmebaasinimi);
$yhendus->set_charset("utf8");

