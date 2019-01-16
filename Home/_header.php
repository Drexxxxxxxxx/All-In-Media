<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>HomePage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="../Home/stylesheets/css_index.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script
			src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous"></script>
			<link rel="stylesheet" type="text/css" media="screen" href="stylesheet/style.css" />

	</head>
	<?php
include_once 'main.php';
?>
	<body onload="<?php BodyonLoadSessionRequire(); ?>">
        <header>
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<a class="navbar-brand" href="../Home/home.php">
					<input type="image" class="logo" src="../Home/images/Logo2.png" alt="">
					</a>
					<button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon" style="color:black"></span>
					</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<div class="mx-auto d-block text-center" style="width:80%">
							<input type="search" name="" placeholder="Search whateaver you want..." id="searchInput">
						</div>
						<div class="sidenav_2">
							<nav class="nav justify-content-center">
								<div class="col-xs-6 col-sm-6" style="padding:15px">
									<a class="nav-link hrefs" href="#">Trending</a>
								</div>
								<div class="col-xs-6 col-sm-6" style="padding:15px">
									<a class="nav-link hrefs" href="#">Canais Subs</a>
								</div >
								<div class="col-xs-6 col-sm-6" style="padding:15px">     
									<a class="nav-link hrefs" href="#">Favoritos</a>
								</div>
								<div class="col-xs-6 col-sm-6" style="padding:15px">
									<a class="nav-link hrefs" href="#">Meus Videos</a>
								</div>
							</nav>
						</div>
						<ul class="navbar-nav ml-auto">
							<nav class="nav justify-content-center">
								<a class="nav-link icns" style="padding:10px"  href="#"><i class="fas fa-search"></i></a>
								<a class="nav-link icns" style="padding:10px" href="#"><i class="fas fa-cog"></i></a>
								<a class="nav-link icns" style="padding:10px" onclick="" data-toggle="dropdown"><i class="fas fa-user"></i></a>
								<div class="dropdown-menu" style="left: auto;">
								<div id="Perfil">
									<?php
        Perfil();
        ?>
								</div>
									<h4>Chats:</h4>  
									<div id="result">
										<?php
            GruposChat();
            InvitesGrupo();
            ?>
									</div>
									<h4>Adicionar Amigo:</h4>  
									<input type="text" id="AddFriendID">
									<button onclick="AddFriend($('#AddFriendID').val())">Adicionar</button>

									<h4>Pedidos de amizade:</h4>  
									<div id="resultPedidos">
										<?php
            PedidosAmizade();
            ?>
									</div>
								</div>
							</nav>
						</ul>
						</ul>
					</div>
				</div>
			</nav>
			<div id="sidenav" >
				<div id="sidenav_menu">
					<nav class="nav justify-content-center sidenav">
						<a class="nav-link" href="../Home/Trending.php">Trending</a>
						<a class="nav-link" href="../Home/CanaisSubs.php">Canais Subs</a>
						<a class="nav-link" href="../Home/Favorites.php">Favoritos</a>
						<a class="nav-link" href="../Home/MeusVideos.php">Meus Videos</a>
					</nav>
				</div>
			</div>
        </header>
		<div>
			<a href="#" onclick="window.location = '../AdicionarConteudo/video.php';"><img src="../Home/images/add_button.png" id="fixedbutton"></a>
		</div>
        <script>
			function updateLike(ola) {
			
				$.post('../Home/handlers/ajax.php?action=LikeUpdate&ola='+ola, function(response){
					
					$('.Adicionarppldiv').html(response);
				});
			}
			
			  function updateDislike(ola) {
			
			$.post('../Home/handlers/ajax.php?action=DislikeUpdate&ola='+ola, function(response){
			 
			 $('.Adicionarppldiv').html(response);
			});
			}
			
			function myFunction(ola) {
			
			$.post('../Home/handlers/ajax.php?action=Like&ola='+ola, function(response){
			 
			 $('.Adicionarppldiv').html(response);
			});
			}
			
			function myFunction2(ola) {
			
			$.post('../Home/handlers/ajax.php?action=Dislike&ola='+ola, function(response){
			 
			 $('.Adicionarppldiv').html(response);
			});
			}
			
			//Messages script
			function AceitarPedido(id)
			{
				$.post('../Home/handlers/ajax.php?action=AceitarPdd&id='+id, function(response){			
				location.replace("../Home/Home.php");
				});
			}

			function RecusarPedido(id)
			{
				$.post('../Home/handlers/ajax.php?action=RecusarPdd&id='+id, function(response){			
				location.replace("../Home/Home.php");
				});
			}

			function AddFriend(nome)
			{
				$.post('../Home/handlers/ajax.php?action=AddFriend&nome='+nome, function(response){	
					alert(response);		
				});
			}

			//Pedidos amizades script
			function AceitarAmizade(id)
			{
				$.post('../Home/handlers/ajax.php?action=AceitarAmizade&id='+id, function(response){			
				location.replace("../Home/Home.php");
				});
			}
			function RecusarAmizade(id)
			{
				$.post('../Home/handlers/ajax.php?action=RecusarAmizade&id='+id, function(response){	
					alert(response);		
				});
			}
		</script>
		<?php
		echo"<div style='background-color: lightgray;'>";
		GruposChatiframe();
		echo"</div>";
		?>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="../Home/script.js"></script>