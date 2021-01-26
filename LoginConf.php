<?php
if(!isset($_SESSION)){
            session_start();
}
include './_funcoesConfigBanco.php';
$con   = conectarBanco();

$email = $_POST["email"];
$senha = $_POST["pass"];



$sql = "Select * FROM usuario WHERE email = '$email' and senha = '$senha'"; 
$result = executarSelect($con, $sql);
if($result > 0 )
{
$_SESSION['log']= $result[0]['idUsuario'];
$_SESSION['login']=  true;
header('location:index.php');
}


desconectarBanco($con);
?>
