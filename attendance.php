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
                  <h5 class="centered">Eslam Amer </h5>
                    
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
                <h3><i class="fa fa-angle-right"></i> Attendance Analysis</h3>

              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:blue;"> Input Data: </h2>
                   
                      
                     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   <form class="form-horizontal form-label-left"  method="post" action="attendance_upload_image.php">
                     <div class="form-group">
                         
                         <br>
                        
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" class="form-control">Department</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          
                          <select name="depart" id="sms" class="form-control">
                                        <?php

                                        $sql = "SELECT Distinct dep_name FROM department";
                                          $result = mysqli_query($link,$sql);

                                          if(mysqli_num_rows($result)>0){

                                            while($row=mysqli_fetch_assoc($result)){
                                              echo "<option>".$row['dep_name']."</option>";
                                            }

                                          }

                                        ?>
                                </select>                               
                         
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" class="form-control">Subject Code</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <select name="sub_code" id="sms" class="form-control" >
                                        <?php

                                        $sql = "SELECT Distinct sub_code FROM subject ";
                                          $result = mysqli_query($link,$sql);
                                          if(mysqli_num_rows($result)>0){

                                            while($row=mysqli_fetch_assoc($result)){
                                              echo "<option>".$row['sub_code']."</option>";
                                            }
                                          }

                                        ?>
                                      
                                </select>
                                
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"  class="form-control">Lecture</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                         <!-- <div class="btn-group">
                        <button class="btn">Semester 1</button> 
                         <button class="btn dropdown-toggle" data-toggle="dropdown">
                                   <span class="caret"></span>
                                    </button>
                                 <ul class="dropdown-menu">
                             dropdown menu links 
                              <li><a tabindex="-1" href="#">Semester 1 </a></li>
                              <li><a tabindex="-2" href="#">Semester 2 </a></li>
                              <li><a tabindex="-3" href="#">Semester 3</a></li>
                              </ul>
                                </div> -->
                                
                                <select name="lecture_id" class="form-control" id="sms" >
                                        <?php

                                        $sql = "SELECT Distinct lecture_id FROM lecture";
                                          $result = mysqli_query($link,$sql);
                                          if(mysqli_num_rows($result)>0){

                                            while($row=mysqli_fetch_assoc($result)){
                                              echo "<option>".$row['lecture_id']."</option>";
                                            }
                                          }

                                        ?>
                                      
                                </select>
                               
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" class="form-control">Start Time: </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="time" class="form-control" name="start_time">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" class="form-control">End Time: </label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="time" class="form-control" name="End_time">
                        </div>
                        </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" class="form-control">Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                         <form>
                            
                         <input type="date" name="datee" class="form-control"/><br>
                         </form> 
                         <button  type="submitt" class="btn btn-success" name='submitt'>Next</button>
                         </div>
                         </div>



              
                       

                    </form>
                  </div>
                </div>
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

