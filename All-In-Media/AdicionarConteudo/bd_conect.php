<?php
include_once '../Home/_header.php';
?>
    <div class="container">
            <form action="video.php" method="post" enctype="multipart/form-data">
                <br>
                <button type="submit" style="  border: none;  color: white;  padding: 15px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;  margin: 4px 2px;  cursor: pointer;background-color: #4776E6;">Add Video</button>
            </form>
            <form method="post" enctype="multipart/form-data">
            <div>
                <hr>
                <h1> Create Post </h1>
                <hr>
                <div class="row">
                    <div class="col-lg-8 col-md-8" style="width: 100%;">
                        <div class="input_form" style="">
                            <input class="txt_titulo" type="text" class="card-title" placeholder="Title" name="titulo" id="titulo"> <br><br>
                            <textarea class="txt_textOpcional"  placeholder="Text(Optional)" name="description" id="description"></textarea>                    
                      
                        </div>
                          
                    </div>
                    <div class="col-lg-4 col-md-4 preview "> 
                        <div class="input_form" >
                            <img src="images/img_plc.png" width="100%" height="100%" alt="" srcset="">
                        </div>
                    </div> 
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-lg-12 col-md-12">
                        <div style="text-align:center" >
                            <label  for="file-input">
                                <div id="load_icon"></div>
                            </label> 
                            <label  for="submit_post">
                                <div id="submit_icon"></div>
                            </label>


                            <input class="file-upload" id="file-input" type="file" name="image" accept="image/png, image/jpeg">
                            <input type="submit" id="submit_post" name="submit" value="Post">
                        </div>
                       
                    </div> 
                </div>
                
            </div>
            <hr>  
            <br>        
            
        </form>
    </div>    



 </body>
</html>





<?php

if(isset($_POST['submit'])){
  if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
      echo"failed";
  }
  else{
      $name=addslashes($_FILES['image']['name']);
      $image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
      echo '<h1>'.$image.'</h1>';
      saveimage($name,$image);
  }
}

function saveimage ($name, $image)
{
   $texto = $_POST['titulo'];
$con = mysqli_connect("localhost","root","", "all-in-media");
$sql="insert into conteudo (Nome, Id_Publicador, likes, dislikes, imagem, video) values ('$texto','1','0','0','$image','')" ;
$query=mysqli_query($con,$sql);
if($query){
  echo"sucess";
}
mysqli_close($con);

echo '<script>window.location = "../Login/imageSenderRedirect.php";</script>';
}


?>

