<?php
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

<table>
    <tr>
        <td></td>
        <td>Pokéballs</td>
        <td>#</td>
    </tr>
    <tr>
        <td><img src="../pokeballs_img/pokeballv2.png"> </td>
        <td>Poké Ball</td>
        <td>x</td>
    </tr>
    <tr>
        <td><img src="../pokeballs_img/greatballv2.png"></td>
        <td>Great Ball</td>
        <td>x</td>
    </tr>
    <tr>
        <td><img src="../pokeballs_img/ultraballv2.png"></td>
        <td>Ultra Ball</td>
        <td>x</td>
    </tr>
    <tr>
        <td><img src="../pokeballs_img/masterballv2.png"></td>
        <td>Master Ball</td>
        <td>x</td>
    </tr>
</table>

<form id="back" action="menu.php">
    <button class ="btn">Back</button>
</form>

<form id="more" action="shop.php">
    <button class ="btn">Get More</button>
</form>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>
