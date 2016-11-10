<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <header>
        
    </header>
    <body>
        <?php
        if(isset($_SESSION)){
            $arr = $_SESSION['animal_names'];
        }
        echo "<div class=\"cart\"><div class=\"title\">Shopping Cart Contents:</div><br><div class=\"contents\">";
            for($i = 0; $i < count($arr); $i++){
                echo $i+1 . ") " . $arr[$i]; echo "<br>";
            }
        echo "</div><br><br><br><div class=\"returnbutton\"><a href=\"main.php\">Return</a></div></div>";
        ?>
    </body>
</html>