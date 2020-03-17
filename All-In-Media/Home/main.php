<?php
session_start();
function BodyonLoadSessionRequire2()
{
    if ($_SESSION['id']) {
        echo $_SESSION['id'];
  //  document.getElementById("result").innerHTML = $_SESSION['id'];
    } else {
        header("Location:../Login/Login.php");
    }
}

function TransformSlider($num, $count, $query){
  echo '<form action="../Home/home.php" style="padding-top: 25px; padding-bottom: 150px;" method="post">';
  echo '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';
  echo '<div class="slideshow-container">';

  $FooterItemsNames = "<div class='footerImagesVideosParentDiv'>";
  $contadorCurrentSlide = 0;
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      $id=$result['id'];
          $dbhost = "localhost";
          $dbname = "all-in-media";
          $dbuser = "root";
          $dbpass = '';
          try{
            $db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
          }catch(PDOException $e){
            echo $e->getMessage();
          }
          $contador = 0;
        $query2 = $db->prepare("select * FROM likesconteudo WHERE iduser = '".$_SESSION['id']."' AND idConteudo = '" .$id."'");
        $query2->execute();
        $rs = $query2->fetchAll(PDO::FETCH_OBJ);
        
        $chat = '';
        foreach( $rs as $r ){
          $contador = $r->LikeDislike;
        }
        
        echo '<div class="mySlides fade-2">';
        $contadorCurrentSlide++;

        echo '<div class="Div33porcent" style="left:0%;width: 25%;"> <div class="InsideDiv33porcent">';
        echo '<div class="h-100"><p>Titulo</p> <p>Descrição</p></div>';
        echo '</div>';
        isSubAlready($result['Id_Publicador']);
        echo '</div>';

        echo '<div class="Div33porcent" style="left:33%;"> <div class="InsideDiv33porcent">';
                
        if(!$img=="")
        { 
          $FooterItemsNames = $FooterItemsNames . "<div onclick='currentSlide(".$contadorCurrentSlide.")' class='imageSlideFooterParent'><div class='imageSliderFooter' id='DivImage".$contadorCurrentSlide."'><img class='img h-100' width='100%' src='data:image;base64,".$img."'></div><p class='FooterVideosImages'>" .$result["Nome"]. " </p></div>";
          echo '<img class="img img-Slider" src="data:image;base64,'.$img.'">';
        }
        else
        {
          $video=$result['video'];
          $FooterItemsNames = $FooterItemsNames . "<div onclick='currentSlide(".$contadorCurrentSlide.")' class='imageSlideFooterParent'><div class='imageSliderFooter' id='DivImage".$contadorCurrentSlide."'></div> <p class='FooterVideosImages'>" .$result["Nome"]. " </p> <script>showImageAt(0, \"../AdicionarConteudo/".$video."\", ".$contadorCurrentSlide.");</script></div>";

          echo '<video width="100%" controls>';
          echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
          echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
          echo '</video>';        
        }
        echo '</div>';

        if($contador == 1)
        {
          echo '<div class="LabelSlideShow OutsideDiv33porcent" style="margin-top: 20px;"> <label>
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
            <i class="far fa-2x fa-thumbs-up"></i>
          </label>
          <label>
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
            <i class="far fa-2x fa-thumbs-down"></i>
          </label> </div>';
        }

        if($contador == 2)
        {          
          echo '<div class="LabelSlideShow OutsideDiv33porcent" style="margin-top: 20px;"> <label>
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
          <i class="far fa-2x fa-thumbs-up"></i>
          </label>
          <label>
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
          <i class="far fa-2x fa-thumbs-down"></i>
          </label> </div>';           
        }       

        if($contador == 0)
        {           
          echo '<div class="LabelSlideShow OutsideDiv33porcent" style="margin-top: 20px;"> <label>
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
          <i class="far fa-2x fa-thumbs-up"></i>
          </label>        
          <label>
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
          <i class="far fa-2x fa-thumbs-down"></i>
          </label> </div>';         
        }

        echo '</div>';

        echo '<div class="Div33porcent" style="left:66%; width: 25%;"> <div class="InsideDiv33porcent">';
        
        echo '<div style="height: -webkit-fill-available !important; padding-bottom: 75px;">';
        comentarios($id);
        echo '<div class="insideDivBottom">';
        echo '<textarea id="textarea_'.$id.'" rows="1" class="w-100 d-block insideDivBottomTextArea"></textarea>';
        echo '<button class="w-100 btn btn-primary" onclick="comentar('.$id.')">Comentar</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';    
        isFavAlready($id); 
        echo '</div>';     
        echo '</div>';
  }
  echo '</div>';
  echo '<a class="next" onclick="plusSlides(1)">&#10095;</a>';
  echo '</form>';
  echo $FooterItemsNames . "</div>";
}

function display(){
    $con = mysqli_connect("localhost","root","", "all-in-media");
    $sql = "select * from conteudo order by id DESC";
    
     $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    $count=0;
    TransformSlider($num, $count, $query);
    
}
function isFavAlready($idChannel)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM favoritostbl WHERE idPessoa = ".$_SESSION['id']." AND idVideo = " .$idChannel. "";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  if($num == 0)
  {
    echo '<button class="btn btn-primary btn-block OutsideDiv33porcent"  style="margin-top: 20px;" onclick="PorNosFavoritos('.$idChannel.')">Adicionar aos Favoritos</button>';
  }
  else
  {
    echo '<button class="btn btn-primary btn-block OutsideDiv33porcent"  style="margin-top: 20px;" onclick="RemoverdosFavoritos('.$idChannel.')">Remover dos Favoritos</button>';
  }
  mysqli_close($con);
}


function isSubAlready($idChannel)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM subscritostbl WHERE IdPessoa = ".$_SESSION['id']." AND IdCanal = " .$idChannel. "";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  if($num == 0)
  {
    AddSubscriptionBtn($idChannel);
  }
  else
  {
    RemoveSubscriptionBtn($idChannel);
  }
  mysqli_close($con);
}
function AddSubscriptionBtn($idChannel)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT name FROM users WHERE id=".$idChannel.";";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      echo '<Button class="btn btn-primary btn-block OutsideDiv33porcent"  style="margin-top: 20px;" onclick="SubToChannel('.$idChannel.')"> Subscribe '.$result['name'].' </Button>';
  }
  mysqli_close($con);
}

function comentarios($id)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM comentarios WHERE idVideo = ".$id." order by id DESC";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
    echo "<div style='height: -webkit-fill-available; overflow: auto;'>";
  
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      pessoa($result['idPessoa']);
      $descricao = $result['texto'];
      echo "<p>".$descricao."</p>";
  }
    echo "</div>";

  
  mysqli_close($con);
}

function pessoa($idPessoa){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM users WHERE id = ".$idPessoa."";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      echo "<a href='../Home/Perfil.php?id=".$idPessoa."'>".$result['name']."</a>";
  }
  
  mysqli_close($con);
}

function Addtodivgrupo($Nome, $link)
{
  echo "<p><a href='".$link."'>".$Nome."</a><p>";
}

function Invites($Nome, $link)
{
    echo "<p class='d-inline'>$Nome &ThickSpace;</p><button onclick=AceitarPedido(".$link.")><i class='far fa-thumbs-up'></i></button><button onclick=RecusarPedido(".$link.")><i class='far fa-thumbs-down'></i></button>";
}

function GruposChat()
{
    $con = mysqli_connect("localhost","root","", "all-in-media");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.IsAdmin != 3 ";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = "../Login/index.php?idgrupo=".$result['idgrupo']."&LastRead=" .$result['UltimaLida'];
        Addtodivgrupo($img, $idlogin);
    }
    mysqli_close($con);
}

function InvitesGrupo()
{
    $con = mysqli_connect("localhost","root","", "all-in-media");
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

function PedidosAmizade()
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "select amigos.id AS idamigos, amigos.idPedido, amigos.idAceitar, amigos.Aceite, users.* FROM amigos, users WHERE idAceitar = '".$_SESSION['id']."' and Aceite = 0 and users.id = amigos.idPedido";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $id = $result['idPedido'];
      $nome = $result['name'];
      $idamigos = $result['idamigos'];
      echo "<p class='d-inline'>$nome &ThickSpace;</p><button onclick=AceitarAmizade(".$idamigos.")><i class='far fa-thumbs-up'></i></button> <button onclick=RecusarAmizade(".$idamigos.")><i class='far fa-thumbs-down'></i></button>";
  }
  mysqli_close($con);
}

function Perfil()
{
  echo "<button class='w-100 btn btn-primary' onclick='window.location =\"../Home/Perfil.php?id=".$_SESSION['id']."\"'>Ver Perfil</button>";
}



//Perfil Page
function PerfilData()
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM users WHERE id = '".$_REQUEST['id']."'";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $Nome = $result['name'];
      $email = $result['email'];
      echo "<h4>Nome:</h4><p>".$Nome."</p>";
      echo "<h4>Email:</h4><p>" .$email. "</p>";
  }
  mysqli_close($con);

  if($_REQUEST['id'] == $_SESSION['id'])
  {
    echo "<button onclick='$(\"#CurrentPassWordDivID\").toggle();' class='w-50 btn btn-primary'>Change youre Password</button><br><br>";
  }
}

function Amigos()
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT amigos.*, users.id AS iduser, users.name, users.email FROM amigos, users WHERE ((idPedido = '".$_REQUEST['id']."' AND idAceitar = users.id) OR (idAceitar = '".$_REQUEST['id']."' AND idPedido = users.id)) AND Aceite = 1";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  echo '<h4>Amigos</h4>';
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $iduser = $result['iduser'];
      $Nome = $result['name'];
      echo "<p>-<a href='../Home/Perfil.php?id=".$iduser."'>".$Nome."</a>;</p>";
  }
  mysqli_close($con);
}


//Mydisplay Page
function mydisplay(){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "select * from conteudo WHERE Id_Publicador = ".$_SESSION['id']." order by id DESC";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  TransformSlider($num, $count, $query);
}

//Favorites Page 
function FavoritesToDysplay(){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM favoritostbl WHERE idPessoa = ".$_SESSION['id']."";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $arrayIdVideos=array();
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      array_push($arrayIdVideos, $result['idVideo']);
  } 
  DisplayFavorites($arrayIdVideos);

  mysqli_close($con);
}

function DisplayFavorites($idVideo){
  $sql = "select * from conteudo WHERE ";
  $cont = 0;
  foreach ($idVideo as &$value)
  {
    $cont++;
    if($cont == 1)
    {
      $sql = $sql . "id = " .$value;
    }
    else {
      $sql = $sql . " OR id = " .$value;
    }
  }
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = $sql . " order by id DESC";
  
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  TransformSlider($num, $count, $query);
}

//Subscription Page
function SubChannelToDysplay(){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT * FROM subscritostbl WHERE IdPessoa = ".$_SESSION['id']."";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $tdsosCanaisSeguidos = 'select * from conteudo WHERE ';
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      if($i == 0)
      {
        $tdsosCanaisSeguidos .= 'Id_Publicador = '.$result['IdCanal'].'';
      }
      else
      {
        $tdsosCanaisSeguidos .= ' OR Id_Publicador = '.$result['IdCanal'].'';
      }
  } 
  $tdsosCanaisSeguidos .= ' order by id DESC';

  DisplaySubChannel($tdsosCanaisSeguidos);

  mysqli_close($con);
}
function DisplaySubChannel($allchanels)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = $allchanels;
  
   $query=mysqli_query($con,$sql);
   if (!$query || mysqli_num_rows($query) == 0)
   {
     echo '<h1>Sem Canais Subscritos</h1>';
   }
   else {
  $num=mysqli_num_rows($query);
  $count=0;
  TransformSlider($num, $count, $query);
   }
}

function RemoveSubscriptionBtn($idChannel)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT name FROM users WHERE id=".$idChannel.";";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      echo '<Button class="btn btn-primary btn-block OutsideDiv33porcent"  style="margin-top: 20px;" onclick="UnSubToChannel('.$idChannel.')"> Unsub '.$result['name'].' </Button>';
  }
  mysqli_close($con);
}


//Trending Page
function Trendisplay(){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  $sql = "SELECT conteudo.*, idConteudo, COUNT(*) AS CountOf, SUM(CASE WHEN LikeDislike = 2 THEN 1 ELSE -1 END) as sera FROM likesconteudo, conteudo WHERE idConteudo = conteudo.id GROUP BY idConteudo ORDER BY sera DESC";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  TransformSlider($num, $count, $query);

}

//OneVideo Page
function OneVideodisplay(){
  $con = mysqli_connect("localhost","root","", "all-in-media");
  if(isset($_REQUEST['id']))
  {
    $sql = "select * from conteudo WHERE id = ".$_REQUEST['id']." order by id DESC";
  }
  if(isset($_REQUEST['texto']))
  {
    $sql = "SELECT * FROM conteudo WHERE Nome LIKE '%".$_REQUEST['texto']."%' order by id DESC";
  }
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  TransformSlider($num, $count, $query);
}

//Login/Home (Chats) Page
function GruposChatMenu()
{
    $con = mysqli_connect("localhost","root","", "all-in-media");
    $sql = "select grupo.id AS grupoid, grupo.nome, pessoasdogrupo.* FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.IsAdmin != 3 ";
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
}

function AddtodivgrupoMenu($Nome, $link, $idpessoasdogrupo, $ultimaLida)
{
  $con = mysqli_connect("localhost","root","", "all-in-media");
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

  $con = mysqli_connect("localhost","root","", "all-in-media");
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




<script>
function comentar(id)
{
	var text = $("#textarea_" + id).val();
	$.post('../Home/handlers/ajax.php?action=Comentar&id='+id+'&text='+text, function(response){			
		location.replace("../Home/Home.php");
	});
}
function PorNosFavoritos(id)
{
	$.post('../Home/handlers/ajax.php?action=AddToFavorites&id='+id, function(response){			
		location.replace("../Home/Home.php");
	});
}
function SubToChannel(id)
{
	$.post('../Home/handlers/ajax.php?action=SubToChannel&id='+id, function(response){			
		location.replace("../Home/Home.php");
	});
}
function UnSubToChannel(id)
{
	$.post('../Home/handlers/ajax.php?action=UnSubToChannel&id='+id, function(response){			
		location.replace("../Home/Home.php");
	});
}
function RemoverdosFavoritos(id)
{
	$.post('../Home/handlers/ajax.php?action=RemoveFromFavorites&id='+id, function(response){			
		location.replace("../Home/Home.php");
	});
}
</script>