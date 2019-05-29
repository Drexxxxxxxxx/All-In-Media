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
		case "SearchFunction":
			$con = mysqli_connect("localhost","root","", "phpteste");

			$query = $db->prepare("SELECT * FROM conteudo WHERE Nome LIKE '%".$_REQUEST['texto']."%'");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			
			$idpessoa='';
			foreach( $rs as $r ){
				echo "<p onclick='SearchSugestionClickFunction(".$r->id.")'  style='cursor: pointer'><a href='#'>" .$r->Nome. "</a></p>";
			}
			mysqli_close($con);

			echo $idpessoa;
		break;
		case "CheckPassword":
			$con = mysqli_connect("localhost","root","", "phpteste");

			$query = $db->prepare("SELECT * FROM users WHERE id = '".$_SESSION['id']."' AND password = '" .hash("sha512", htmlspecialchars($_REQUEST['Password'])). "'");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			
			foreach( $rs as $r ){
				echo 1;
			}
			mysqli_close($con);
		break;
		case "ChangePassword":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$query = $db->prepare("UPDATE users SET password = '".hash("sha512", htmlspecialchars($_REQUEST['Password']))."' WHERE id = ".$_SESSION['id']."");
			$query->execute();
			mysqli_close($con);
			echo 1;
		break;
		case "Logout":
			session_destroy();
		break;
		case "SearchChatGroup":
			$con = mysqli_connect("localhost","root","", "phpteste");
			$sql = "select grupo.id AS grupoid, grupo.nome, pessoasdogrupo.* FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.IsAdmin != 3 AND grupo.nome LIKE '%".$_REQUEST['texto']."%'"; 			
			$query=mysqli_query($con,$sql);
			$num=mysqli_num_rows($query);
			for($i=0;$i<$num;$i++)
			{
				$result=mysqli_fetch_array($query);
				$img= $result['nome'];
				$idlogin = "../Login/index.php?idgrupo=".$result['idgrupo'];
				$idpessoasdogrupo = $result['id'];
				$ultimaLida = $result['UltimaLida'];
				AddtodivgrupoMenu($img, $idlogin, $idpessoasdogrupo, $ultimaLida);
			}
			mysqli_close($con);
		break;		
	}
}	

function AddtodivgrupoMenu($Nome, $link, $idpessoasdogrupo, $ultimaLida)
{
	$con = mysqli_connect("localhost","root","", "phpteste");
	$sql = "SELECT COUNT(*) FROM chat, pessoasdogrupo WHERE chat.id > ".$ultimaLida." AND chat.idGrupo = pessoasdogrupo.idgrupo AND pessoasdogrupo.id = " .$idpessoasdogrupo;
	$query=mysqli_query($con,$sql);
	$num=mysqli_num_rows($query);
	$NumeroDeMensagensParaLer = 0;
	for($i=0;$i<$num;$i++)
	{
	$result=mysqli_fetch_array($query);
	$NumeroDeMensagensParaLer = $result["COUNT(*)"];
	}
	mysqli_close($con);

	lastmessage($Nome, $link, $idpessoasdogrupo, $NumeroDeMensagensParaLer, $ultimaLida);
}

function lastmessage($Nome, $link, $idpessoasdogrupo, $NumeroDeMensagensParaLer, $ultimaLida)
{
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "SELECT * FROM chat, pessoasdogrupo where pessoasdogrupo.id = ".$idpessoasdogrupo." AND pessoasdogrupo.idgrupo = chat.idGrupo ORDER BY chat.ID DESC LIMIT 1";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
    $result=mysqli_fetch_array($query);
    $message = $result["message"];
    $date = $result["date"];
    
    WriteChatsDivs($Nome, $link, $NumeroDeMensagensParaLer, $message, $date, $ultimaLida);
  }
  mysqli_close($con);
}

function WriteChatsDivs($Nome, $link, $NumeroDeMensagensParaLer, $message, $date, $ultimaLida) {
	echo '
	<div class="row msg_div ml-0 mr-0" onclick="window.location.href=\''.$link.'&LastRead='.$ultimaLida.'\'">
			<div class="col-lg-2 col-md-2 col-sm-4 col-4" style="text-align:center">
				<input type="image" class="profile_pic align-middle" src="../_Groups/images/profile.jpeg" alt="">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-6">
				<br>
				<strong>
				'.$Nome.'
				</strong><br>
				<p>'.$message.'</p>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-2" style="text-align:center">
				<br>
				<p> '.$date.' </p>
				<div class="notificacao">
					<p class="notificacao_icn" >
						'.$NumeroDeMensagensParaLer.'
					</p>
				</div>
			</div>
		</div>
		<hr>
	';
}

?>