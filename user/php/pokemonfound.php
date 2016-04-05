<?php
session_start();

if(!isset($_SESSION['LoggedIn'])){
    header:('Location: noLogin.php');
}

require_once "../../data.php";
$pokemonname = $_GET['pokemonname'];

if(isset($_POST['catch'])){



    $query = "INSERT INTO pokemons (pokemonname)
              VALUES ('$pokemonname')";

    mysqli_query($db, $query);

    header('Location: pokedex.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">

    <title>Pokemon</title>

    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
</head>
<body id="body">

<h1>A wild <?= $pokemonname ?> has appeared!</h1>

<div id="pokemonContainer">
    <img src="http://www.pokestadium.com/sprites/xy/<?= $pokemonname ?>.gif">
</div>

<h1>What would you like to do?</h1>

<form id="catchPokemon" method="post" action="">
    <input class="btn" type="submit" name="catch" value="Catch">
</form>
<form id="fleePokemon" method="post" action="menu.php">
    <input class="btn" type="submit" name="flee" value="Flee">
</form>





<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdn.rawgit.com/monkeecreate/jquery.simpleWeather/master/jquery.simpleWeather.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>
