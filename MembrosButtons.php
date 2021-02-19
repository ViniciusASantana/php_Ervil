<?php
if(!isset($_SESSION)){
    session_start();
}
include './_funcoesConfigBanco.php';
$con = conectarBanco();

$_SESSION['ButtonUserID']= $_POST['ButtonUserID'];
$_SESSION['Membros_button']= $_POST['Membros_button'];




switch ($_SESSION['Membros_button']){
    case 0: header('location:Reporte.php');break;
    case 1: {
        executarUpdate($con, "UPDATE Usuario_has_Comunidade SET cargo=cargo+1 WHERE usuario_idUsuario={$_SESSION['ButtonUserID']} AND comunidade_idComunidade={$_SESSION['comID']} AND cargo+1<3 OR usuario_idUsuario={$_SESSION['ButtonUserID']} AND comunidade_idComunidade={$_SESSION['comID']} AND cargo<{$_POST['suari']}"); 
        header('location:Membros.php');break;
    }
    case 2: {
        mysqli_query($con, "DELETE FROM Usuario_has_Comunidade WHERE usuario_idUsuario={$_SESSION['ButtonUserID']} AND comunidade_idComunidade={$_SESSION['comID']} AND cargo<3 AND usuario_idUsuario!={$_SESSION['log']}");
        $count = executarSelect($con, "SELECT COUNT(*) as usuario_idUsuario FROM Usuario_has_Comunidade WHERE comunidade_idComunidade = {$_SESSION['comID']} AND cargo>0");
        if($count[0]['usuario_idUsuario']==0){
        mysqli_query($con, "DELETE FROM Comunidade WHERE idComunidade={$_SESSION['comID']}");
        }
        $a = executarSelect($con, "SELECT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and usuario_idUsuario={$_SESSION['log']} AND cargo>0");
        if($a[0]['cargo']==3){
        $countD = executarSelect($con, "SELECT COUNT(*) as usuario_idUsuario FROM Usuario_has_Comunidade WHERE comunidade_idComunidade = {$_SESSION['comID']} AND cargo=3");
        if($countD[0]['usuario_idUsuario']==0 || empty($countD[0]['usuario_idUsuario'])){
            $novDono = executarSelect($con, "SELECT * FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and cargo>0 ORDER BY cargo DESC");
            if(!empty($novDono)){
                executarUpdate($con, "UPTADE Usuario_has_Comunidade SET cargo=3 WHERE usuario_idUsuario={$novDono[0]['usuario_idUsuario']} and comunidade_idComunidade = {$_SESSION['comID']}");
            }
        }
    }
        header('location:Membros.php');break;
        }
    case 3: {
        executarUpdate($con, "UPDATE Usuario_has_Comunidade SET cargo=cargo-1 WHERE usuario_idUsuario={$_SESSION['ButtonUserID']} AND comunidade_idComunidade={$_SESSION['comID']} AND cargo-1>0"); 
        header('location:Membros.php');break;
    }
}
?>