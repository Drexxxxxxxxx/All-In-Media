
<?php
session_start();
function SessionLogin($Id)
{
        // Store
        $_SESSION['id'] = $Id;
        // Retrieve
    echo '<script> location.replace("../Home/home.php"); </script>';
}

function BodyonLoad()
{
            // Store
            echo $_SESSION['id'];
   // document.getElementById("result").innerHTML = $_SESSION['id'];
}

function BodyonLoadSessionRequire()
{
    if($_SESSION['id'])
    {
        echo $_SESSION['id'];
  //  document.getElementById("result").innerHTML = $_SESSION['id'];
    }
    else
    {
        header("Location:Login.php");
    }
}

function Tipos()
{
    header("Location:Login.php");
}

function EAdminQuery()
{
    $con = mysqli_connect("localhost","root","", "all-in-media");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id AND idgrupo = '".$_REQUEST['idgrupo']."'";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = "index.php?idgrupo=".$result['idgrupo'];
        if($result['IsAdmin'] == 1)
        {
            AddPersonToGroup();
        }
    }
    mysqli_close($con);
}
?>