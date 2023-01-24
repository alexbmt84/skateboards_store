<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W&M</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>

        <section class="top-navL">
            <img src="img/logowm.svg" class="lgwm" alt="">
        </section>
        <section class="top-navR">
            <ul class="menu">

            <?php 
            if(!empty($_SESSION['user']) && (isset($_SESSION['user-id']))){
                echo " <li><a class='a' href='index.php'>HOME</a></li>
                <li><a class='a' href='skateboards.php'>SKATEBOARDS</a></li>
                <li><a class='a' href='men.php'>MEN</a></li>
                <li><a class='a' href='women.php'>WOMEN</a></li>
                <li><a class='a' href='contact.php'>CONTACT</a></li>
                <div class='log'>
                <li><a class='under' href='edit_profile.php'>PROFILE</a></li>
                <li><a class='under' href='logout.php'>LOGOUT</a></li>";
                
            } else {
                echo "<li><a class='a' href='index.php'>HOME</a></li>
                <li><a class='a' href='skateboards.php'>SKATEBOARDS</a></li>
                <li><a class='a' href='men.php'>MEN</a></li>
                <li><a class='a' href='women.php'>WOMEN</a></li>
                <li><a class='a' href='contact.php'>CONTACT</a></li>
                <div class='log'>
                <li><a class='under' href='login.php'>LOGIN</a></li>
                <li><a class='under' href='register.php'>SIGN UP</a></li>";
            }
            ?>
                
                </div> 
            </ul>
        </section>
    </header>