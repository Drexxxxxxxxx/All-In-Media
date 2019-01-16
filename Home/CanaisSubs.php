<?php
include_once '_header.php';
?>
	<div>
			<a href="#" onclick="window.location = '../AdicionarConteudo/video.php';"><img src="images/add_button.png" id="fixedbutton"></a>
		</div>
		<div class="Adicionarppldiv"> </div>
		<?php 
	echo "<script>alert('test');</script>";
	SubChannelToDysplay();
	?>
	</body>
</html>
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
function UnSubToChannel(id)
{
	$.post('../Home/handlers/ajax.php?action=UnSubToChannel&id='+id, function(response){			
		location.replace("../Home/Home.php");
	});
}
</script>