<?php session_start(); ?>
<?php 
    $connect = mysqli_connect("localhost","root","","result");
    $query = "Select result, count(*) as number from table1 Group By result";
    $result = mysqli_query($connect, $query);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Result Analysis</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
    var data = google.visualization.arrayToDataTable([
        ['Result','Number'],
        <?php
            while($row=mysqli_fetch_array($result))
            {
                echo "['".$row["result"]."', ".$row["number"]."],";
            } 
        ?>    
    ]);
var options={
    title: 'Percentage of Pass and Fail Students',
    is3D:true,
    colors: ['ff4c33','337aff']
};
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data,options);    
    }
    </script>

<style>
    table, th, td {
    border: 1px solid black;
}

th {
    background-color: 129fd8;
    font-size: 18px;
}

td {
    text-align: center;
}
h1{
    font-weight: bold;
    text-align: center;
    margin-top: 25px;
    margin-bottom: -8px;
}

h4{
    font-weight: bold;
    text-align: center;
}

h5{
    display:block;
    margin-top:0.90em;
    text-align: center;
}

.center{
    margin-top: 40px;
    margin-left: 350px;
}

</style>
</head>
<body>  
<h1>Result Analysis</h1>
    <div class="container">
        
        <div class="row">
        
            <div class="col-md-12 mt-4">
            <hr>
                <h4>Import File</h4>
                
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h5>".$_SESSION['status']."</h5>";
                        unset($_SESSION['status']);
                    }
                ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="card card-body shadow">
                        <div class="row">
                            <div class="col-md-2 my-auto">
                                <h5>Select File</h5>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="import_file" class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="import_file_btn" class="btn btn-primary">Upload/Import </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
                $mysqli = new mysqli("localhost","root","","result");
                if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                  }
                      
                $sql = "SELECT * FROM table1";
                $result = $mysqli->query($sql);
                
                // echo "<br/>";
                echo "<center><form action='result.php' method='post'>";
                echo "<button type='submit' name='generate' class='btn btn-info'>Generate Result</button></center></form>";

                // echo "<br/>";
                echo "<center><form action='fail.php' method='post'>";
                echo "<button type='submit' name='fail' class='btn btn-danger'>List Of Fail Students</button></center></form>";  

                // if (isset($_POST['generate'])) {
                //    if ($result->num_rows > 0) {
                //         echo "<center><table><tr><th>Enrollment</th><th>Name</th><th>Python Internal</th><th>Python CEC</th><th>Python External</th><th>Python Total</th><th>CC Internal</th><th>CC CEC</th><th>CC Exernal</th><th>CC Total</th><th>Grand Total</th><th>Percentage</th><th>Result</th></tr>";
                //     // output data of each row
                //         while($row = $result->fetch_assoc()) {
                //         echo "<tr><td>" . $row["enrollment_no"]. "</td><td>" . $row["name"]. "</td><td>" . $row["py_int"]. "</td><td>" . $row["py_cec"]. "</td><td>" . $row["py_ext"]. "</td><td>" . $row["py_total"]. "</td><td>" . $row["cc_int"]. "</td><td>" . $row["cc_cec"]. "</td><td>" . $row["cc_ext"]. "</td><td>" . $row["cc_total"]. "</td><td>" . $row["grand_total"]. "</td><td>" . $row["percentage"]. "</td><td>" . $row["result"]. "</td></tr>";
                //         }
                //         echo "</table></center>";
                //     } 
                // }
            ?>

        <div class="container">
        <hr>    
        <div class="card card-body shadow">
            <h3 style="text-align:center">Pie Chart</h3>             
        </div>
        <div class="center" id="piechart" style="width: 500px; height: 300px;">
                
        </div>
        </div>
        
            
        <div class="container">
        <hr>    
        <div class="row">
        <div class="card card-body shadow">
            <h3 style="text-align:center">Summary</h3>             
        </div>           
        </div>
        <?php 
            $mysqli = new mysqli("localhost","root","","result");

            // Check connection
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }
            //total students appeared
            $query = "SELECT enrollment_no FROM table1"; 
      
            // Execute the query and store the result set 
            $result = mysqli_query($mysqli, $query); 
              
            if ($result) 
            { 
                // it return number of rows in the table. 
                $row = mysqli_num_rows($result); 
                  
                   if ($row) 
                      { 
                        //  printf("Total Students Appeared : " . $row);
                        echo "<h5>Total Students Appeared = $row </h5>" ; 
                      } 
                      else{
                        echo "<h5>No Records Found</h5>";  
                      } 
            }
            

            
            //total students fail
            $query_fail = "SELECT result FROM table1 where result='fail' "; 
      
            // Execute the query and store the result set 
            $result = mysqli_query($mysqli, $query_fail); 
              
            if ($result) 
            { 
                // it return number of rows in the table. 
                $row = mysqli_num_rows($result); 
                  
                   if ($row) 
                      { 
                        //  printf("Total Students Appeared : " . $row);
                        echo "<h5>Total Students Fail = $row </h5>" ; 
                      }  
            }


            //total students pass
            $query_pass = "SELECT result FROM table1 where result='pass' "; 
      
            // Execute the query and store the result set 
            $result = mysqli_query($mysqli, $query_pass); 
              
            if ($result) 
            { 
                // it return number of rows in the table. 
                $row = mysqli_num_rows($result); 
                  
                   if ($row) 
                      { 
                        //  printf("Total Students Appeared : " . $row);
                        echo "<h5>Total Students Pass = $row </h5>" ; 
                      }  
            }
        ?>
        </div>  


        <hr>    
        <div class="container">
            <div class="row">
            <div class="card card-body shadow">
                <h3 style="text-align:center">Percentage Filtration</h3>             
            </div>
            </div>

            <?php
                 echo "<br/>";
                 echo "<center><form action='grt80.php' method='post'>";
                 echo "<button type='submit' class='btn btn-info'>Percentage Between 100 To 80</button></center></form>";

                 echo "<center><form action='grt70.php' method='post'>";
                 echo "<button type='submit' class='btn btn-info'>Percentage Between 79 to 70</button></center></form>";
                
                 echo "<center><form action='grt60.php' method='post'>";
                 echo "<button type='submit' class='btn btn-info'>Percentage Between 69 to 60</button></center></form>";

                 echo "<center><form action='grt50.php' method='post'>";
                 echo "<button type='submit' class='btn btn-info'>Percentage Between 59 to 50</button></center></form>";

                 echo "<center><form action='ls50.php' method='post'>";
                 echo "<button type='submit' class='btn btn-info'>Percentage Below 50</button></center></form>";
            ?>
        </div>      
</body>
</html>