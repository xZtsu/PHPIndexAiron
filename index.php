<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>PHP index leht</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="js/joonisScript.js"></script>
    <script src="js/"></script>
</head>
<body>
<!--header-->
<?php
include("header.php");
?>
<!--navegeerimismenüü-->
<?php
include("nav.php");
?>
<!--content kaustast failide sisud-->
<main>
<?php
    if(isset($_GET["leht"])){
        include('content/'.$_GET["leht"]);
    } else {
        include('content/avaleht.php');
    }
?>
</main>
<!--footer-->
<?php
include("footer.php");
?>
</body>
</html>
