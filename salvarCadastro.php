<?php

$titulo = "Cadastrar";

include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con   = conectarBanco();

$apelido  = $_POST["apelido"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$passConf = $_POST["passConf"];


$sql = "INSERT into usuario (apelido, email, senha) VALUES ('$apelido', '$email', '$senha') "; 
$flagRes = executarInsert($con, $sql);

if($flagRes){
    header('location:index.php');
} else{
    $msg = "Houve um erro ao se cadastrar!";
}
desconectarBanco($con);
?>
