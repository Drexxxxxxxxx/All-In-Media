<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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
                    <div class="col-lg-2 col-md-2">
                        <div class="staticImg">

                        </div>

                    </div>
                    <div class="col-lg-10 col-md-10 ">
                        &nbsp;
                        <h1 style="text-align:center"> Iniciar Sessão </h1>
                    
                        <label id="lbl_user" for="username"> Username </label><br>
                        <input type="text" name="name" id="username"  required="required" placeholder="Insert your name"><br><br>
                        <label id="lbl_password" for="password"> Password </label><br>
                        <input type="password" name="password" id="password"  required="required" placeholder="Insert your password"><br><br>
                        <input type="submit" id="btn_login" value="Login" name="submit">
                    
                    </div>
                    
                </div>
            </div>
    </form>
</div>



</body>
<script>

});

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>









<?php
if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password'])) {
        Loginfunction($_POST['name'], $_POST['password']);
    }
}

function Loginfunction($name, $password)
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select * from users where name='" .htmlspecialchars($name). "' and password='" .hash("sha512", htmlspecialchars($password)). "'";
   echo $sql;
   $contador=0;
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $contador = 1;
        $result=mysqli_fetch_array($query);
        $img=$result['name'];
        $idlogin = $result['id'];
    }
    mysqli_close($con);
    if($contador == 1)
    {
    echo "<script type='text/javascript'>",
    "SessionLogin(".$idlogin.");",
    '</script>';
    }
}
?>