<?php
   include('connect_database.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($link,"select first_name from doctor where first_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['first_name'];
   
   if(!isset($_SESSION['login_user'])){
     // header("location:login_check.php");
   	header("location:login.php");
   }
?>