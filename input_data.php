<?php include 'connect_database.php';>

    if (isset($_POST['Upload_btn']))
    {
        $stu_id=$_POST['Student_Id']
    	$FN=$_POST['First_Name'];
    	$LN=$_POST['Last_Name'];
        $dep=$_POST['dep'];
        
    	$sql= "INSERT INTO `new_student`(`stu_id`, `first_name`, `last_name`, `department`) VALUES ($stu_id,$FN,$LN,$dep)";
        $query_run=mysql_query($sql);
    	echo "successfully inserted to data base ^^";
    	
       

    }
    else {
    	echo 'mysql_error()';
    }
