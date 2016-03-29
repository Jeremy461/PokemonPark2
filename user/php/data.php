<?php
$host = "localhost"; //sql.cmi.hro.nl -- localhost
$database = "pokemon_in_the_park"; //studentnummer -- databasenaam
$user = "root"; //studentnummer -- root
$password = ""; //iethaequ

$db = mysqli_connect($host, $user, $password, $database) or die("Error: " . mysqli_connect_error());

//Get the result set from the database with a SQL query
$query = "SELECT * FROM pokemons";
$result = mysqli_query($db, $query);
//Loop through the result to create a custom array
$pokemons = [];
while ($row = mysqli_fetch_assoc($result)) {
    $pokemons[] = $row;
}
