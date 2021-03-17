<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Students Result</title> 
<style>
table, th, td {
    border: 3px solid white;
    text-align: center;
}

th {
    background-color: #80bfff;
    font-size: 18px;
}

td {
    text-align: center;
}   

h1{
    font-size: 2em;
    font-weight: bold;
    text-decoration: underline;
    font-style: italic;
    color: black;
    margin-top: 12px;
    margin-bottom: 15px;
}

button{
    margin-top: 0.5px;
}

</style>
</head>
<body>
<h1 style="text-align:center">Students Result</h1>
<?php
$mysqli = new mysqli("localhost","root","","result");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM table1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<center><table><tr><th>Enrollment</th><th>Name</th><th>Python Internal</th><th>Python CEC</th><th>Python External</th><th>Python Total</th><th>CC Internal</th><th>CC CEC</th><th>CC Exernal</th><th>CC Total</th><th>Grand Total</th><th>Percentage</th><th>Result</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["enrollment_no"]. "</td><td>" . $row["name"]. "</td><td>" . $row["py_int"]. "</td><td>" . $row["py_cec"]. "</td><td>" . $row["py_ext"]. "</td><td>" . $row["py_total"]. "</td><td>" . $row["cc_int"]. "</td><td>" . $row["cc_cec"]. "</td><td>" . $row["cc_ext"]. "</td><td>" . $row["cc_total"]. "</td><td>" . $row["grand_total"]. "</td><td>" . $row["percentage"]. "</td><td>" .$row["result"]. "</td></tr>";
    }
    echo "</table></center>";
    echo "<br/>";
    echo "<center><form action='export_result.php' method='post'>";
    echo "<button type='submit' class='btn btn-success'>Download Excel File</button></center></form>";
    echo "<br/>";
    
} else {
    echo "<center>No Records Found</center>";
}
    // echo "<br/>";
    echo "<center><form action='home.php' method='post'>";
    echo "<button type='submit' class='btn btn-primary'>Back</button></center></form>";
// echo "<br/>";
// echo "<center><form method='get' action='grt50.php'>";
// echo "<button type='submit'>Get Percentage Between 50 And 59 </button>";
// echo "</form>";

// echo "<br/>";
// echo "<form method='get' action='grt60.php'>";
// echo "<button type='submit'>Get Percentage Between 60 And 69 </button>";
// echo "</form>";

// echo "<br/>";
// echo "<form method='get' action='ls50.php'>";
// echo "<button type='submit'>Get Percentage Less Than 50 </button>";
// echo "</form></center>";

// $greaterthan50 = "select name from table1 where py_total<35 and cc_total<35";
// $output50 = $mysqli->query($greaterthan50);
// echo "<br/>"; 
// echo "Failed Students :- <br/>";
// while($row = $output50->fetch_assoc()) {
//     echo $row["name"];
//     echo "<br/>";
// }

// $greaterthan60 = "select name from table1 where percentage between 60 and 69";
// $output60 = $mysqli->query($greaterthan60);
// echo "<br/>"; 
// echo "Students between 60 and 69 percentage :- <br/>";
// while($row = $output60->fetch_assoc()) {
//     echo $row["name"];
//     echo "<br/>";    
// }

// // Perform query
// if ($result = $mysqli -> query("SELECT * FROM table 1")) {
//   echo "Returned rows are: " . $result -> num_rows;
//   // Free result set
//   $result -> free_result();
// }

$mysqli -> close();
?> 

</body>
</html>
