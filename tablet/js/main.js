

window.addEventListener('load', init);


function init(){
    document.getElementById("round")
        .addEventListener("click", getPokemonData);
    playMusic();

}





//background music
function playMusic() {
    var backgroundMusic = new Audio("Sound_effects/BackgroundMusic.mp3");
    backgroundMusic.play();
}

function getPokemonData(){
    $.ajax({
        dataType: "json",
        url: 'pokemon.php',
        success: getPokemonHandler
    });
}

function clearBox(elementID)
{
    document.getElementById(elementID).innerHTML = "";
}

function getPokemonHandler(data) {

    var rnd = Math.floor((Math.random() * data.pokeData.length));
    console.log(data.pokeData[rnd]);

    //reset previous records
    clearBox('pokemonContainer');

    //name and type
    //var pokemonName = createDomElement({
    //    tagName: 'h1',
    //    attributes: {
    //        id: 'pokemonName'
    //    },
    //    content: data.pokeData[rnd].name
    //});
    //document.getElementById("pokemonContainer").appendChild(pokemonName);


    $.ajax({
        url: 'pokemonfound.php?pokemonname=' + data.pokeData[rnd].name,
        success: function(data) {
            //console.log(data);
            //console.log("ajax call gelukt")
        }
    });

    var pokemonType = createDomElement({
        tagName: 'h1',
        attributes: {
            id: 'pokemonType'
        },
        content: data.pokeData[0].type
    });
    document.getElementById("pokemonContainer").appendChild(pokemonType);

    //createHTMLElement('h1', data.pokeData.id);


    //nidoran m/f fix
    if(data.pokeData.id == 32){
        data.pokeData.name = "nidoranm";
    } else if(data.pokeData.id == 29){
        data.pokeData.name = "nidoranf";
    }

    ////image
    //var image = "http://www.pokestadium.com/sprites/xy/" + data.pokeData[rnd].name + ".gif";
    //var pokeImg = document.createElement("img");
    //pokeImg.setAttribute('src', image);
    //pokeImg.setAttribute('id', "pokemonImg");
    //document.getElementById("pokemonContainer").appendChild(pokeImg);


    //QR-code generator
    var qrCode = "https://api.qrserver.com/v1/create-qr-code/?data=stud.hosted.hr.nl/0909756/websites/PokemonPark2/user/php/" +
        "pokemonfound.php?pokemonname=" + data.pokeData[rnd].name;
    var qrCodeGenerator = document.createElement("img");
    qrCodeGenerator.setAttribute('src', qrCode);
    qrCodeGenerator.setAttribute('id', "qrCode");
    document.getElementById("pokemonContainer").appendChild(qrCodeGenerator);

    //sound
    var mp3 = ".mp3";
    var cryId = "Pokemon_Sound/" + data.pokeData.id + mp3;
    var pokeCry = new Audio(cryId);
    pokeCry.play();

}

function createDomElement(properties)
{
    var domElement = document.createElement(properties.tagName);
    var attributes = properties.attributes;

    for (var prop in attributes){
        domElement.setAttribute(prop, attributes[prop]);
    }

    if(properties.content){
        domElement.innerHTML = properties.content;
    }
    return domElement;
}
