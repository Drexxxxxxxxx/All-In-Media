<?php
$idconteudo=$_GET['myData'];
$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="update conteudo SET likes = likes + 1 WHERE id =".$idconteudo;
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";
			
		}
        mysqli_close($con);
        
        
    ?>    