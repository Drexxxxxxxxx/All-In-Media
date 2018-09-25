<?php
include("../config.php");
if( isset($_REQUEST['action']) ){
	switch( $_REQUEST['action'] ){
		case "SendMessage":
			session_start();
			$query = $db->prepare("insert INTO chat SET idQuemEnviou=?, message=?, idGrupo=?");
			$query->execute([$_SESSION['user'], $_REQUEST['message'], $_SESSION['grupo']]);
		break;
		case "getChat":
		session_start();
		$GrupoId=$_SESSION['grupo'];
		//Trocar o grupo 1 pelo numero do grupo selecionado
			$query = $db->prepare("select chat.*, grupo.nome, users.name, users.password, users.email from chat, users, grupo WHERE grupo.id = $GrupoId AND idQuemEnviou = users.id");
			$query->execute();
			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			
			$chat = '';
			foreach( $rs as $r ){
				$chat .=  '<div class="siglemessage"><strong>'.$r->name.' says:  </strong>'.$r->message.'</div>';
			}
			echo $chat;
		break;
	}
}
?>