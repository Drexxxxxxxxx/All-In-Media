<?php
include("../Bd_Connection/bd_connection.php");

if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password'])) {
        Loginfunction($_POST['name'], $_POST['password']);
    }
}

function Loginfunction($name, $password)
{
    $db2 = GetCategory();
    $query = $db2->prepare("select * from users where name='" .htmlspecialchars($name). "' and password='" .hash("sha512", htmlspecialchars($password)). "'");
    $query->execute();
    $contador=0;
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        $contador = 1;
        $img=$r->name;
        $idlogin = $r->id;
    }
    if($contador == 1)
    {
        SessionLogin($idlogin);
    }
}

session_start();
function SessionLogin($Id)
{
        // Store
        $_SESSION['id'] = $Id;
        // Retrieve
    echo '<script> location.replace("../Home/home.php"); </script>';
}
?>

