<?php
session_start();

require_once "../data.php";
//Wanneer er op de inlog-knop gedrukt wordt:
if (isset($_POST['login'])) {

    //De ingevulde data in de invoervelden wordt in variabelen gezet
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Er wordt gekeken of 1 of meerdere van de verkregen variabelen leeg zijn, als dit het geval is wordt er een error toegevoegd aan de errors-array.

    if ($username == "") {
        $errors[] = 'Username kan niet leeg zijn';
    }
    if ($password == "") {
        $errors[] = 'Password kan niet leeg zijn';
    }


    //Als de errors-array leeg is:
    if (!isset($errors))
    {
        //Er wordt een query aangemaakt die zal kijken of er een overeenkomst is tussen de ingevulde gebruikersnaam, het ingevulde wachtwoord in combinatie
        //met een gebruikersnaam + wachtwoord uit de database. Als er een overeenkomst is zal de gebruiker naar de admin-pagina gestuurd worden en zal de Session
        //'LoggedIn' starten.
        $query = "SELECT * FROM accounts WHERE username = '$username'
                  AND password = '$password'";
        $result = mysqli_query($db, $query);
        var_dump($result);
        if (mysqli_num_rows($result) > 0){
header('Location: data.php');
$_SESSION['LoggedIn'] = $username;
exit();

//Als er geen overeenkomsten zijn zal er een error worden toegevoegd aan de errors-array
} else {
$errors[] = 'Gebruikersnaam/wachtwoord onjuist';
}
mysqli_query($db, $query);

}
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

<div class="errors">
    <?php if (isset($errors)) { ?> <!-- Als er errors aanwezig zijn: -->
        <ul>
            <?php for ($i = 0; $i < count($errors); $i++) { ?>
                <li><?= $errors[$i]; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
<form id="loginForm" method="post" action="php/menu.php">
    <h1>Username:</h1>
    <input id="username" type="text" name="username">
    <h1>Password:</h1>
    <input id="password" type="password" name="password">
    <br><br>
    <input id="round" type="submit" name="login" value="Login">
</form>

<h2>No account? <a href="php/register.php">Register here</a></h2>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>

