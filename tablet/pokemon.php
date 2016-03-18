<?php
header("Content-type: application/json");
$pokemonName = "http://pokeapi.co/api/v2/pokemon/";
$pokemonType = "http://pokeapi.co/api/v2/type/";
$id = 0;
//$typeId


//$weatherTest = $_GET['weather'];
//$returnData = [
//    'testData' => $weatherTest
//];


//Choose random pokemon ID between 1-151
$id = rand(1, 151);
//Made variable with API link + random chosen ID
$data = file_get_contents($pokemonName.$id.'/');

//decode, niet altijd
$pokeDataBank = json_decode($data);
//assoc array
$pokemonArray = [];

$pokemonArray['pokeData'] = [
    'name' => $pokeDataBank->name,
    'id' => $pokeDataBank->id
];

foreach($pokeDataBank->types as $pokemon){
    $pokemonArray['pokeData'][] = [
    'type' => $pokemon->type->name
    ];
}


//encode
$pokeDataReturn = json_encode($pokemonArray);
//header setten

echo $pokeDataReturn;
//
//echo json_encode($returnData);

