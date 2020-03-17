<?php
include("../Bd_Connection/bd_connection.php");
include_once("../PagesCode/ChatCode.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "ChatName":
            $query = $db->prepare("SELECT * FROM grupo WHERE id = '".$_REQUEST['idgrupo']."'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $r) {
                echo $r->nome;
            }          
        break;
        case "SendMessage":
            session_start();
            if(grupoedele($_REQUEST['idgrupo']) == 1)
            {
            echo '<script>alert("hello!");</script>';
                $query = $db->prepare("insert INTO chat SET idQuemEnviou=?, message=?, idGrupo=?");
                $query->execute([$_SESSION['id'], $_REQUEST['message'], $_REQUEST['idgrupo']]);
            }
        break;
        case "getChat":
            session_start();
            $GrupoId=$_REQUEST['idgrupo'];
            if(grupoedele($GrupoId) == 1)
            {
            //Trocar o grupo 1 pelo numero do grupo selecionado
                $query = $db->prepare("select chat.*, grupo.nome, users.name, users.password, users.email from chat, users, grupo WHERE grupo.id = $GrupoId AND grupo.id = chat.idGrupo AND idQuemEnviou = users.id GROUP By id");
                $query->execute();
                $rs = $query->fetchAll(PDO::FETCH_OBJ);
                
                $chat = '';
                
                $ultimo = $_REQUEST['ultimo'];
            
                foreach( $rs as $r ){
                    $teste = $r->id;
                    if($r->id > $_REQUEST['ultimo'] || $_REQUEST['ultimo'] == "undefined")
                    {
                        if($r->idQuemEnviou == $_SESSION['id'])
                        {
                            if($r->isimage==1)
                            {
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms"><div class="row"><p class="mb-0"> <b>You said:</b> </p><img class="img" src="data:image;base64,'.$r->message.'" style="max-height: 500px; max-width: 100%; width: auto;"><p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                            else if($r->isimage==0)
                            {
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms"><div class="row"><p> <b>You said:</b> </p>'.$r->message.'<p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                            else if($r->isimage==2)
                            {
                                $LOL="'".$r->message."'";
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms"><div class="row"><p class="mb-0"> <b>You said:</b>  </p> <div class="position-relative"> <input type="image" onclick="VerVideo('.$LOL.')" src="https://beingclarity.com/wp-content/uploads/2018/01/play-button-png-play-video-button-png-321.png" class="imagemvideobtn"> <video height="100%" width="100%"><source src="'.$r->message.'" type="video/mp4"></video> </div>'.$r->message.'<p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                        }
                        else
                        {
                            if($r->isimage==1)
                            {
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms float-left"><div class="row"><p class="mb-0"> <b>'.$r->name.' said:</b>  </p><img class="img" src="data:image;base64,'.$r->message.'" style="max-height: 500px; max-width: 100%; width: auto;"><p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                            else if($r->isimage==0)
                            {
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms float-left"><div class="row"><p> <b>'.$r->name.' said:</b>  </p>'.$r->message.'<p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                            else if($r->isimage==2)
                            {
                                $LOL="'".$r->message."'";
                                $chat .=  '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eachclass" id="'.$r->id.'"><div class="user_sms float-left"><div class="row"><p class="mb-0"> <b>'.$r->name.' said:</b>  </p> <div class="position-relative"> <input type="image" onclick="VerVideo('.$LOL.')" src="https://beingclarity.com/wp-content/uploads/2018/01/play-button-png-play-video-button-png-321.png" class="imagemvideobtn"> <video height="100%" width="100%"><source src="'.$r->message.'" type="video/mp4"></video> </div>'.$r->message.'<p class="whensend">'.$r->date.'</p></div></div></div>';
                            }
                        }
                    }
                }
                echo $chat;
                
            }
        break;
        case "LastSeenMessage":
			session_start();
			echo "update pessoasdogrupo SET UltimaLida=".$_REQUEST['ultimo']." WHERE idpessoa=".$_SESSION['id']." AND idgrupo =".$_REQUEST['idgrupo']."";
			$query = $db->prepare("update pessoasdogrupo SET UltimaLida=".$_REQUEST['ultimo']." WHERE idpessoa=".$_SESSION['id']." AND idgrupo =".$_REQUEST['idgrupo']."");
			$query->execute();
        break;
        case "GetLastMessage":
            session_start();
            $query = $db->prepare("SELECT * FROM pessoasdogrupo WHERE idpessoa = ".$_SESSION['id']." AND idgrupo = ".$_REQUEST['idgrupo']."");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $r) {
                return $r->UltimaLida;
            }   
		break;
    }
}

function grupoedele($id)
{
    $query = $db->prepare("select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.idgrupo='" .$id. "'");
    $query->execute();
    $contador=0;
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        $contador = 1;
    }   

    if($contador == 1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}