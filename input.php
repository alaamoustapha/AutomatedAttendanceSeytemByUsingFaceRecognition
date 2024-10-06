<?php 
$link = mysqli_connect("localhost", "root", "", "automatic_attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    if (isset($_REQUEST['submitt']))
    {
     $department=$_REQUEST['depart'];
     $semseter=$_REQUEST['semseter'];
     $sub_code=$_REQUEST['sub_code'];
     $date=$_REQUEST['datee'];
     $time_from=$_REQUEST['time_from'];
     $time_to=$_REQUEST['time_to'];
     
     //$dep=$_POST['dep'];
     //$stu_id=$_POST['1'];
    ///    $FN=$_POST['Asmaa'];
       // $LN=$_POST['Alaa'];
   //     $dep=$_POST['CS'];

      //  $sql="INSERT INTO  test (department)VALUES(' $department')";
     $sql= "INSERT INTO attendance (department, semseter, datee, sub_code,time_from,time_to) VALUES  ('$department','2','20/22/1558','ch15','9:00','11:00')";

      //('$department','&semester',$date,'$sub_code','time_from','$time_to')";
        //print $sql;die;
        $query_run=mysqli_query($link,$sql);
        echo "successfully inserted to data base ^^";
        
    }
    else {
        echo 'mysql_error()';
    }

