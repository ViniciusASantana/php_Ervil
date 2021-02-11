<?php
    
    include 'fragmentos/cabecalho.php';
    include 'fragmentos/menuResponsivo.php';
    $idUs = $_POST['Recusar'];
    $idCom= $_POST['idCom'];
    $con = conectarBanco();
    executarDelete($con, "DELETE FROM usuario_has_comunidade WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom and cargo=0"); 
    desconectarBanco($con);
    header('location:Pedidos.php');
?>