<?php
require_once "../core/init.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W&M</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>

        <section class="top-navL">
            <img src="../img/logowm.svg" class="lgwm" alt="">
        </section>
        <section class="top-navR">
            <ul class="menu">
                <li><a class="a" href="profile.php">HOME</a></li>
                <li><a class="a" href="./membres/skateboards_membres.php">SKATEBOARDS</a></li>
                <li><a class="a" href="men_membres.php">MEN</a></li>
                <li><a class="a" href="women_membres.php">WOMEN</a></li>
                <li><a class="a" href="contact_membres.php">CONTACT</a></li>
                <div class="log">
                    <li><a class="under" href="login.php">LOGIN</a></li>
                    <li><a class="under" href="register.php">SIGN UP</a></li>    
                </div> 
            </ul>
        </section>
    </header>