<?php
require_once "core/init.php";
require_once "modules/header.php";
?>
<main class="mainB">
<?php
        if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["email"] != "" && $_POST["password"] != "") {
            require_once "./core/user.class.php";

            $email = $_POST["email"];
            $password = $_POST["password"];
            $email = trim($email);
            $email = strtolower($email); // email transformé en minuscule
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $currentUser = User::login($email, $password);

                if ($currentUser->id > 0) {
                    $_SESSION["user-id"] = $currentUser->id;
                    $_SESSION["user"] = $currentUser->email;
                    header('Location: profile.php?page=home');
                } else {
                    header('Location: login.php?login_err=password');
                } 
            } else {
                echo "Pas le bon format d'email";
            }
        }
    ?>
    <div class="mainL">
        <div class="text">
            <h1 class="text-white">login</h1>
            <h2 class="h2Login">glad to see you again.</h2>
            <form class="loginForm" action="" method="post">
                <label class="labelEmail"for="email">email :</label>
                <input class="text-input1" type="email" name="email" placeholder="Email" required>
                <label class="labelPassword"for="email">password :</label>
                <input class="text-input2" type="password" name="password" placeholder="Password" required>
                <a class="linkLog" href="lostPass.php">Forgot your password?</a>
                <input class="btnLog" type="submit">
                <a class="linkLog" href="register.php">Don't have an account? Sign up now</a>
            </form>
        </div>

    </div>

    <div class="mainR">
        <div class="photoRoad">
            <div class="bgImgRoad"></div>
        </div>
    </div>


</main>
</body>

</html>