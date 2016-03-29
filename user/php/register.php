<?php

require_once "data.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];


    //Er wordt gekeken of 1 of meerdere van de verkregen variabelen leeg zijn, als dit het geval is wordt er een error toegevoegd aan de errors-array.

    if ($username == "") {
        $errors[] = 'Username kan niet leeg zijn';
    }
    if ($password == "") {
        $errors[] = 'Password kan niet leeg zijn';
    }
    if ($confirm == "") {
        $errors[] = 'Bevestig je wachtwoord!';
    }
    if ($password !== $confirm) {
        $errors[] = 'Wachtwoorden zijn niet gelijk.';
    }


    //Als de errors-array leeg is:
    if (!isset($errors))
    {
        //Er wordt een query gemaakt die de ingevulde gebruikersnaam en het wachtwoord in de database zal zetten
        $query = "INSERT INTO accounts (username, password)
                  VALUES ('$username', '$password')";

        //De query wordt uigevoerd
        mysqli_query($db, $query);

        //De gebruiker wordt naar de registered-pagina gestuurd
        header('Location: registered.php');



        exit;
    }
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

<div class="errors">
    <?php if (isset($errors)) { ?> <!-- Als er errors aanwezig zijn: -->
        <ul>
            <?php for ($i = 0; $i < count($errors); $i++) { ?>
                <li><?= $errors[$i]; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
<form id="registerForm" method="post" action="../index.php">



    <h1>Username:</h1>
    <input id="username" type="text" name="username">
    <h1>Password:</h1>
    <input id="password" type="password" name="password">
    <h1>Confirm password:</h1>
    <input id="password" type="password" name="confirm">
    <br><br>
    <input id="round" type="submit" name="submit" value="Register">
</form>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../js/main.js"></script>

</body>
</html>

