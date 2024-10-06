<?php require_once('connect_database.php');?>
<?php session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Attendance</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/css.css">


    <script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

    <script src="assets/js/chart-master/Chart.js"></script>
            <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <style >
           input[type=text] {
    width: 130px;
    box-sizing: border-box;
    
    font-size: 20px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 50%;
}
th {
    background-color:   #008B8B;
    color: white;
}
    </style>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"> <i class="fa fa-graduation-cap"></i><span><b> Attendance Live </b></span></a>
            
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
              
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="assets/img/ui-zac.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">Ahmed Taha </h5>
                    
                  <li class="mt">
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard </span>
                      </a>
                  </li>

                 
                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Attendace Analysis</span>
                      </a>
                      <ul class="sub">
                          <li >
                          <a  href="attendance.php">
                          <i class="fa fa-circle-o"></i>
                          Attendance </a>
                          </li>
                           <li>
                           <a  href="registeration.php">
                           <i class="fa fa-circle-o"></i>
                           New Student </a>
                           </li>
                           <li><a  href="search.php">
                           <i class="fa fa-circle-o"></i>
                           Attendance Sheet
                            </a></li>
                      </ul>
                  </li>
                 
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
                        
      <section id="main-content">
          <section class="wrapper">
            
            
            <!-- BASIC FORM ELELEMNTS -->
            
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 style="color:#008B8B;"><i class="fa fa-angle-right" style="color:blue;"></i> Attendance and report  </h3>

              </div>

              
            </div>






<?php


$loc=$_SESSION['sessionVar'];
$nam=$_SESSION['sessionVarname'];
$date= $_SESSION['sessionVardate'];
$code=$_SESSION['sessionVarcode'];
$lectureid= $_SESSION['sessionVarLecId'];
$depart= $_SESSION['sessionVardep'];
$starttime= $_SESSION['sessionVarStartTime'];
$endtime=$_SESSION['sessionVarEndTime'];

$src=$loc.'/'.$nam;
$pathfile=$loc.'/'.$nam.'.txt';
$pathimages=$loc.'/'.'extract/';
//echo $pathfile;
$link = mysqli_connect("localhost", "root", "", "automatic_attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

echo "<img title='detected' src=$src style='width:500px;height:300px;margin-left:20%;margin-bottom: 5%;margin-top: 3em;'><br><br><br>";
                
if (isset($_POST['submit']))
{ 
  
  $extensions_array = array('jpg','png','jpeg');
  
  if(is_dir($loc))
  {
      $files = scandir($pathimages);
      $lines = file($pathfile);
       $select_dep = "SELECT dep_id FROM `department` WHERE dep_name='$depart'";
                  $result_dep=mysqli_query($link,$select_dep); 
                         //  $result_id=mysqli_query($link,$sql_id);
                         //if ($result_dep ->num_rows>0)  {       
                         $row2=$result_dep->fetch_assoc();
                         
                          // echo $row2['dep_id'];
                           $selected_dep_id =$row2['dep_id'];
                                                                                  //////////////////
                           $sql_id = "SELECT  student_id FROM student WHERE dep_id = '$selected_dep_id' ";
                                      $result_id=mysqli_query($link,$sql_id);

                          /* $selectsode="SELECT `sub_code`, `datee` ,`lectureid` FROM `student_attendance` WHERE `sub_code`='$code'";
                           $result_code=mysqli_query($link,$selectsode);
                           $result_fetchcode=$result_code->fetch_assoc();
                           echo $result_fetchcode['lectureid'];
                             if(strcmp($result_fetchcode[$date],$date)==false){*/
                                   while($row5=$result_id->fetch_assoc())
                                  
                                     {                                                                  
                                          $selected_student_id=$row5['student_id'];
                                          
                                          $insert_id= "INSERT INTO student_attendance(sub_code,student_id,attendance_state,datee,lecture_id ) VALUES ('$code','$selected_student_id','absent','$date', '$lectureid')";
                                          $insert_sql=mysqli_query($link,$insert_id);
                                        }
                                        
         for($i = 2; $i < count($files); $i++)
         {
           
            if($files[$i] !='.' && $files[$i] !='..')
            {
            
               $file = pathinfo($files[$i]);
               $extension = $file['extension'];
               
               if(in_array($extension, $extensions_array))
                {
            // show image
                echo "Student id : ";
                 echo  $lines[$i-2];

                 echo "<img src='$pathimages$files[$i]'; value='laila';style='width:200;height:194px float: left;margin-left: 3em; margin-right: 1%; margin-bottom: 0.5em;'>";


                 $id=$lines[$i-2];
                 $sql_update = "UPDATE student_attendance  SET `attendance_state`='present'  WHERE student_id = '$id'";
                 $result=mysqli_query($link,$sql_update);
           
                }
            }
            
        }
      /*  }
                                        else {
                                           echo "Error: you have already uploads this lectures  "."<br>" . PHP_EOL;
                                        }     */
       
  }
} ?>                  

                            <h2>Search for attendance for all last weeks </h2>

                       <form  action="basic_table.php" method="post">
                              <input type="text" name="search_allweeks" placeholder="Search..">
                             </form>
                         
                    
                             <br>
                      
                      
                       
                        
                             
                             <!-- attendance table -->
                             

 <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                <th>Lecture ID: </th>
                                  <th>Course Code: </th>
                                  <th>Lecture Date</th>
                                  <th>Start Time: </th>
                                  <th>End Time</th>
                                 
 
                              </tr>
                              </thead>
                              <tbody>
                              <?php

                              $select_spesific ="SELECT lecture_id  , sub_code ,datee FROM  student_attendance  WHERE datee ='$date' ";
                                  $result_specific= mysqli_query($link,$select_spesific);
                                  $row_specific = $result_specific ->fetch_assoc();
                                  ////////////////////////////////////
                           ?>
                                       <tr class="noExl">
                                         <td>  <?php echo$row_specific['lecture_id'];  ?>   </td> 
                                         <td><?php   echo  $row_specific['sub_code'];  ?>   </td>  
                                         <td><?php   echo  $row_specific['datee'];  ?>   </td>    
                                          <td><?php   echo $starttime ;  ?>   </td>  
                                         <td><?php   echo  $endtime;  ?>   </td> 


                                       </tr>
                                       
                                      
                             </tbody>
                          </table>



                         <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                  
                                  <th>Student ID : </th>
                                  <th>Student Name: </th>
                                 <th><?php echo $date ?></th>
                                <th>Alarm : </th>
                                 
                                  



                                  
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php

                               $sql_table  = "SELECT * FROM student_attendance   WHERE datee= '$date' and sub_code='$code' ";
                                $result_table=mysqli_query($link,$sql_table);
                                if ($result_table->num_rows > 0) {
                                                            ?>
                                      <?php 
                                             //////////////////
                                  $sql_alarm ="SELECT  student_id FROM student_attendance   WHERE datee= '$date' and sub_code='$code'";
                                  $res=mysqli_query($link,$sql_alarm);
                                 while( $row_row=$res->fetch_assoc())
                                 {
                                    $reb=$row_row['student_id'];
                                    $sql_new = "SELECT  count( attendance_state ) AS  total From student_attendance WHERE student_id='$reb' AND attendance_state='absent'";
                                      $res_id=mysqli_query($link,$sql_new);
                                       $row_id=  $res_id->fetch_assoc();
                                        $num_rows_absent = $row_id['total'];
 
                                     //echo $row_id['student_id'];

                                     if ( $num_rows_absent >'2')
                                     {
                                          $sql_update = "UPDATE student_attendance SET `alarm`='alarm' WHERE student_id = '$reb' AND  datee= '$date' and sub_code='$code' "; 
                                          $result=mysqli_query($link,$sql_update);

                                     }
                                     

                                          

        
                                   

                                      ///////////////
                                    $sql_select_alarm = "SELECT alarm  From student_attendance WHERE student_id = '$reb' AND  datee= '$date' and sub_code='$code' "; 
                                    $result_sql_select_alarm=mysqli_query($link,$sql_select_alarm);

                                     $row = $result_table->fetch_assoc();
                                        $id_var=$row['student_id'];
                                      $row_select_alarm = $result_sql_select_alarm->fetch_assoc();

                                        //echo $id_var;
                                        $sql_name ="SELECT first_name , last_name FROM student WHERE student_id='$id_var' ";
                                        $result_name=mysqli_query($link,$sql_name);
                                        $row2= $result_name->fetch_assoc();
                                      ?>
                                       <tr class="noExl">
                                        

                                       <td> <?php echo $row['student_id']; ?></td>
                                       <td> <?php echo $row2['first_name']." ".$row2['last_name']; ?></td>
                                       <td> <?php echo $row['attendance_state']; ?></td>
                                       <td><?php  echo $row_select_alarm['alarm'];?></td> 

                                       </tr>
                                     
                                       <?php } }
                                       $sql_update_final ="UPDATE `student_attendance` SET `alarm` = NULL WHERE `alarm` is not null";
                                       $result_sql_update_final=mysqli_query($link,$sql_update_final);


                                        ?>
                             </tbody>
                          </table>
                                          <button type="button" onclick="tableToExcel('testTable', 'W3C Example Table')"  class="btn btn-success">Export to Excel</button>
                        <br> <br>  <?php     
                   $query_all= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE lecture_id='$lectureid' AND sub_code='$code' AND datee='$date'";
                   $result_all=mysqli_query($link,$query_all);
                   $values= $result_all->fetch_assoc();
                   $num_rows_all = $values['total']; 
                 //  echo $num_rows_all;

                   //////////////////
                   $query_present= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE lecture_id='$lectureid' AND sub_code='$code' AND datee='$date' AND attendance_state ='present'";
                   $result_present = mysqli_query($link,$query_present); 
                   $values_present = $result_present->fetch_assoc(); 
                   $num_rows_present = $values_present['total']; 
                 //  echo $num_rows_present;
                   $present=($num_rows_present/$num_rows_all)*'100';
                  // echo "present". $present;
                   ///////////////////////
                   $query_absent= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE lecture_id='$lectureid' AND sub_code='$code' AND datee='$date' AND attendance_state ='absent'";
                   $result_absent = mysqli_query($link,$query_absent); 
                   $values_present = $result_absent -> fetch_assoc(); 
                   $num_rows_absent = $values_present['total']; 
                  // echo $num_rows_absent;
                   $absent=($num_rows_absent/$num_rows_all)*'100';
                   //echo "absent".$absent;

               






        $dataPoints = array(
            array("y" => $present, "name" => "Attendance percentage", "exploded" => true),
            
            array("y" => $absent, "name" => "absence percentage"),
          
        );
    ?> 
    <div id="chartContainer"></div>
        <script type="text/javascript">
            $(function () {
                var chart = new CanvasJS.Chart("chartContainer",
                {
                    theme: "theme2",
                    title:{
                        text: "Attendance percentage"
                    },
                    exportFileName: "New Year Resolutions",
                    exportEnabled: true,
                    animationEnabled: true,   
                    data: [
                    {       
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{name}: <strong>{y}%</strong>",
                        indexLabel: "{name} {y}%",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            });
        </script>
                         
                            </div>



         
         
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 - BFCI.CS
              <a href="testing.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>
  
  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>
  
  <!--custom checkbox & radio-->
  
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  
  
  <script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
  
</html>

    






