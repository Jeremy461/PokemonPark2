<?php
session_start();
if(!isset($_SESSION['LoggedIn'])){
    header:('Location: noLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">

    <title>Pokemon</title>

    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <script src="js/prefixfree.min.js"></script>
</head>
<body id="body">
<div id="titel">PokéPark Rotterdam</div>
<br><br>
<form id="catch" action="../qrReader.html">
<button type="submit" class ="btn">Catch</button></form>
<br>
<form id="menu" action="pokedex.php">
<button class ="btn">List</button></form>
<br>
<form id="pokeballs" action="pokeballs.php">
<button class ="btn">Poké Balls</button></form>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>
