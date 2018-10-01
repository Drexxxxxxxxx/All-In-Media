<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<?php
include_once 'main.php';
?>
<body onload="<?php BodyonLoadSessionRequire();?>">

<div id="result">
    <?php
    GruposChat();
    InvitesGrupo();
    ?>
</div>
<textarea class="txtarea" id="message" name="message"> <?php BodyonLoad() ?></textarea>

<script>
function AceitarPedido(id)
{
	$.post('handlers/ajax.php?action=AceitarPdd&id='+id, function(response){			
       location.replace("Home.php");
    });
}
</script>

<?php
function Addtodivgrupo($Nome, $link)
{
    echo "<p><a href='".$link."'>".$Nome."</a><p>";
}
?>

<?php
function Invites($Nome, $link)
{
    echo "<p><button onclick=AceitarPedido(".$link.")>".$Nome."</button><p>";
}
?>
</body>
</html>