<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat System</title>


	<link rel="stylesheet" href="style.css" type="text/css" />


	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

</head>
<?php
include_once 'main.php';
?>
<body onload="<?php BodyonLoadSessionRequire() ?>">
	
<div id="result">
    <?php
			EAdminQuery();
			?>
</div>

<div class="Adicionarppldiv"></div>


          <div class="custompopup" id="AbrirVideo" runat="server" style="display:none;">
                <button type='button' style="padding: 0% 0%; position: fixed;
                top: 2.5%;
                right: 1.4%; z-index: 1" id="FecharvideoBtn" onclick=DivVideo()>X</button>     
               
                <video width="100%" id="v1" style="height: -webkit-fill-available;" controls autoplay>
                </video>
               
        </div>

	<div class="centeralised">
	
	<div class="chathistory"></div>

	<div class="chatbox">
		
		<form action="" method="POST" enctype="multipart/form-data">
			
			<textarea class="txtarea" id="message" name="message"></textarea><br><br>
		Imagem:<input class="file-upload" id="file-input" type="file" name="image" onclick="myFunction2('.$id.')"/>
	<input type="submit" id="submit_post" name="submit" value="Post"/><br><br><br>
	
		</form>
		<form action="Upload.php" method="post" enctype="multipart/form-data">
		Video:<input class="file-upload" id="file-input" name="fileToUpload" type="file" accept="video/*">
		<input type="submit" id="submit_post" name="submit" value="Post">
		</form>
	</div>

	</div>


	<script>

		var valor = 0;

		$(document).ready(function(){
			loadChat();
		});
		
		$('#message').keyup(function(e){
			var message = $(this).val();
			if( e.which == 13 ){
				var urlval = getUrlVars()["idgrupo"];
				$.post('handlers/ajax.php?action=SendMessage&message='+message+'&idgrupo='+urlval, function(response){
					
					$('#message').val('');
				});
			}
		});
		function loadChat()
		{			
			$('.siglemessage').each(function() {
				valor = $(this).attr('id');
			});

			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=getChat&idgrupo='+urlval+'&ultimo='+valor, function(response){
				
				$('.chathistory').append(response);
			});
		}
		setInterval(function(){
			loadChat();
		}, 1000);


		function getUrlVars()
		{
    		var vars = [], hash;
    		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    		for(var i = 0; i < hashes.length; i++)
    		{
        		hash = hashes[i].split('=');
        		vars.push(hash[0]);
        		vars[hash[0]] = hash[1];
    		}
    		return vars;
		}

		function AddPersonBtn1()
		{
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=AdicionarPessoa&idgrupo='+urlval, function(response){
				
				$('.Adicionarppldiv').html(response);
			});
		}

		function Addpersonahref($id)
		{
			alert("fas");
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=AdicionarPersonahref&idpessoa='+$id+'&idgrupo='+urlval, function(response){
				
				$('.Adicionarppldiv').html(response);
			});
		}

		
		function VerVideo($video)
		{
			$("#v1").html('<source src="'+$video+'" class="test" type="video/mp4"></source>' );
			$("#AbrirVideo video")[0].load();
			$("#AbrirVideo").fadeToggle("3000");
		}


		function DivVideo()
		{		  
			$('#v1').get(0).pause();
    	$("#AbrirVideo").fadeToggle("3000");
		}
	</script>


	<?php
if (isset($_POST['submit'])) {
	if (getimagesize($_FILES['image']['tmp_name']) == false) {
		echo "failed";

	} else {
		$name = addslashes($_FILES['image']['name']);
		$image = base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
		saveimage($name, $image);
	}
}

function saveimage($name, $image)
{

	$con = mysqli_connect("localhost", "root", "", "phpteste");
	$sql = "insert INTO chat SET idQuemEnviou=17, message='$image', idGrupo=1, isimage=1";
	$query = mysqli_query($con, $sql);

	if ($query) {
		echo "sucess";
	} else {
		echo "n deu";
	}
	mysqli_close($con);

}

function AddPersonToGroup()
{
	echo "<p><button onclick='AddPersonBtn1()'> Adicionar pessoas ao grupo </button><p>";
}
?>

</body>
</html>