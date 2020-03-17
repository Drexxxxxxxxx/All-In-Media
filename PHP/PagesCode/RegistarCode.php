<?php
include("../Bd_Connection/bd_connection.php");

if(isset($_POST['submit'])){
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])) {
        JaexisteEmail($_POST['name'], $_POST['password'], $_POST['email']);
    }
}

function JaexisteEmail($name, $password, $email){
    $db2 = GetCategory();
    $query = $db2->prepare("SELECT * FROM users WHERE email = '".$email."'");
    $query->execute();
    $contador=0;
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    if (count($rs) == 0) {
        JaexisteName($name, $password, $email);
    }
    else {
       echo '<script>alert("Este Email Já existe")</script>';
    }
}
function JaexisteName($name, $password, $email){
    $db2 = GetCategory();
    $query = $db2->prepare("SELECT * FROM users WHERE name = '".$name."'");
    $query->execute();
    $contador=0;
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    if (count($rs) == 0) {
        Registarfunction($name, $password, $email);
    }
    else {
        echo '<script>alert("Este Nome Já existe")</script>';
    }
}

function Registarfunction($name, $password, $email)
{
    $namecode = hash("sha512", htmlspecialchars($name));


    $db2 = GetCategory();
    $query = $db2->prepare("insert INTO users (name, password, email, Ativo, LinkAtivo) VALUES ('".htmlspecialchars($name)."', '".hash("sha512", htmlspecialchars($password))."', '".htmlspecialchars($email)."', 0, '".$namecode."')");
    $query->execute();
    echo "<script>alert('Utilizdor criado')</script>";
    echo "<script>window.location = 'Login.php';</script>";
}
?>