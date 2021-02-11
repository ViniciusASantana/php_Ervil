<?php
    
    include 'fragmentos/cabecalho.php';
    include 'fragmentos/menuResponsivo.php';
    $idUs = $_POST['Aceitar'];
    $idCom= $_POST['idCom'];
    $con = conectarBanco();
    $a= executarSelect($con, "SELECT * FROM Usuario_has_Comunidade WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom and cargo!=0");
    if($a>0){
        executarUpdate($con, "UPDATE Usuario_has_Comunidade SET cargo=1 WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom"); 
        executarUpdate($con, "UPDATE Comunidade SET num_partic=num_partic+1 WHERE idComunidade=$idCom"); 
        executarDelete($con, "DELETE FROM usuario_has_comunidade WHERE usuario_idUsuario=$idUs and comunidade_idComunidade=$idCom and cargo=0");
    }else 

    desconectarBanco($con);
    header('location:Pedidos.php');
?>