<?php
echo "<script>alert('test');</script>";
include("../config.php");
if( isset($_REQUEST['action']) ){
	switch( $_REQUEST['action'] ){
		case "Likes_Dislikes":
		$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="update conteudo SET likes = likes + 1 WHERE id = " .$_REQUEST['ola']. "";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";
			
		}
		mysqli_close($con);
		break;		
	}
}
?>