<?php
require_once "core/init.php";
require_once "modules/header.php";
?>
<main class="mainB">
    <div class="sktMain">
        <div class="sktImg">
            <div class="sktBg"></div>
        </div> 
        <div class="sktImg2">
        <div class="sktBg2"></div>
        </div>

    </div>
        
    <div class="mainR"> 
        <div class="text">
            <h1 class="h1Welcome2">w&m graphic skt.1</h1>
            <?php 
                if(!empty($_SESSION['user']) && (isset($_SESSION['user-id']))){
                echo "<h4>69.99€</h4>";
                } else {
                    echo "<h4>You must be logged in to see the price.</h4>";
                }
            ?>
            <hr>
            <h4>style</h4>
            <h4>Concave: Medium | Shape: Standard | Construction: 7-Ply Maple</h4>
            <h4>Dimensions :
                8.125" x 31.875"
                Wheelbase: 14.25"
            </h4>
            <h4>Article number : 0266463</h4>
        </div>
        <?php
            if(!empty($_SESSION['user']) && (isset($_SESSION['user-id']))){
                echo "<button class='btnCart'>- 1 +</button>";
                echo "<button class='btnCart'>add to cart</button>";
            } else {
                echo "<h4>You must login to add this item into your cart !</h4>";
            }
            
                
        ?>
    </div>


</main>
</body>

</html>