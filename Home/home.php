<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HomePage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/css_index.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>

        <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container">
                                <a class="navbar-brand" href="#">
                                        <input type="image" class="logo" src="images/Logo2.png" alt="">
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

        <div>
                <a href="#head"><img src="images/add_button.png" id="fixedbutton"></a>
        </div>
<?php   
display();
function display(){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "select * from conteudo order by id Desc";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;

  echo '<form action="home.php" method="post">';
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      $id=$result['id'];
      if(!$img=="")
      { 
      echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
      <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction()"><script>
  
  function myFunction() {
  alert("radio selected'.$id.'");
  
  }
  
   </script>
      <span class="checkmark"></span>
    
    Dislike
      <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction()"><script>
  
      function myFunction() {
        alert("radio selected'.$id.'");;
        <?php 
        $i = 0;

      }
      
       </script>
      <span class="checkmark"></span>
    </label><textarea rows="3" cols="50">
   
    </textarea><br><br><br><br>';
    echo "$id";
      $count=$count+1;


      }
      
      else
      {
        $video=$result['video'];
        echo '<video width="400" height="300" controls>';
        echo '<source class="img" src="'.$video.'" type="video/mp4">';
        echo '<source class="img" src="'.$video.'" type="video/ogg"><br><br><br>';
       echo '</video>';
       echo '<label class="container">Like
       <input type="radio" name="radio'.$id.'">
       <span class="checkmark"></span>
     
     Dislike
       <input type="radio" name="radio'.$id.'">
       <span class="checkmark"></span>
     </label>';
       $count=$count+1;
     }
  
 
  }


  echo '</form>';


}





?>




</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>
</html>