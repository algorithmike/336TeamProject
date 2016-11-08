<!DOCTYPE HTML>
<html>
<!--1) Database has at least 3 tables with 40 records (10 points) ***********DONE*********** -->
<!--2) Users can filter data using at least three fields (15 points) ***********DONE*********** -->
<!--3) Users can sort results (asc,desc) using at least one field (10 points) ***********DONE***********-->
<!--4) Users can click on an item to get further info (10 points) ***********MIKE IS WORKING ON THIS***********-->
<!--5) Users can add items to shopping cart using a Session (10 points)-->
<!--6) Users can see the content of the shopping cart (10 points)-->
<!--7) The web pages have a nice and consistent look and feel (10 points)-->
<!--8) The team used Github for collaboration (10 points) ***********DONE***********-->
<!--9) The team used Trello or a similar tool for project management (10 points) ***********DONE***********-->
<!--10) In a Word document include User Story, Database schema, and mock up (5 points) UPLOAD these documents here and ALSO link them from your C9 site  (5 points)-->
    <head>
        <title>Project 2</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css/">
    </head>
    <body>
        <div class="wrapper">
            <!--FORM-->
            <form action="" method="post">
                <b>Sort by:</b> <select name="sorting">
                    <option value='byIDasc'>Ascending ID</option>
                    <option value='byIDDesc'>Descending ID</option>
                    <option value='byAgeAsc'>Ascending Age</option>
                    <option value='byAgeDesc'>Descending Age</option>
                </select><br />
                <b>Max Age:</b> <input type="text" name="maxAge" value="" size="5" />
                <br />
                <b>Max Adoption Fee:</b> <select name="maxFee">
                    <option value='unlimited'>No Limit</option>
                    <option value='100'>100</option>
                    <option value='75'>75</option>
                    <option value='50'>50</option>
					<option value='25'>25</option>
                </select><br />
                <b>Gender: </b><input type="radio" name="gender" value="either" checked>Either <input type="radio" name="gender" value="female">Female <input type="radio" name="gender" value="male">Male
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
    			
    			$displayWHERE = false;
    			
                //QUERY
                //GENDER
                if($_POST['gender'] == "male"){
                    $gender = " WHERE gender = 'M'";
                } elseif($_POST['gender'] == "female"){
                    $gender = " WHERE gender = 'F'";
                } else{
                    $gender = " WHERE gender = 'F' OR gender = 'M'";
                }
                
                

                if($_POST['sorting'] == "byAgeDesc"){
                    $orderBy = " ORDER BY x.age DESC";
                } elseif($_POST['sorting'] == "byIDDesc"){
                    $orderBy = " ORDER BY x.animal_ID DESC";
                }
                elseif($_POST['sorting'] == "byAgeAsc"){
                    $orderBy = " ORDER BY x.age ASC";
                }else{
                    $orderBy = " ORDER BY x.animal_ID ASC";
                }
                
                //MAX AGE
                if (!empty($_POST['maxAge'])) {
                    $maxAge = " AND age <= ".$_POST['maxAge'];
                }
                else{
                    $maxAge = "";
                }
                
                //MAX FEE
                if(empty($_POST['maxFee'])){
                    $maxFee = "";
                }
                else if ($_POST['maxFee'] == "unlimited") {
                    $maxFee = "";
                }
                else{
                    $maxFee = " AND adoption_fee <= ".$_POST['maxFee'];
                }
                
                
                $table1 = 'detailed_info';
                $table2 = 'animal_cost';
                $table3 = 'general_info';
                $sqlquery = 'SELECT * FROM '.$table1.' x LEFT JOIN '.$table2.' y ON x.animal_ID = y.animal_ID LEFT JOIN '.$table3.' z ON z.animal_ID = x.animal_ID'.$gender.$maxAge.$maxFee.$orderBy;
                $statement = $dbConn -> prepare($sqlquery);
                $statement -> execute();
                
                //SET UP HTML TABLE, FETCH AND DISPLAY DATA
                echo '<h1>Table: query implementing form data</h1>'.$sqlquery.'<table>';
                echo '<tr><td style="font-weight: bold">ID</td><td style="font-weight: bold">Animal Name</td><td style="font-weight: bold">Gender</td><td style="font-weight: bold">Color</td><td style="font-weight: bold">Size</td><td style="font-weight: bold">Age</td><td style="font-weight: bold">Adoption Fee</td></tr>';
                while($row = $statement -> fetch()){
                    echo '<tr><td>'.$row["animal_ID"].'</td><td>'.$row["name"].'</td><td>'.$row["gender"].'</td><td>'.$row["color"].'</td><td>'.$row["size"].'</td><td>'.$row["age"].'</td><td>$'.$row["adoption_fee"].'</td></tr>';
                }
                echo '</table>';
    		
            ?>
        </div>
    </body>
</html>