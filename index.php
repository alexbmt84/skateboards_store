<?php
require_once "core/init.php";
require_once "modules/header.php";

if(isset($_SESSION['user']) && isset($_SESSION['user-id'])){
    $user = $user_obj->findByiD($_SESSION['user-id']);
    header('Location: profile.php');
    if($user ===  false){
        header('Location: logout.php');
        exit;
    }

}
?>
<main class="mainB">
    <div class="mainL">
        <div class="text">
            <h1 class="text-white">be extra...</h1>
            <h2 class="h2Index">try w&m and look at what you've done...</h2>
            <h3>“ When I skate, it's like my brain is turned off.
                not thoughts, just feelings.”
            </h3>
            <h4>Valeria Figueroa</h4>
            <div class="Card">
                <div class="CardInner">
                    <label>What are you searching for?</label>
                    <div class="container">
                        <div class="Icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#657789" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </div>
                        <div class="InputContainer">
                            <input placeholder="It just can't be pizza..." />
                        </div>
                    </div>
                </div>
            </div>
            <div class="divBtn">
                <button class="btn" onclick="window.location.href='skateboards.php';">skateboards</button>
                <button class="btn" onclick="window.location.href='women.php';">women</button>
                <button class="btn" onclick="window.location.href='men.php';">men</button>
                <button class="btn" onclick="window.location.href='contact.php';">about us</button>
            </div>
        </div>

    </div>

    <div class="mainR">
        <div class="photo">
            <div class="bgImg"></div>
        </div>
    </div>


</main>
</body>

</html>