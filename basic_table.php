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

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
       table, th, td {
       border: 2px solid black;
      }
      th {
    background-color:   #008B8B;
    color: white;
}
</style>
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
            <a href="index.html" class="logo"><b>Attendance Live</b></a>
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
                  <h5 class="centered">Eslam Amer  </h5>
                    
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
          <br>

            <?php 
                                     $link = mysqli_connect("localhost", "root", "", "automatic_attendance");
                                     // Check connection
                                     if($link === false){
                                         die("ERROR: Could not connect. " . mysqli_connect_error());
                                     }?>
				
          

	                  <div class="col-md-12">
	                  	  <div class="content-panel" id="dvData">
	                  	  	 
<!-- search for student data -->
                                     <?php 
                                     /*if (isset($_REQUEST['search']))
                                      { 
                                        ?>
                                         <h4><i class="fa fa-angle-right"></i> Result for search ID</h4>
                            <hr>
                             <br> <?php

                                     $get_studentid =$_REQUEST['search'];  
                                    $sql = "SELECT * FROM student   WHERE student_id = '$get_studentid' ";

                                     $result=mysqli_query($link,$sql);
                                     if ($result->num_rows > 0) {
                                     ?>
                                      <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                  <th>Student ID :</th>
                                  <th>First Name : </th>
                                  <th>Last Name : </th>
                                  <th>Department : </th>
                              </tr>
                              </thead>
                              <tbody>
                                      <?php while( $row = $result->fetch_assoc()) : ?>
                                       <tr class="noExl">
                                       <td> <?php echo $row['student_id']; ?></td>
                                       <td> <?php echo $row['first_name']; ?></td>
                                       <td> <?php echo $row['last_name' ]; ?></td>
                                       <td> <?php echo $row['dep_id'];?></td>
                                       </tr>
                                       <?php endwhile ?>
                                       <?php } 
                                       else {
                                        echo "there is no student that match that ID ... ";
                                        ?> 
                                        <br> <br>
                                        <?php 
                                        } ?>
                                        
                                       <?php } ?>
                                        <?php */
  $depart= $_SESSION['sessionVardep'];
$starttime= $_SESSION['sessionVarStartTime'];
$endtime=$_SESSION['sessionVarEndTime'];

?>
                       
                <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                             
                           
                                        <tr>
                               <th>Course Code: </th>
                                <th>Start Time: </th>
                                <th>End Time</th>
                                <th>Date :</th>
                                <th>Lecture ID :</th>
                                <th>Student ID :</th>
                                <th>Student Name : </th>
                                <th>Attendance State : </th>

 
                              </tr>
                                 </thead>

                                       <?php 
  ///////////////////////////////////////////search for attendance for all last weeks //////////////////

                                         if (isset($_REQUEST['search_allweeks']))
                                        { $get_sourse_code =$_REQUEST['search_allweeks'];

                                           ?>
                                         <h4 style="color:#008B8B;"><i class="fa fa-angle-right" ></i> Result for course attendance</h4>
                            <hr>
                             <br> <?php
                                       
                                       //////////////
                                          $select_spesific ="SELECT    sub_code  FROM  student_attendance  WHERE sub_code='$get_sourse_code' ";
                                  $result_specific= mysqli_query($link,$select_spesific);
                                  $row_specific = $result_specific ->fetch_assoc();
                                  /////////////////////////

                                           $sql_allweeks  = "SELECT * FROM student_attendance   WHERE sub_code = '$get_sourse_code' ";
                                           $result_allweeks=mysqli_query($link,$sql_allweeks);
                                          ?>

                                         <tr class="noExl">
                                          <td><?php   echo  $row_specific['sub_code'];  ?>   </td>  
                                          <td><?php   echo $starttime ;  ?>   </td>  
                                         <td><?php   echo  $endtime;  ?>   </td> 
                                         <?php
                                           if ($result_allweeks->num_rows > 0) {
                                          while($row = $result_allweeks->fetch_assoc() )
                                          {
                                           $id_var=$row['student_id'];
                                          
                                       // echo $id_var;
                                        $sql_name ="SELECT first_name , last_name FROM student WHERE student_id='$id_var' ";
                                        $result_name=mysqli_query($link,$sql_name);
                                        ?>
                            
                              <tbody>
                                        <?php 
                                          if ($result_name->num_rows > 0)
                                          {
                                            $row_state = $result_name->fetch_assoc() ;
                                            ?>
                                            
                                        <td><?php   echo "";  ?>   </td>  
                                          <td><?php   echo " " ;  ?>   </td>  
                                         <td><?php   echo  " ";  ?>   </td> 
                                         <td> <?php echo $row['datee']; ?></td>
                                     <td> <?php echo $row['lecture_id']; ?></td>
                                       <td> <?php echo $row['student_id']; ?></td>
                                      <td> <?php echo $row_state['first_name']." ".$row_state['last_name']; ?></td>
                                       <td> <?php echo $row['attendance_state'];?></td>
                                      
                                       <?php
                                       }else{
                                        echo "there is no student that match that ID ... ";
                                       }
                                     }?>
                                      
                                          </tr>
<?php
                                 }
                               }  
                             ?>
                                    
                              </tbody>
                          </table>
                            
                        </div><! --/content-panel -->
                        <br>
                                 <button type="button" onclick="tableToExcel('testTable', 'W3C Example Table')"  class="btn btn-success">Export to Excel Sheet</button>
                                 <br><br>

 <?php   
                   $get_sourse_code =$_REQUEST['search_allweeks'];
                  // echo $get_sourse_code ;
                   $query_all= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE sub_code='$get_sourse_code'";
                   $result_all=mysqli_query($link,$query_all);
                   $values= $result_all->fetch_assoc();
                   $num_rows_all = $values['total']; 
                 //  echo $num_rows_all;

                   //////////////////
                   $query_present= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE  sub_code='$get_sourse_code' AND attendance_state ='present'";
                   $result_present = mysqli_query($link,$query_present); 
                   $values_present = $result_present->fetch_assoc(); 
                   $num_rows_present = $values_present['total']; 
                 //  echo $num_rows_present;
                   $present=($num_rows_present/$num_rows_all)*'100';
                  // echo "present". $present;
                   ///////////////////////
                   $query_absent= "SELECT COUNT('student_id') AS total FROM student_attendance WHERE   sub_code='$get_sourse_code'  AND attendance_state ='absent'";
                   $result_absent = mysqli_query($link,$query_absent); 
                   $values_present = $result_absent -> fetch_assoc(); 
                   $num_rows_absent = $values_present['total']; 
                  // echo $num_rows_absent;
                   $absent=($num_rows_absent/$num_rows_all)*'100';
                   //echo "absent".$absent;
                       $dataPoints = array(
             array("y" => $present, "name" => "Attendance percentage", "exploded" => true),
            
            array("y" => $absent, "name" => "absence percentage"),
          
        );?>
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
<?php 

/////////////////////////////////// search for specfic attendance student //////////////////////////////////
                                        if (isset($_REQUEST['search_state']))
                                      { 

                                     $get_studentid =$_REQUEST['search_state'];
                                     $sql_table  = "SELECT * FROM student_attendance   WHERE student_id = '$get_studentid' ";
                                    $result_table=mysqli_query($link,$sql_table);
                                   if ($result_table->num_rows > 0) {
                                    
                                        $row = $result_table->fetch_assoc() ;
                                        $id_var=$row['student_id'];
                                       // echo $id_var;
                                        $sql_name ="SELECT first_name , last_name FROM student WHERE student_id='$id_var' ";
                                        $result_name=mysqli_query($link,$sql_name);
                                        ?>
                                            <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                  <th>Student ID :</th>
                                  <th>First Name : </th>
                                  <th>Last Name : </th>
                                  <th>Attendance State : </th>
                              </tr>
                              </thead>
                              <tbody>
                                        <?php 
                                          if ($result_name->num_rows > 0)
                                          {
                                            $row_state = $result_name->fetch_assoc() ;
                                            ?>
                                            
                                       <tr class="noExl">
                                       <td> <?php echo $row['student_id']; ?></td>
                                       <td> <?php echo $row_state['first_name']; ?></td>
                                       <td> <?php echo $row_state['last_name' ]; ?></td>
                                       <td> <?php echo $row['attendance_state'];?></td>
                                       </tr>
                                       <?php
                                       }else{
                                        echo "there is no student that match that ID ... ";
                                       }
                                       }
                                       }  
                                       ?>
                                    
		                          </tbody>
		                      </table>
           

	                  	  </div><! --/content-panel -->
                           </div>
                   

	               
                  
                   <!-- /col-md-12 -->
                  
                  


                    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->      
      <!--main content end-->
      <!--footer start-->
        <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>   </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

//  </script>
//  <script >
//  $("#creat_excel").click(function(){
//
//  $("#attendance_table").table2excel({
//    // exclude CSS class
//    exclude: ".noExl",
//    name: "Worksheet Name",
//    filename: "SomeFile" //do not include extension
//  });
//
//});
  
 // $(document).ready(function(){
 //   $('#creat_excel').click(function(){
 //     var excel_data =$('attendance_table').html();
  //    var page = "excel.php?data=" + excel_data ;
  //    window.location=page;
 //   });
 // });
</script>


  </body>
</html>

<script type="text/javascript">
//$('#employees').tableExport();
$(function(){
  $('#example').DataTable();
      }); 
</script>