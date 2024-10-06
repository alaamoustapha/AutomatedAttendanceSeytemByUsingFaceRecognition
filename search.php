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


 
</script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
       table, th, td {
       border: 2px solid black;
      }
      input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
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
            <h3 style="color:#008B8B;" ><i class="fa fa-angle-right"></i> Search For Attendance Sheet</h3>
        
          

                    <div class="col-md-12">
                        <div class="content-panel" id="dvData">
                           <!-- <h4><i class="fa fa-angle-right"></i> Enter the ID you want to search for : </h4>
                            <hr>

                          <table  id="testTable" class="table table-bordered" style="width:100%">
                              <thead>
                              <tr>
                                  <th>id </th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Department</th>
                              </tr>
                              </thead>
                              <tbody>
                              <div >
                              <form  action="basic_table.php" method="post">
                              <input type="text" name="search" placeholder="Search..">
                             </form>
                              </div><br>
                                  
                              </tbody>
                          </table>-->
                          <h3 style="color:#008B8B;" >
                           <i class="fa fa-angle-right"></i>
                          Enter The Course Code: </h3>

                       <form  action="basic_table.php" method="post">
                              <input type="text" name="search_allweeks" placeholder="Search..">
                             </form>
                         
                    
                             <br>
                            
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