<?php
if(!isset($_SESSION)){
            session_start();
}
include './_funcoesConfigBanco.php';
$con   = conectarBanco();

$email = $_POST["email"];
$senha = $_POST["pass"];
$result = executarSelect($con, "Select * FROM usuario WHERE email = '$email' and senha = '$senha'");
print_r($result);
if(count($result)>0)
{
$_SESSION['log']= $result[0]['idUsuario'];
$_SESSION['login']=  true;
$_SESSION['apelido']= $result[0]['apelido'];
header('location:index.php');
}else {
    header('location:Login.php');
}

desconectarBanco($con);
?>
