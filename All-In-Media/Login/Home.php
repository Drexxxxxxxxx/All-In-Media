<?php
include_once '../Home/_header.php';
?>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">All In Messenger</a>
        <form class="form-inline">
        <input type="text" class="form-control" placeholder="Search..." onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" onchange="SearchChatGroup($('#SearchChatGroupInputID').val());" id="SearchChatGroupInputID">

            <a class="nav-link " style="padding:10px" href="#"><i class="fas fa-ellipsis-v"></i></a>
        </form>
    </nav>
    <br>
    <div id="divGrupoChatMenu">
    <?php
        GruposChatMenu();
    ?>
    </div>
	<script>      
		function AceitarPedido(id)
		{
			$.post('handlers/ajax.php?action=AceitarPdd&id='+id, function(response){			
		       location.replace("Home.php");
		    });
        }
        
        function SearchChatGroup(texto)
        {
            $.post('../Home/handlers/ajax.php?action=SearchChatGroup&texto='+texto, function(response){	
                $("#divGrupoChatMenu").html(response);		
            });
        }
	</script>
</body>
</html>