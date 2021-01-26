<?php
    header('location:Pedidos.php');
    include 'fragmentos/cabecalho.php';
    include 'fragmentos/menuResponsivo.php';
    $idUs = $_POST['Aceitar'];
    $idCom= $_POST['idCom'];
    $con = conectarBanco();
    $a= executarSelect($con, "SELECT * FROM Usuario_has_Comunidade WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom and cargo=0");
    if($a<1){
        executarUpdate($con, "UPDATE Usuario_has_Comunidade SET cargo=1 WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom"); 
        executarUpdate($con, "UPDATE Comunidade SET num_partic=num_partic+1 WHERE idComunidade=$idCom"); 
    }else 

    desconectarBanco($con);
?>