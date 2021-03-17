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
    border:  3px solid white;
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
    font-weight: bold;
    font-size: 2em;
    text-decoration: underline;
    font-style: italic;
    color: black;
    margin-top: 15px;
    margin-bottom: 15px;
}
button{
    margin-top: 0.5px;
}

</style>
</head>
<body>

<h1 style="text-align:center">Percentage Between 50 And 59</h1>

<?php
$mysqli = new mysqli("localhost","root","","result");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$greaterthan50 = "select * from table1 where percentage between 50 and 59";
//$sql = "SELECT * FROM table1";
$result = $mysqli->query($greaterthan50);

if ($result->num_rows > 0) {
    echo "<center><table><tr><th>Enrollment</th><th>Name</th><th>Python Internal</th><th>Python CEC</th><th>Python External</th><th>Python Total</th><th>CC Internal</th><th>CC CEC</th><th>CC Exernal</th><th>CC Total</th><th>Grand Total</th><th>Percentage</th><th>Result</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["enrollment_no"]. "</td><td>" . $row["name"]. "</td><td>" . $row["py_int"]. "</td><td>" . $row["py_cec"]. "</td><td>" . $row["py_ext"]. "</td><td>" . $row["py_total"]. "</td><td>" . $row["cc_int"]. "</td><td>" . $row["cc_cec"]. "</td><td>" . $row["cc_ext"]. "</td><td>" . $row["cc_total"]. "</td><td>" . $row["grand_total"]. "</td><td>" . $row["percentage"]. "</td><td>" . $row["result"]. "</td></tr>";
    }
    
    echo "</table></center>";
    echo "<br/>";
    echo "<center><form action='export_grt50.php' method='post'>";
    echo "<button type='submit' class='btn btn-success'>Download Excel File</button></center></form>";
    echo "<br/>";
    
} else {
    echo "<center>No Records Found</center>";
}
    // echo "<br/>";
    echo "<center><form action='home.php' method='post'>";
    echo "<button type='submit' class='btn  btn-primary'>Back</button></center></form>";

$mysqli -> close();
?>

</body>
</html>