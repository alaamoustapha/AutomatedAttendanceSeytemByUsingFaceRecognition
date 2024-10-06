<?php
$location = 'uploads/'; //where the file is going
if (isset($_POST['submit'])) { //checking for anythiing will break the code
    $name = $_FILES['file']['name']; //file name
    $size = $_FILES['file']['size']; //file size
    $type = $_FILES['file']['type']; //file type
    $tmp_name = $_FILES['file']['tmp_name']; 
    
    //temp location on server
    if(checkType($name, $type)){
            if (isset($name)) {
          
               echo "<img src='$location$name' style='width:500px;height:300px;'>";
                $out=exec('C:\\Users\\laila\\AppData\\Local\\Programs\\Python\\Python36-32\\python.exe C:\\wamp64\\www\\attendance\\test1.py '.$location. ' ' .$name );

                session_start();
                $x = $out;
                $_SESSION['sessionVar'] = $x;
                $_SESSION['sessionVarname'] = $name;
            



            }
    }
} else {
    echo 'Please select a file:';
}
function checkType($name, $type){
    $extension = pathinfo($name, PATHINFO_EXTENSION); 
    if (!empty($name)) {
        if (($extension == 'jpg' || $extension == 'png') && ($type == 'image/jpeg' || $type == 'image/png')) {
            return true;
        } else{
            echo 'That is not a jpg or png';
            return false;
        }
    }
}
?>
 <form action="testfin.php" method="POST" enctype="multipart/form-data">
                  <input type="submit" class="newone" name="submit" value="attendance"/>
 </form>
<link rel="stylesheet" type="text/css" href="readURL.css">
