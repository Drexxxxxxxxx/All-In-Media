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
		$sql="update likesconteudo SET LikeDislike = 2 WHERE iduser = '".$_SESSION['id']."' AND idConteudo = '".$_REQUEST['ola']."'";
		$query=mysqli_query($con,$sql);
		if($query){
			echo"sucess";	
		}
		mysqli_close($con);
		break;
		case "AceitarPdd":
			$query = $db->prepare("update pessoasdogrupo SET IsAdmin=0 WHERE id=?");
			$query->execute([$_REQUEST['id']]);
		break;
		case "RecusarPdd":
			$query = $db->prepare("DELETE FROM pessoasdogrupo WHERE id=?");
			$query->execute([$_REQUEST['id']]);
		break;
		case "AddFriend":
			$con = mysqli_connect("localhost","root","", "phpteste");

			$query = $db->prepare("select id FROM users WHERE name='" .$_REQUEST['nome']. "'");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			
			$idpessoa='';
			foreach( $rs as $r ){
				$idpessoa = $r->id;
			}
			mysqli_close($con);

			echo $idpessoa;

			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("INSERT INTO amigos (idPedido, idAceitar, Aceite) VALUES (".$_SESSION['id'].", ?, 0);");
			$query->execute([$idpessoa]);
			mysqli_close($con);
		break;
		case "CreateGroup":
			$con = mysqli_connect("localhost","root","", "phpteste");


			if ($con->connect_error) {
				die("Connection failed: " . $con->connect_error);
			} 
			
			$sql = "INSERT INTO grupo (nome) VALUES ('".$_REQUEST['nome']."');";
			
			if ($con->query($sql) === TRUE) {
				$last_id = $con->insert_id;
			}
			
			$con->close();

			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("INSERT INTO pessoasdogrupo (idpessoa, idgrupo, IsAdmin) VALUES ('".$_SESSION['id']."', '".$last_id."', '1');");
			$query->execute();
			mysqli_close($con);
		break;
		case "AceitarAmizade":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("UPDATE amigos SET Aceite = 1 WHERE id = ".$_REQUEST['id']."");
			$query->execute();
			mysqli_close($con);
		break;
		case "RecusarAmizade":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("DELETE FROM amigos WHERE id = ".$_REQUEST['id']."");
			$query->execute();
			mysqli_close($con);
		break;
		case "Comentar":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("INSERT INTO comentarios (idVideo, idPessoa, texto) VALUES (".$_REQUEST['id'].", ".$_SESSION['id'].", '".$_REQUEST['text']."');");
			$query->execute();
			mysqli_close($con);
		break;
		case "AddToFavorites":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("INSERT INTO favoritostbl (idVideo, idPessoa) VALUES (".$_REQUEST['id'].", ".$_SESSION['id'].");");
			$query->execute();
			mysqli_close($con);
		break;
		case "RemoveFromFavorites":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("DELETE FROM favoritostbl WHERE idVideo = ".$_REQUEST['id']."");
			$query->execute();
			mysqli_close($con);
		break;
		case "SubToChannel":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("INSERT INTO subscritostbl (IdPessoa, IdCanal) VALUES (".$_SESSION['id'].", ".$_REQUEST['id'].");");
			$query->execute();
			mysqli_close($con);
		break;
		case "UnSubToChannel":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("DELETE FROM subscritostbl WHERE IdCanal = ".$_REQUEST['id']." AND IdPessoa = ".$_SESSION['id'].";");
			$query->execute();
			mysqli_close($con);
		break;
	}
  }
?>