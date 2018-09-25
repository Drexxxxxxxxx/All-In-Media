<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name" required="required" placeholder="Insert your name">
    <input type="password" name="password" required="required" placeholder="Insert your password">
    <input type="email" name="email" required="required" placeholder="Insert your Email">
    <input type="submit" value="Login" name="submit">
</form>
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
</body>
</html>