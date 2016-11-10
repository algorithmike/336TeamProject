<?php
session_start();
?>
<html>
    <header>
        
    </header>
    <body>
        <?php
        if(isset($_SESSION)){
            $arr = $_SESSION['animal_names'];
        }
        echo "<div class=\"carttitle\">Shopping Cart Contents:</div>";
            for($i = 0; $i < count($arr); $i++){
                echo $arr[$i]; echo "<br>";
            }
        echo "<div class=\"backbutton\">Button here</div>";
        ?>
    </body>
</html>