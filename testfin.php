
<?php
session_start();
$loc = $_SESSION['sessionVar'];


$parent = basename(dirname($loc));
$nam=$_SESSION['sessionVarname'];

$src=$loc.'/'.$nam;
$pathfile=$loc.'/'.$nam.'.txt';
$pathimages=$loc.'/'.'extract/';
//echo $pathfile;
echo $loc;

echo "<img title='detected' src=$src style='width:500px;height:300px;margin-left:20%;margin-bottom: 5%;margin-top: 3em;'><br><br><br>";
                
if (isset($_POST['submit']))
{ 
	
  $extensions_array = array('jpg','png','jpeg');
  
  if(is_dir($loc))
  {
      $files = scandir($pathimages);
      $lines = file($pathfile);
      echo count($files);
     
         for($i = 2; $i < count($files); $i++)
         {
         	 
            if($files[$i] !='.' && $files[$i] !='..')
            {
            
               $file = pathinfo($files[$i]);
               $extension = $file['extension'];
               
               if(in_array($extension, $extensions_array))
                {
            // show image
                 echo "<img src='$pathimages$files[$i]'; value='laila';style='width:200;height:194px float: left;margin-left: 3em; margin-right: 1%; margin-bottom: 0.5em;'>";
                 print $lines[$i-2];
                  

               
                }
            }
            
        }
  }
}
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo 'attendance list : ';
echo '<br>';
echo '<br>';
for($i = 0; $i < count($lines); $i++)

         {

           print $lines[$i];
           echo '<br>';
       }
?>
<link rel="stylesheet" type="text/css" href="readURL.css">