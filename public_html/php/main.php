<!DOCTYPE HTML>
<html>
<!--1) Database has at least 3 tables with 40 records (10 points)-->
<!--2) Users can filter data using at least three fields (15 points)-->
<!--3) Users can sort results (asc,desc) using at least one field (10 points)-->
<!--4) Users can click on an item to get further info (10 points)-->
<!--5) Users can add items to shopping cart using a Session (10 points)-->
<!--6) Users can see the content of the shopping cart (10 points)-->
<!--7) The web pages have a nice and consistent look and feel (10 points)-->
<!--8) The team used Github for collaboration (10 points)-->
<!--9) The team used Trello or a similar tool for project management (10 points)-->
<!--10) In a Word document include User Story, Database schema, and mock up (5 points) UPLOAD these documents here and ALSO link them from your C9 site  (5 points)-->
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css/">
    </head>
    <body>
        <div class="wrapper">
            <!--FORM-->
            <form action="" method="post">
                <b>Max Age:</b> <input type="text" name="numOfRows" value="" size="5" />
                <br />
                <b>Max Adoption Fee:</b> <select name="max">
                    <option value='unlimited'>No Limit</option>
                    <option value='100'>100</option>
                    <option value='75'>75</option>
                    <option value='50'>50</option>
					<option value='25'>25</option>
                </select>
                <br />
                <input type="submit" value="Filter" name="submit" />
            </form>
            
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
                echo '<h1>Table: detailed_info</h1>'.$sqlquery.'<table>';
                echo '<tr><td style="font-weight: bold">ID</td><td style="font-weight: bold">Name</td><td style="font-weight: bold">Description</td></tr>';
                while($row = $statement -> fetch()){
                    echo '<tr><td>'.$row["animal_ID"].'</td><td>'.$row["name"].'</td><td>'.$row["description"].'</td></tr>';
                }
                echo '</table>';
                    
                //QUERY
                $table1 = 'detailed_info';
                $sqlquery = 'SELECT * FROM '.$table1.' ORDER BY animal_ID ASC;';
                $statement = $dbConn -> prepare($sqlquery);
                $statement -> execute();
                
                //SET UP HTML TABLE, FETCH AND DISPLAY DATA
                echo '<h1>Table: general_info</h1>'.$sqlquery.'<table>';
                echo '<tr><td style="font-weight: bold">ID</td><td style="font-weight: bold">Gender</td><td style="font-weight: bold">Color</td><td style="font-weight: bold">Size</td><td style="font-weight: bold">Age</td></tr>';
                while($row = $statement -> fetch()){
                    echo '<tr><td>'.$row["animal_ID"].'</td><td>'.$row["gender"].'</td><td>'.$row["color"].'</td><td>'.$row["size"].'</td><td>'.$row["age"].'</td></tr>';
                }
                echo '</table>';
                
                //QUERY
                $table1 = 'animal_cost';
                $sqlquery = 'SELECT * FROM '.$table1.' ORDER BY animal_ID ASC;';
                $statement = $dbConn -> prepare($sqlquery);
                $statement -> execute();
                
                //SET UP HTML TABLE, FETCH AND DISPLAY DATA
                echo '<h1>Table: animal_cost</h1>'.$sqlquery.'<table>';
                echo '<tr><td style="font-weight: bold">ID</td><td style="font-weight: bold">Adoption Fee</td></tr>';
                while($row = $statement -> fetch()){
                    echo '<tr><td>'.$row["animal_ID"].'</td><td>$'.$row["adoption_fee"].'</td></tr>';
                }
                echo '</table>';
            ?>
        </div>
    </body>
</html>