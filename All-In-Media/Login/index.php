<?php
include_once '../Home/_header.php';
?>

		<div id="result">
			<?php
				if (!function_exists('EAdminQuery')) {
					EAdminQuery();

				}				
				?>
		</div>
		<div class="Adicionarppldiv" style="display: none;"></div>
		<div class="custompopup" id="AbrirVideo" runat="server" style="display:none;">
			<button type='button' style="padding: 0% 0%; position: fixed;
				top: 2.5%;
				right: 1.4%; z-index: 1" id="FecharvideoBtn" onclick=DivVideo()>X</button>     
			<video width="100%" id="v1" style="height: -webkit-fill-available;" controls autoplay>
			</video>
		</div>
		<nav class="navbar navbar-light bg-light justify-content-between nvb_perfil">
			<a class="navbar-brand" href="Home.php"><i class="fas fa-arrow-left"> </i> <input type="image" src="images/profile.jpeg" class="friend_ppic" alt=""> <p id="nomegrupoId" class="d-inline"></p></a>
			<form class="form-inline">
					<a class="nav-link " style="padding:10px" href="../../chatapp-master/chatapp/index.html?room=<?php echo $_REQUEST['idgrupo']."" ?>"><i class="fas fa-video"></i></a>
					<a class="nav-link " style="padding:10px" href="#"><i class="fas fa-phone"></i></a>
					<a class="nav-link " style="padding:10px" href="#"><i class="fas fa-ellipsis-v"></i></a>
			</form>
		</nav>
		<div class="centeralised">
			<div class="row" style="overflow:auto; max-height: 500px;" id="chathistory"></div>
			<div class="chatbox">
				<form action="" method="POST" id="FormUploadImage" enctype="multipart/form-data">
					<div class="row div_msg">
						<div class="col-lg-11 col-md-10 col-sm-10 col-9" >
							<?php
								include_once "teste.html";
							?>
						</div>
						<div class="col-lg-1 col-md-2 col-sm-2 col-3" >
							<div class="send_btn">
								<a href="" onclick="EnterText()"><input type="image" id="send_icon" src="../_Groups/images/send.png" alt=""></a>
							</div>
						</div>                                                             
					</div>

					<div class="upload-btn-wrapper">
						<button class="btn2">Upload Image</button>
						<input class="file-upload" id="file-uploadImage" type="file" name="image"/>
					</div>
					<input type="submit" id="submit_image" name="submit" value="Post" style="display:none;"/>
				</form>
				<form id="formUploadVideo" action="Upload.php<?php echo "?idgrupo=".$_REQUEST['idgrupo']."" ?>" method="post" enctype="multipart/form-data">
					<div class="upload-btn-wrapper">
						<button class="btn2">Upload Video</button>
						<input class="file-upload" id="file-uploadVideo" name="fileToUpload" type="file" accept="video/*">
					</div>
				</form>
			</div>
		</div>
	<script>
		document.getElementById("file-uploadVideo").onchange = function() {
			document.getElementById("formUploadVideo").submit();
		}

		document.getElementById("file-uploadImage").onchange = function() {
			$("#submit_image").click();
		}

		var valor = 0;
		$(document).ready(function(){
			//loadChat(1);
			ChatName();
		});
		function ChatName()
		{
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=ChatName&idgrupo='+urlval, function(response){
				$('#nomegrupoId').html(response);
			});
		}

		function EnterText(){
			var message = $('.emojionearea-editor').html();
			var urlval = getUrlVars()["idgrupo"];
			$.post('handlers/ajax.php?action=SendMessage&message='+message+'&idgrupo='+urlval, function(response){			
				$('.emojionearea-editor').html('');
			});
		}
		function loadChat(firsTime)
		{		
			var urlval = getUrlVars()["idgrupo"];

			valor = $('.eachclass').last().attr('id');
			
			$.post('handlers/ajax.php?action=getChat&idgrupo='+urlval+'&ultimo='+valor, function(response){
				$('#chathistory').append(response);
				valor = $('.eachclass').last().attr('id');

				if(response)
				{
					$.post('handlers/ajax.php?action=LastSeenMessage&idgrupo='+urlval+'&ultimo='+valor, function(response){	
					});
				}
			});			
		}
		var primeiravez = 0;
		setInterval(function(){
				loadChat(0);

				if(primeiravez == 0)
				{
					var urlval = getUrlVars()["idgrupo"];
					var LastRead = getUrlVars()["LastRead"];
					var element_to_scroll_to = document.getElementById(parseInt(LastRead));
					if(element_to_scroll_to != null)
					{
						primeiravez = 1;
						element_to_scroll_to.scrollIntoView();
					}	
					$.post('handlers/ajax.php?action=GetLastMessage&idgrupo='+urlval, function(response){
						var newurl = window.location.href;
    					window.history.pushState({path:newurl},'',newurl);
					});					
				}
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
				$('.Adicionarppldiv').toggle();
				$('.Adicionarppldiv').html(response);
			});
		}

		function Addpersonahref($id)
		{
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

	$con = mysqli_connect("localhost", "root", "", "all-in-media");
	$sql = "insert INTO chat SET idQuemEnviou=17, message='$image', idGrupo= ".$_REQUEST['idgrupo']." , isimage=1";
	$query = mysqli_query($con, $sql);

	if ($query) {
		echo "sucess";
	} else {
		echo "n deu";
	}
	mysqli_close($con);
	echo "<script type='text/javascript'>document.location.href='imageSenderRedirect.php';</script>";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=imageSenderRedirect.php">';
}

function AddPersonToGroup()
{
	echo "<p><button onclick='AddPersonBtn1()'> Adicionar pessoas ao grupo </button><p>";
}

function EAdminQuery()
{
    $con = mysqli_connect("localhost","root","", "all-in-media");
    $sql = "select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id AND idgrupo = '".$_REQUEST['idgrupo']."'";
    $query=mysqli_query($con,$sql);
    $num=mysqli_num_rows($query);
    for($i=0;$i<$num;$i++)
    {
        $result=mysqli_fetch_array($query);
        $img= $result['nome'];
        $idlogin = "index.php?idgrupo=".$result['idgrupo'];
        if($result['IsAdmin'] == 1)
        {
            AddPersonToGroup();
        }
    }
    mysqli_close($con);
}
?>

</body>
</html>