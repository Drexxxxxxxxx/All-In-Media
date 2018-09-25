<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  .img{
 
      object-position:center;
      width:200px;
      height:200px
  }
  </style>
  </head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
Texto da publicação<input type="text" name="titulo" id="titulo">
   Select image to upload:
   <input type="file" name="fileToUpload" id="fileToUpload" accept="video/*">

   <input type="submit" value="Upload Image" name="submit">
  
</form>


 </body>
<?php
display();
function display(){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "select * from conteudo";
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $video=$result['video'];
      if($video=="")
      {
      }
      else{
      echo '<video width="400" height="300" controls>';
      echo '<source class="img" src="'.$video.'" type="video/mp4">';
      echo '<source class="img" src="'.$video.'" type="video/ogg"><br><br><br>';
     echo '</video>';
      }
     
  }
}

?>

</html>

