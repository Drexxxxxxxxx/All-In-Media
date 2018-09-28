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
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

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
                <img class="img" src="data:image;base64,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">
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

        <div class="Adicionarppldiv"> </div>
<?php   
echo "<script>alert('test');</script>";
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
      <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
      <span class="checkmark"></span>
    
    Dislike
      <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
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

<script>
  
  function myFunction(ola) {
 
			$.post('handlers/ajax.php?action=AdicionarPessoa&ola='+ola, function(response){
				
				$('.Adicionarppldiv').html(response);
			});
  }



  function myFunction2(ola) {
 
 $.post('handlers/ajax.php?action=Dislike&ola='+ola, function(response){
   
   $('.Adicionarppldiv').html(response);
 });
}

   </script>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>

</html>