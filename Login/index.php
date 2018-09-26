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
	

	<div class="centeralised">
	
	<div class="chathistory"></div>

	<div class="chatbox">
		
		<form action="" method="POST">
			
			<textarea class="txtarea" id="message" name="message"></textarea>

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
	</script>


</body>
</html>