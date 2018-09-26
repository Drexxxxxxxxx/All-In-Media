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
<?php
include_once 'main.php';
?>
    <input type="text" name="name"  required="required" placeholder="Insert your name">
    <input type="password" name="password"  required="required" placeholder="Insert your password">
    <input type="submit" value="Login" name="submit">
</form>

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
    SessionLogin($idlogin);
    }
}
?>
</body>
</html>