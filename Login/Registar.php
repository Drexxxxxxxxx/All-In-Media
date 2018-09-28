<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="..\_MasterPage\stylesheets\css_index.css" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets\style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>

<header>
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
        &nbsp;

<form action="" method="post">
<div class="container">
                <div class="row" style="">
                    <div class="col-lg-3 col-md-3 col-sm-0 col-xs-0">
                        <div class="staticImg_SignUp">

                        </div>

                    </div>
                    <div class="col-lg-9 col-md-9  ">
                        &nbsp;
                        <fieldset>
                        <hr>
                            <h1 style="text-align:left"> Sign Up </h1><br>

                            <input type="text" id="username" name="name" required="required" placeholder="Insert your name"><br><br>
                            <input type="password" id="password" name="password" required="required" placeholder="Insert your password">                        <br><br>
                            <input type="email" name="email" id="email" required="required" placeholder="Insert your Email"><br><br>
                            <input type="submit" id="btn_login" value="Sign Up" name="submit"><br><br>

                            Already a member? <a href=""> Sign In </a><br><br>
                            By signing up, you agree to our <a href="">Terms</a> and that you have read our <a href="">Privacy Policy</a>  and <a href="">Content Policy</a>.<br><br>
                        <hr>
                        </fieldset>
                        
                    </div>
                    
                </div>
            </div>
    
   
    

</form>

</body>
</html>














<?php
if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])) {
        Registarfunction($_POST['name'], $_POST['password'], $_POST['email']);
    }
}

function Registarfunction($name, $password, $email)
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "insert INTO users (name, password, email) VALUES ('".htmlspecialchars($name)."', '".hash("sha512", htmlspecialchars($password))."', '".htmlspecialchars($email)."')";
   echo $sql;
   $idlogin;
    $query=mysqli_query($con,$sql);
    if($query){
        echo"Utilizdor criado";
     } 
     else
     {
        echo"Erro!";
     }
    mysqli_close($con);
}
?>