<?php
include("../config.php");
session_start();
if( isset($_REQUEST['action']) ){
	switch( $_REQUEST['action'] ){
		case "Like":
		$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="insert INTO likesconteudo (iduser, LikeDislike, idConteudo) VALUES ('".$_SESSION['id']."', 1, '".$_REQUEST['ola']."');";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";	
		}
		mysqli_close($con);
		break;

		case "Dislike":
		$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="insert INTO likesconteudo (iduser, LikeDislike, idConteudo) VALUES ('".$_SESSION['id']."', 2, '".$_REQUEST['ola']."');";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";	
		}
		mysqli_close($con);
		break;

		case "LikeUpdate":
		$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="update likesconteudo SET LikeDislike = 1 WHERE iduser = '".$_SESSION['id']."' AND idConteudo = '".$_REQUEST['ola']."'";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";	
		}
		mysqli_close($con);
		break;

		case "DislikeUpdate":
		$con = mysqli_connect("localhost","root","", "phpteste");
		$sql="update likesconteudo SET LikeDislike = 1 WHERE iduser = '".$_SESSION['id']."' AND idConteudo = '".$_REQUEST['ola']."'";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";	
		}
		mysqli_close($con);
		break;
	}
  }
?>