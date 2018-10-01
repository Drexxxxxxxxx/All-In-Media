<?php
session_start();
?>
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
  $sql = "select * from conteudo order by id DESC";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  echo '<form action="home.php" method="post">';
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      $id=$result['id'];
          $dbhost = "localhost";
          $dbname = "phpteste";
          $dbuser = "root";
          $dbpass = '';
          try{
            $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
          }catch(PDOException $e){
            echo $e->getMessage();
          }
          $contador = 0;
        $query2 = $db->prepare("select * FROM likesconteudo WHERE iduser = '".$_SESSION['id']."' AND idConteudo = '" .$id."'");
        $query2->execute();
        $rs = $query2->fetchAll(PDO::FETCH_OBJ);
        
        $chat = '';
        foreach( $rs as $r ){
          $contador = $r->LikeDislike;
        }

        if($contador == 1)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea rows="3" cols="50">
       
        </textarea><br><br><br><br>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea rows="3" cols="50">
         
          </textarea><br><br><br><br>';
          }
        }

        if($contador == 2)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea rows="3" cols="50">
       
        </textarea><br><br><br><br>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea rows="3" cols="50">
         
          </textarea><br><br><br><br>';
          }
        }       

        if($contador == 0)
        {
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
          }
          else{
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
           echo '<label class="container">Like
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
           <span class="checkmark"></span>
         
         Dislike
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
           <span class="checkmark"></span>
         </label><textarea rows="3" cols="50">
        
         </textarea><br><br><br><br>';
          }
        }  
  }


  echo '</form>';


}





?>

<script>
  
  function updateLike(ola) {
 
			$.post('handlers/ajax.php?action=LikeUpdate&ola='+ola, function(response){
				
				$('.Adicionarppldiv').html(response);
			});
  }

    function updateDislike(ola) {
 
 $.post('handlers/ajax.php?action=DislikeUpdate&ola='+ola, function(response){
   
   $('.Adicionarppldiv').html(response);
 });
}

  function myFunction(ola) {
 
 $.post('handlers/ajax.php?action=Like&ola='+ola, function(response){
   
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