<?php
$titulo = "Cadastrar";

include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con   = conectarBanco();

$name  = $_POST["name"];
$cat = $_POST["cat"];
$top = $_POST["top"];
$desc = $_POST["desc"];


$hora = date("Ymd_His_");
$nomeFotoOriginal = $_FILES["foto_comunidade"]["name"];
$nomeFotoTemp = $_FILES['foto_comunidade']['tmp_name'];
$nomeFotoRenomeada = $hora. $nomeFotoOriginal;
move_uploaded_file($nomeFotoTemp, "uploadComunidade/$nomeFotoRenomeada");


$sql = "INSERT into comunidade (nome,categoria, descricao, topico,foto_Comunidade ) VALUES ('$name',$cat,'$desc','$top','uploadComunidade/$nomeFotoRenomeada')"; 
$flagRes = executarInsert($con, $sql);
$res= executarSelect($con, "SELECT idComunidade FROM Comunidade ORDER BY idComunidade DESC;");
$r= executarInsert($con, "INSERT INTO Usuario_has_Comunidade(usuario_idUsuario,comunidade_idComunidade,cargo) VALUES ({$_SESSION['log']},{$res[0]["idComunidade"]},3)");

    
    

if($flagRes){
    header('location:Index.php');
}else {
    header('location:ComuniCriacao.php');
}
desconectarBanco($con);
?>