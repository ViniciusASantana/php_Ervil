<?php
$titulo = "Cadastrar";

include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con   = conectarBanco();

$name  = $_POST["name"];
$cat = $_POST["cat"];
$top = $_POST["top"];
$desc = $_POST["desc"];



$sql = "INSERT into comunidade (nome,categoria, descricao, topico ) VALUES ('$name',$cat,'$desc','$top')"; 
$flagRes = executarInsert($con, $sql);
$res= executarSelect($con, "SELECT idComunidade FROM Comunidade ORDER BY idComunidade DESC;");
$r= executarInsert($con, "INSERT INTO Usuario_has_Comunidade(usuario_idUsuario,comunidade_idComunidade,cargo) VALUES ({$_SESSION['log']},{$res[0]["idComunidade"]},3)");

if($flagRes){
    header("location:indexCom.php");
}
desconectarBanco($con);
?>