<?php
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "SELECT * FROM users WHERE LinkAtivo = '".$_REQUEST['Link']."'";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        if($result['Ativo'] == 0)
        {
            $id= $result['id'];
            ActivateAccount($id);
        }
        else {
            echo '<script>window.location = "Login.php";</script>';
        }
    }
    mysqli_close($con);

    function ActivateAccount($id){       
        $con = mysqli_connect("localhost","root","", "phpteste");
        $sql = "UPDATE users SET Ativo = 1 WHERE id = ".$id."";
		$query=mysqli_query($con,$sql);
        mysqli_close($con);
        echo '<script>alert("Email Correctly Verified")</script>';
        echo '<script>window.location = "Login.php";</script>';
    }
?>