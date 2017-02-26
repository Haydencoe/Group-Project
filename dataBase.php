<?php
$servername = "db668576206.db.1and1.com";
$username = "dbo668576206";
$password = "hayden301";
$dbname = "db668576206";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else{
     echo "Connection to MySQL server " .$servername . " successful!
" . PHP_EOL. "<br>";
}


$db_selected = mysqli_select_db($conn, $dbname);
if (!$db_selected) {
    die ('Can\'t select database: ' . mysqli_connect_error());
}
else {
    echo 'Database ' . $dbname . ' successfully selected!'. "<br>";
}


/*
// sql to create table
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
studentID VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table students created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
*/

/*
//sql to insert data into table

$sql2 = "INSERT INTO students (firstname, lastname, studentID)
VALUES ('Hayden', 'Coe', '309219');";
$sql2 .= "INSERT INTO students (firstname, lastname, studentID)
VALUES ('Kieran', 'Brown', '271592');";
$sql2 .= "INSERT INTO students (firstname, lastname, studentID)
VALUES ('Sam', 'Price', '308401');";
$sql2 .= "INSERT INTO students (firstname, lastname, studentID)
VALUES ('Steven', 'Trevor', '312825');";
$sql2 .= "INSERT INTO students (firstname, lastname, studentID)
VALUES ('Patrick', 'Scott', '273051')";

if (mysqli_multi_query($conn, $sql2)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
*/

/*
// sql to delete a record
$sql4 = "DELETE FROM students WHERE id=4";

if (mysqli_query($conn, $sql4)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



*/

//mysqli_query($conn,'TRUNCATE TABLE students'); //WARNING deletes everything in the table but resets table contents order.

//Sql to check data



$sql3 = "SELECT id, firstname, lastname, studentID FROM students ";
$result = mysqli_query($conn, $sql3);


if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) 
    
    {
        echo "Row ID: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. ", Student I.D. : " . $row["studentID"]."<br>";
    
    
     
    }

   


} else {
    echo "0 results";
}



$user = $_GET['firstname'];

//$user_id = $_POST['firstname'];


//echo ("First name: " . $user. "<br />\n");



$query = "SELECT * FROM students WHERE studentID = '$user'";//. mysqli_real_escape_string($conn,$user_id);
    
    $result2 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result2) == 1) 
    {
    
       
    
        echo "You're a student!"; //Pass, do something
    
    
        while($row2 = mysqli_fetch_array($result2)){
            echo "<tr>";
                
                echo "<td>" . "<br> Search Result: <br> Name: " . $row2['firstname'] . "</td>";
                echo "<td>" ." " . $row2['lastname'] . "</td>";
                echo "<td>" . " Student ID: " . $row2['studentID'] . "</td>";
            echo "</tr>";
        
        
             //echo "<ul id=decoders>" . $row2['firstname'] . "</ul>\n"
        }

    
    
    } 
    else 
    {
        echo "Student I.D. not recognised."; //Fail
    }

   


mysqli_close($conn);
?>