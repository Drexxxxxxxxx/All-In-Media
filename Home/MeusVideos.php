<?php
include_once '_header.php';
?>
		<div class="Adicionarppldiv"> </div>
		<?php 
	mydisplay();
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
</script>