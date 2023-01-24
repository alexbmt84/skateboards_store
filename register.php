<?php
require_once "core/init.php";
require_once "modules/header.php";
?>
<main class="mainB">
    
    <div class="mainL">
        <div class="text">
            <h1 class="text-white">register</h1>
            <h2 class="h2Login">sign up and start shopping,</h2>
            <form class="loginForm" action="register_conf.php" method="POST">
                <label class="labelNom">nom :</label>
                <input class="text-input1" type="text" name="nom" placeholder="Nom" required>
                <label class="labelEmail">email :</label>
                <input class="text-input1" type="email" name="email" placeholder="Email" required>
                <label class="labelPassword">password :</label>
                <input class="text-input2" type="password" name="password" placeholder="Password" required>
                <label class="labelPassword">password :</label>
                <input class="text-input2" type="password" name="password_retype" placeholder="Confirm your password" required>
                <input class="btnLog" type="submit">
                <a class="linkLog" href="login.php">Already have an account? Sign in</a>
            </form>
        </div>

    </div>

    <div class="mainR">
        <div class="photoReg">
            <div class="bgImgReg"></div>
        </div>
    </div>


</main>
</body>

</html>