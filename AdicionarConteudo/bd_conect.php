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
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
</html>







