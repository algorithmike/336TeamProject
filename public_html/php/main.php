<!DOCTYPE HTML>
<html>
    <head>
        <title>Project 2</title>
    </head>
    <body>
        <div class="wrapper">
            <?php
                //CONNECT TO DB
                $host = 'localhost';
                $user = 'project2_is_coo';
                $password = 'a1b2xyZ123';
                $database = 'project2_is_coo';
                $dbConn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
    			
                //QUERY
                $table1 = 'general_info';
                $sqlquery = 'SELECT * FROM '.$table1.' ORDER BY animal_ID ASC;';
                $statement = $dbConn -> prepare($sqlquery);
                $statement -> execute();
                
                //SET UP HTML TABLE, FETCH AND DISPLAY DATA
                echo '<h1>Everything In This Table: general_info</h1>'.$sqlquery.'<table>';
                echo '<tr><td style="font-weight: bold">ID</td><td style="font-weight: bold">Name</td><td style="font-weight: bold">Description</td></tr>';
                while($row = $statement -> fetch()){
                    echo '<tr><td>'.$row["animal_ID"].'</td><td>'.$row["name"].'</td><td>'.$row["description"].'</td></tr>';
                }
                echo '</table>';
            ?>
        </div>
    </body>
</html>