<?php
session_start();
function BodyonLoadSessionRequire()
{
    if ($_SESSION['id']) {
        echo $_SESSION['id'];
  //  document.getElementById("result").innerHTML = $_SESSION['id'];
    } else {
        header("Location:../Login/Login.php");
    }
}