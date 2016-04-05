<?php
session_start();

require_once "../../data.php";

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
<div id="titel">Pokémon</div>

<table>
        <?php
        //De query wordt aangemaakt waarmee alle data uit de database gehaald wordt
        $query = "SELECT * FROM pokemons";
        //De resultaten van de query worden in $result gezet
        $result = mysqli_query($db, $query);
        //Wanneer het aantal rijen in $result hoger is dan 0, oftewel wanneer er data uit de database is gekomen:
        if (mysqli_num_rows($result) > 0) {

        //Met deze for-loop die steeds 2 keer runned wordt de <td> aangemaakt
            for ($i = 1; $i < 2; $i++) {

            while ($row = mysqli_fetch_assoc($result)) {

                ?> <tr>

        <!-- De data uit de database zal weergegeven worden in een alinea, htmlentities zorgt er voor dat, in het geval dat een gebruiker
        leestekens invult, deze leestekens worden weergegeven als html entiteiten. Zo zou '&' weergegeven worden als &amp. Dit zorgt
        er voor dat de gebruiker geen scripts kan laten runnen door deze in te vullen in de invulvelden. -->

        <td>
            <?= htmlentities($row['pokemonname']) ?> <br>
        </td>
                <td>
                    <img src="http://www.pokestadium.com/sprites/xy/<?= $row['pokemonname'] ?>.gif">
                </td>

                <?php
            }
                ?>
    </tr>
    <?php }} ?>
</table>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>
