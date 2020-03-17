<?php
include("../Bd_Connection/bd_connection.php");
include_once("../PagesCode/LoginCode.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "RecoverPassword":

        $query = $db->prepare("SELECT * FROM users WHERE email = '".$_REQUEST['email']."'");
        $query->execute();
        $rs = $query->fetchAll(PDO::FETCH_OBJ);
        $contador = 0;
        foreach ($rs as $r) {
            echo '<script>window.alert("Enviamos a password para o seu email")</script>';
            $contador = 1;
        }
        if($contador == 0)
        {
            echo '<script>window.alert("Email Incorreto")</script>';
        }
		break;
    }
}
