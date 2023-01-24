<?php
require_once "core/init.php";
require_once "modules/header.php";


if(isset($_SESSION['user']) && isset($_SESSION['user-id'])){
    $user = $user_obj->findByiD($_SESSION['user-id']);
    if($user ===  false){
        header('Location: logout.php');
        exit;
    }

}
?>   

<main class="mainB">
    
    <div class="mainL">
        <div class="text">
            <h1 class="text-white">Profile</h1>
            <h2 class="h2Login">edit your profile</h2>
            <form class="loginForm" action="edit_save.php" method="POST">
                <label class="labelNom">nom :</label>
                <input class="text-input1" type="text" name="nom" placeholder="<?= $user->nom; ?>">
                <label class="labelPassword">prenom :</label>
                <input class="text-input1" type="text" name="prenom" placeholder="<?= $user->prenom; ?>">
                <label class="labelPassword">email :</label>
                <input class="text-input1" type="email" name="email" placeholder="<?= $user->email; ?>">
                <label class="labelPassword">password :</label>
                <input class="text-input1" type="password" name="password" placeholder="Password">
                <label class="labelPassword">password :</label>
                <input class="text-input1" type="password" name="password_retype" placeholder="Confirm your password">
                <label class="labelPassword">adresse :</label>
                <input class="text-input1" type="text" name="adresse" placeholder="<?= $user->adresse; ?>">
                <label class="labelPassword">ville :</label>
                <input class="text-input1" type="text" name="ville" placeholder="<?= $user->ville; ?>">
                <label class="labelPassword">code postal :</label>
                <input class="text-input1" type="text" name="code_postal" placeholder="<?= $user->code_postal; ?>">
                <input class="btnLog" type="submit" value="save changes">
            </form>
        </div>

    </div>
    <div class="mainR">
        <div class="mainREdit">
            <div class="photoEd">
                <div class="bgImgEd"></div>
            </div>
            <div class="photo3">
                <div class="bgImg3"></div>
            </div>
        </div>
        <div class="photoLong">
            <div class="bgLong"></div>
        </div>
    </div>

</main>
</body>

</html>