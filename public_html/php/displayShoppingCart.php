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
            for($i = 0; $i < count($arr); $i++){
                echo $arr[$i]; echo "<br>";
            }
        ?>
    </body>
</html>