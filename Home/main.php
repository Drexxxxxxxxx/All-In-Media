<?php
session_start();
function BodyonLoadSessionRequire()
{
    if ($_SESSION['id']) {
        echo $_SESSION['id'];
  //  document.getElementById("result").innerHTML = $_SESSION['id'];
    } else {
        header("Location:../Login/Login.php");
    }
}

function display(){
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select * from conteudo order by id DESC";
    
     $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    $count=0;
    echo '<form action="../Home/home.php" method="post">';
    for($i=0;$i<$num;$i++){
        $result=mysqli_fetch_array($query);
        $img=$result['imagem'];
        $id=$result['id'];
            $dbhost = "localhost";
            $dbname = "phpteste";
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
  
          if($contador == 1)
          {
            if(!$img=="")
            { 
            echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
          </textarea>';
            }
            else
            {
              $video=$result['video'];
              echo '<video width="400" height="300" controls>';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
             echo '</video>';
              echo '<label class="container">Like
              <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
              <span class="checkmark"></span>
            
            Dislike
              <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
              <span class="checkmark"></span>
            </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
           
            </textarea>';
            }
          }
  
          if($contador == 2)
          {
            if(!$img=="")
            { 
            echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
            }
            else
            {
              $video=$result['video'];
              echo '<video width="400" height="300" controls>';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
             echo '</video>';
              echo '<label class="container">Like
              <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
              <span class="checkmark"></span>
            
            Dislike
              <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
              <span class="checkmark"></span>
            </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
           
            </textarea>';
            }
          }       
  
          if($contador == 0)
          {
            if(!$img=="")
            { 
            echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
            }
            else{
              $video=$result['video'];
              echo '<video width="400" height="300" controls>';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
              echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
             echo '</video>';
             echo '<label class="container">Like
             <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
             <span class="checkmark"></span>
           
           Dislike
             <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
             <span class="checkmark"></span>
           </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
          
           </textarea>';
            }
          }
          echo '<button onclick="comentar('.$id.')">Comentar</button>';
          echo '<button onclick="PorNosFavoritos('.$id.')">Adicionar aos Favoritos</button>';
         comentarios($id);
          
          echo '<br><br><br><br></form>';
    }
  
}

function comentarios($id)
{
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "SELECT * FROM comentarios WHERE idVideo = ".$id." order by id DESC";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  if($num > 3)
  {
    echo "<div id='comentario_".$id."' style='display:none'>";
  }
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $descricao = $result['texto'];
      echo "<p>".$descricao."</p>";
  }
  if($num > 3)
  {
    echo "</div>
    <p><button type='button' class='btn btn-link' onclick='$(\"#comentario_".$id."\").toggle();'>Ver/Fechar os ".$num." comentários</button></p>";
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
    $con = mysqli_connect("localhost","root","", "phpteste");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id and pessoasdogrupo.IsAdmin != 3 ";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = "../Login/index.php?idgrupo=".$result['idgrupo'];
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

function PedidosAmizade()
{
  $con = mysqli_connect("localhost","root","", "phpteste");
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
  echo "<button onclick='window.location =\"../Home/Perfil.php?id=".$_SESSION['id']."\"'>Ver Perfil</button>";
}



//Perfil Page
function PerfilData()
{
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "SELECT * FROM users WHERE id = '".$_REQUEST['id']."'";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $Nome = $result['name'];
      $email = $result['email'];
      echo "<p>".$Nome."</p> <p>" .$email. "</p>";
  }
  mysqli_close($con);
}

function Amigos()
{
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "SELECT amigos.*, users.id AS iduser, users.name, users.email FROM amigos, users WHERE ((idPedido = '".$_REQUEST['id']."' AND idAceitar = users.id) OR (idAceitar = '".$_REQUEST['id']."' AND idPedido = users.id)) AND Aceite = 1";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      $iduser = $result['iduser'];
      $Nome = $result['name'];
      echo "<p><a href='../Home/Perfil.php?id=".$iduser."'>".$Nome."</a></p>";
  }
  mysqli_close($con);
}


//Mydisplay Page
function mydisplay(){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "select * from conteudo WHERE Id_Publicador = ".$_SESSION['id']." order by id DESC";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  echo '<form action="../Home/home.php" method="post">';
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      $id=$result['id'];
          $dbhost = "localhost";
          $dbname = "phpteste";
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

        if($contador == 1)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
          }
        }

        if($contador == 2)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
          }
        }       

        if($contador == 0)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else{
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
           echo '<label class="container">Like
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
           <span class="checkmark"></span>
         
         Dislike
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
           <span class="checkmark"></span>
         </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
        
         </textarea>';
          }
        }  
        echo '<button onclick="comentar('.$id.')">Comentar</button>';
        echo '<button onclick="PorNosFavoritos('.$id.')">Adicionar aos Favoritos</button>';
        comentarios($id);
          
        echo '<br><br><br><br>';
  }


  echo '</form>';


}
function FavoritesToDysplay(){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "SELECT * FROM favoritostbl WHERE idPessoa = ".$_SESSION['id']."";
  $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  for($i=0;$i<$num;$i++)
  {
      $result=mysqli_fetch_array($query);
      DisplayFavorites($result['idVideo']);
  } 
  mysqli_close($con);
}

function DisplayFavorites($idVideo){
  $con = mysqli_connect("localhost","root","", "phpteste");
  $sql = "select * from conteudo WHERE id = ".$idVideo." order by id DESC";
  
   $query=mysqli_query($con,$sql);
  $num=mysqli_num_rows($query);
  $count=0;
  echo '<form action="../Home/home.php" method="post">';
  for($i=0;$i<$num;$i++){
      $result=mysqli_fetch_array($query);
      $img=$result['imagem'];
      $id=$result['id'];
          $dbhost = "localhost";
          $dbname = "phpteste";
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

        if($contador == 1)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
          }
        }

        if($contador == 2)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else
          {
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
            echo '<label class="container">Like
            <input type="radio" value="radio" name="radio'.$id.'" onchange="updateLike('.$id.')">
            <span class="checkmark"></span>
          
          Dislike
            <input type="radio" value="radio" name="radio'.$id.'" checked onchange="updateDislike('.$id.')">
            <span class="checkmark"></span>
          </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
         
          </textarea>';
          }
        }       

        if($contador == 0)
        {
          if(!$img=="")
          { 
          echo '<img class="img" src="data:image;base64,'.$img.'"><br><label class="container">Like
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
          <span class="checkmark"></span>
        
        Dislike
          <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
          <span class="checkmark"></span>
        </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
       
        </textarea>';
          }
          else{
            $video=$result['video'];
            echo '<video width="400" height="300" controls>';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/mp4">';
            echo '<source class="img" src="../AdicionarConteudo/'.$video.'" type="video/ogg"><br><br><br>';
           echo '</video>';
           echo '<label class="container">Like
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction('.$id.')">
           <span class="checkmark"></span>
         
         Dislike
           <input type="radio" value="radio" name="radio'.$id.'" onchange="myFunction2('.$id.')">
           <span class="checkmark"></span>
         </label><textarea id="textarea_'.$id.'" rows="3" cols="50">
        
         </textarea>';
          }
        }  
        echo '<button onclick="comentar('.$id.')">Comentar</button>';
        echo '<button onclick="RemoverdosFavoritos('.$id.')">Remover dos Favoritos</button>';
        comentarios($id);
          
        echo '<br><br><br><br>';
  }


  echo '</form>';

}


