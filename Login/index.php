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
<body onload="<?php BodyonLoadSessionRequire()?>">
	
<div id="result">
    <?php
    EAdminQuery();
    ?>
</div>

<div class="Adicionarppldiv"></div>

	<div class="centeralised">
	
	<div class="chathistory"></div>

	<div class="chatbox">
		
		<form action="" method="POST" enctype="multipart/form-data">
			
			<textarea class="txtarea" id="message" name="message"></textarea><br><br>
			<input class="file-upload" id="file-input" type="file" name="image" onclick="myFunction2('.$id.')"/>
	<input type="submit" id="submit_post" name="submit" value="Post"/>
		</form>

	</div>

	</div>




	<script>



		$(document).ready(function(){
			loadChat();
		});
		
		$('#message').keyup(function(e){
			var message = $(this).val();
			if( e.which == 13 ){
				var urlval = getUrlVars()["idgrupo"];
				$.post('handlers/ajax.php?action=SendMessage&message='+message+'&idgrupo='+urlval, function(response){
					
					loadChat();
					$('#message').val('');
				});
			}
		});
		function loadChat()
		{
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=getChat&idgrupo='+urlval, function(response){
				
				$('.chathistory').html(response);
			});
		}
		setInterval(function(){
			loadChat();
		}, 2000);


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

		function Addpersonahref()
		{
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=AdicionarPessoa&idgrupo='+urlval, function(response){
				
				$('.Adicionarppldiv').html(response);
			});
		}

		
	
	</script>


	<?php
		if(isset($_POST['submit'])){
			if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
				echo"failed";
				
			}
			else{
				$name=addslashes($_FILES['image']['name']);
				$image=base64_encode(file_get_contents(addslashes($_FILES['image']['tmp_name'])));
				saveimage($name,$image);
			}
			}
	
			function saveimage ($name, $image)
			{
		
			$con = mysqli_connect("localhost","root","", "phpteste");
			$sql="insert INTO chat SET idQuemEnviou=17, message='$image', idGrupo=1, isimage=1" ;
			$query=mysqli_query($con,$sql);
			echo $image;
			if($query){
			echo"sucess";
			}
			else {
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