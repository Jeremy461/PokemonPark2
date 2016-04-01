<?php
$host = "sql.cmi.hro.nl"; //sql.cmi.hro.nl -- localhost
$database = "0909756"; //studentnummer -- pokemon_in_the_park
$user = "0909756"; //studentnummer -- root
$password = "iethaequ"; //iethaequ

$db = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_connect_error());

//Get the result set from the database with a SQL query
//$query = "SELECT * FROM pokemons";
//$result = mysqli_query($db, $query);
////Loop through the result to create a custom array
//$pokemons = [];
//while ($row = mysqli_fetch_assoc($result)) {
//    $pokemons[] = $row;
//}
