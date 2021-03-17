<?php 
    require_once 'dbconfig.php';

    //filter excel data
    function filterData(&$str){
        $str = preg_replace("/\t/","\\t",$str);
        $str = preg_replace("/\r?\n/","\\n",$str);

        if(strstr($str,'"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

    //excel filename for download
    $fileName = "export_grt80_data-" .date('Ymd') . ".xlsx";

    //column names
    $fields = array('ENROLLMENT','NAME','PYTHON INTERNAL','PYTHON CEC','PYTHON EXTERNAL','PYTHON TOTAL','CC INTERNAL','CC CEC','CC EXTERNAL','CC TOTAL','GRAND TOTAL','PERCENTAGE','RESULT');

    //display column names as first row
    $excelData=implode("\t",array_values($fields)) ."\n";

    //get records from database
    $query = $mysqli->query("select * from table1 where percentage between 80 and 100");
    if($query->num_rows>0){
        $i=0;
        while($row=$query->fetch_assoc()){
            $i++;
            $rowData=array($row['enrollment_no'], $row['name'], $row['py_int'], $row['py_cec'], $row['py_ext'], $row['py_total'], $row['cc_int'], $row['cc_cec'], $row['cc_ext'], $row['cc_total'], $row['grand_total'], $row['percentage'],  $row['result']);
            array_walk($rowData, 'filterData');
            $excelData .= implode("\t", array_values($rowData)). "\n";
        }
    }else{
        $excelData .= 'No records found'. "\n";
    }

    //headers for download 
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    //render excel data
    echo $excelData;

    exit;
?>