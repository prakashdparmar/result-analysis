<?php
session_start();
$con = mysqli_connect("localhost","root","","result");
//require_once 'dbconfig.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['import_file_btn']))
{
    $allowed_ext = ['xls','csv','xlsx'];
    $fileName = $_FILES['import_file']['name'];
    $checking = explode(".",$fileName);
    $file_ext = end($checking);

    if(in_array($file_ext, $allowed_ext))
    {
        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);            
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row)
        {
            $enrollment_no = $row['0'];
            $name = $row['1'];
            $py_int = $row['2'];
            $py_cec = $row['3'];
            $py_ext = $row['4'];
            $py_total = $row['5'];
            $cc_int = $row['6'];
            $cc_cec = $row['7'];
            $cc_ext = $row['8'];
            $cc_total = $row['9'];
            $grand_total = $row['10'];
            $percentage = $row['11'];
            $result = $row['12'];

            $checkStudent = "select enrollment_no from table1 where id = '$enrollment_no' ";
            $checkStudent_result = mysqli_query($con,$checkStudent);

            if(mysqli_num_rows($checkStudent_result) > 0)
            {
                $up_query = "update table1 set enrollment_no='$enrollment_no', name='$name', py_int='$py_int', py_cec='$py_cec', py_ext='$py_ext', py_total='$py_total', cc_int='$cc_int', cc_cec='$cc_cec', cc_ext='$cc_ext', cc_total='$cc_total', grand_total='$grand_total', percentage='$percentage', result='$result' where enrollment_no='$enrollment_no' ";     
                $up_query = mysqli_query($con, $up_query);
                $msg=1;
            }
            else{
                $in_query = "insert into table1 (enrollment_no,name,py_int,py_cec,py_ext,py_total,cc_int,cc_cec,cc_ext,cc_total,grand_total,percentage,result) values ('$enrollment_no','$name','$py_int','$py_cec','$py_ext','$py_total','$cc_int','$cc_cec','$cc_ext','$cc_total','$grand_total','$percentage','$result')";
                $in_query = mysqli_query($con, $in_query);
                $msg=1;
            }
        }

        if(isset($msg))
        {
            $_SESSION['status'] = "File Imported Successfully";
            header("Location: home.php");
        }
        else
        {
            $_SESSION['status'] = "File Importing Failed";
            header("Location: home.php");
        }
    }
    else{
        $_SESSION['status'] = "Invalid File";
        header("Location: home.php");
        exit(0);
    }
}
?>