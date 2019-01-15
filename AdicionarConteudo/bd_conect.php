


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheet/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="..\_MasterPage\stylesheets\css_index.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 </head>



<body>
<header>
    <!--Serve para adicionar imagens-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <input type="image" class="logo" src="..\_MasterPage\images/Logo2.png" alt="">
            </a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon" style="color:black"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="mx-auto d-block text-center" style="width:80%">
                    <input type="search" name="" placeholder="Search whateaver you want..." id="searchInput">
                </div>
                <div class="sidenav_2">
                <nav class="nav justify-content-center">
                    <div class="col-xs-6 col-sm-6" style="padding:15px">
                        <a class="nav-link hrefs" href="#">Trending</a>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding:15px">
                        <a class="nav-link hrefs" href="#">Canais Subs</a>
                    </div >
                    <div class="col-xs-6 col-sm-6" style="padding:15px">     
                        <a class="nav-link hrefs" href="#">Favoritos</a>
                    </div>
                    <div class="col-xs-6 col-sm-6" style="padding:15px">
                        <a class="nav-link hrefs" href="#">Meus Videos</a>
                    </div>
                                        
                </nav>
           
            </div> 
            <ul class="navbar-nav ml-auto">
                <nav class="nav justify-content-center">
                    <a class="nav-link icns" style="padding:10px"  href="#"><i class="fas fa-search"></i></a>
                    <a class="nav-link icns" style="padding:10px" href="#"><i class="fas fa-cog"></i></a>
                    <a class="nav-link icns" style="padding:10px" href="#"><i class="fas fa-user"></i></a>
                                                        
                </nav>
                                                 
            </ul> 
                                           
            </ul>
            </div>  
                                    
            </div>
                        
        </nav>
               
                        <div id="sidenav" >
                     
                                <div id="sidenav_menu">
                                   <nav class="nav justify-content-center sidenav">
                                       <a class="nav-link" href="#">Trending</a>
                                       <a class="nav-link" href="#">Canais Subs</a>
                                       <a class="nav-link" href="#">Favoritos</a>
                                       <a class="nav-link" href="#">Meus Videos</a>
                                     </nav>
                                 
                                   
                                </div> 
                                 
                                    
                           </div>  
                
 
    
        </header>

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
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>





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




?>

