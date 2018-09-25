<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  
  </style>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="stylesheet/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 </head>



<body>
 <form method="post" enctype="multipart/form-data">
Texto da publicação<input type="text" name="titulo" id="titulo">
<input type="file" name="image">
<br>

<input type="submit" name="submit" value="Submit">
</form>
<?php
if(isset($_POST['submit'])){
  if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
      echo"failed";
  }
  else{
      $name=addslashes($_FILES['image']['name']);
      $image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
      saveimage($name,$image);
  }
}

function saveimage ($name, $image)
{
   $texto = $_POST['titulo'];
$con = mysqli_connect("localhost","root","", "phpteste");
$sql="insert into conteudo (Nome, Id_Publicador, likes, dislikes, imagem, video) values ('$texto','1','0','0','$image','')" ;
$query=mysqli_query($con,$sql);
if($query){
  echo"sucess";
}
mysqli_close($con);
}
display();
function display(){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "select * from conteudo";
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      echo '<img class="img" src="data:image;base64,'.$img.'"><br>';
  }
}



?>

 </body>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>







