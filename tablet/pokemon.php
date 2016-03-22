<?php
header("Content-type: application/json");
$pokemonName = "http://pokeapi.co/api/v2/pokemon/";
$pokemonType = "http://pokeapi.co/api/v2/type/";
$id = 0;
$typeId = 0;


$weather = isset($_GET['weather']) ? $_GET['weather'] : '';
$temperature =isset($_GET['temperature']) ? $_GET['temperature'] : '';
$returnData = [
    'weather' => $weather,
    'temperature' => $temperature
];
//$weather = "thunderstorms";
//$temperature = 12;


$waterArray = ["drizzle", "freezing rain", "showers", "mixed rain and hail"];
$flyingArray = ["windy", "blustery"];
$electricArray = ["severe thunderstorms", "thunderstorms", "isolated thunderstorms", "scattered thunderstorms"];



if(in_array($weather, $waterArray)){
    $data = file_get_contents($pokemonType.'11/');
} else if(in_array($weather, $flyingArray)){
    $data = file_get_contents($pokemonType.'3/');
} else if(in_array($weather, $electricArray)){
    $data = file_get_contents($pokemonType.'13/');
} else if($temperature > 25){
    $data = file_get_contents($pokemonType.'10/');
} else if($temperature < 0){
    $data = file_get_contents($pokemonType.'15/');
} else {
    $data = file_get_contents($pokemonType.'1/');
}

//Choose random pokemon ID between 1-151
$id = rand(1, 151);
//Made variable with API link + random chosen ID


//decode, niet altijd
$pokeDataBank = json_decode($data);
//assoc array

$pokemonList = [];

foreach($pokeDataBank->pokemon as $pokemon){
    $pokemonList['pokeData'][]=[
        'name' => $pokemon->pokemon->name
    ];
}

//$data = file_get_contents($pokemonName.$id.'/');
//$pokemonArray = [];
//
//$pokemonArray['pokeData'] = [
//    'name' => $pokeDataBank->name,
//    'id' => $pokeDataBank->id
//];
//
//foreach($pokeDataBank->types as $pokemon){
//    $pokemonArray['pokeData'][] = [
//    'type' => $pokemon->type->name
//    ];
//}


//encode
//$pokeDataReturn = json_encode($pokemonArray);

$pokeDataReturn = json_encode($pokemonList);
//$weatherDataReturn = json_encode($returnData);
//header setten

echo $pokeDataReturn;

