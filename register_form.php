<?php require_once('connect_database.php');?>

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

    <script src="assets/js/chart-master/Chart.js"></script>
    
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
                          <li><a  href="attendance.php">Attendance</a></li>
                           <li><a  href="registeration.php">New Student</a></li>
                           <li><a  href="search.php">Search Student </a></li>
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
                <h3><i class="fa fa-angle-right" ></i> New Student Images</h3>

              </div>

              
            </div>
<?php 
$link = mysqli_connect("localhost", "root", "", "automatic_attendance");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    if (isset($_REQUEST['submit']))
    {
    
  $get_username =$_REQUEST['Student_Id']; 
  $First_Name =$_REQUEST['First_Name']; 
  $Last_Name =$_REQUEST['Last_Name']; 
  $E_mail=$_REQUEST['e-mail']; 
  $Department =$_REQUEST['department_select']; 


  $sql1 ="SELECT dep_id FROM  department where dep_name= '$Department'" ;
  $query_run1=mysqli_query($link,$sql1);
  $row=$query_run1->fetch_assoc();
  $department_id = $row['dep_id'];
  $sql= "INSERT INTO student (student_id,first_name,last_name,dep_id)VALUES('$get_username','$First_Name','$Last_Name','$department_id')";
  $query_run=mysqli_query($link,$sql);




  $location = 'image_database/'.$get_username;

///////////////////////

  $out= exec('C:\\Python27\\python.exe C:\\xampp\\htdocs\\project_attendance\\new_attendance\\attendance\\addnew.py '.$get_username );
  if (empty($out))
    {
      $files = scandir($location);
         for($i = 2; $i < count($files); $i++)
         {
             
            if($files[$i] !='.' && $files[$i] !='..')
            {
            // show image
                 echo "<img src='$location/$files[$i]' style='width:200;height:194px float: left;margin-left: 2em; margin-right: 1%; margin-bottom: 0.5em;'>";
               
            }
            
        }
    }
  else {
        echo 'This student ID is alredy exist in DataBase ... ';
    }
  }
?>
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





