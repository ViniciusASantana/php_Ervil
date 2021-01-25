<?php
    header('location:Pedidos.php');
    include 'fragmentos/cabecalho.php';
    include 'fragmentos/menuResponsivo.php';
    $idUs = $_POST['Recusar'];
    $idCom= $_POST['idCom'];
    $con = conectarBanco();
    mysqli_query($con, "DELETE FROM Usuario_has_Comunidade WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom"); 
    
    desconectarBanco($con);
?>