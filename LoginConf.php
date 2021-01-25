<?php
$titulo = "Login";

include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con   = conectarBanco();

$email = $_POST["email"];
$senha = $_POST["pass"];



$sql = "Select * FROM usuario WHERE email = '$email' and senha = '$senha'"; 
$result = executarSelect($con, $sql);
if($result > 0 )
{
header('location:index.php');
}


desconectarBanco($con);
?>
