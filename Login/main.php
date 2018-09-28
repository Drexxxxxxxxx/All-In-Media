
<?php
    session_start();
function SessionLogin($Id)
{
        // Store
        $_SESSION['id'] = $Id;
        // Retrieve
    echo '<script> location.replace("Home.php"); </script>';
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

function GruposChat()
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.IsAdmin != 3 ";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = "index.php?idgrupo=".$result['idgrupo'];
        Addtodivgrupo($img, $idlogin);
    }
    mysqli_close($con);
}


function InvitesGrupo()
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select pessoasdogrupo.*, grupo.nome FROM pessoasdogrupo, grupo WHERE IsAdmin = 3 AND idpessoa = '".$_SESSION['id']."' AND idgrupo = grupo.id";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = $result['id'];
        Invites($img, $idlogin);
    }
    mysqli_close($con);
}

function EAdminQuery()
{
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id";
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