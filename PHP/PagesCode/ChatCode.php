<?php
include("../Bd_Connection/bd_connection.php");

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
    $db2 = GetCategory();
    $query = $db2->prepare("insert INTO chat SET idQuemEnviou=17, message='$image', idGrupo= ".$_REQUEST['idgrupo']." , isimage=1");
    $query->execute();
    
    echo "<script type='text/javascript'>document.location.href='ReturnToLastPage.php';</script>";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=ReturnToLastPage.php">';
}

function AddPersonToGroup()
{
	echo "<p><button onclick='AddPersonBtn1()'> Adicionar pessoas ao grupo </button><p>";
}

function EAdminQuery()
{
    $db2 = GetCategory();
    $query = $db2->prepare("select * FROM pessoasdogrupo, grupo WHERE idpessoa = '".$_SESSION['id']."' and pessoasdogrupo.idgrupo = grupo.id AND idgrupo = '".$_REQUEST['idgrupo']."'");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        if($r->IsAdmin == 1)
        {
            AddPersonToGroup();
        }
    }
}
?>