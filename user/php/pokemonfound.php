<?php

session_start();

require_once "../data.php";



if(isset($_POST['catch'])){

    $pokemonname = isset($_GET['pokemonname']) ? $_GET['pokemonname'] : '';
    $returnData = [
        'pokemonname' => $pokemonname
    ];

    $_SESSION["pokemonname"] = $pokemonname;

    echo $_SESSION["pokemonname"];

    $query = "INSERT INTO pokemons (pokemonname)
              VALUES ('$pokemonname')";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">

    <title>Pokemon</title>

    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <script src="js/prefixfree.min.js"></script>
</head>
<body id="body">

<input id="round" type="button" name="generate" value="Generate">

<div id="pokemonContainer">
</div>

<div id="weatherContainer">
</div>

<form id="catchPokemon" method="post" action="index.php">
    <input class="btn" type="submit" name="catch" value="Catch">
    <input class="btn" type="submit" name="flee" value="Flee">
</form>




<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdn.rawgit.com/monkeecreate/jquery.simpleWeather/master/jquery.simpleWeather.min.js'></script>
<script src="js/main.js"></script>
<script src="js/weather.js"></script>

</body>
</html>
