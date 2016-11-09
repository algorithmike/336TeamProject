<?php
session_start();
?>
<html>
    <header>
        
    </header>
    <body>
        <?php
        foreach($_SESSION as $value){
            echo $value; echo "<br>";
        }
        ?>
    </body>
</html>