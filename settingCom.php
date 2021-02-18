<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Configurações";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$_SESSION['comID'];
$com = executarSelect($con, "SELECT * FROM Comunidade where idComunidade={$_SESSION['comID']}");

if(isset($_POST['Enviar'])){
    if($_POST['top']!=null){
        executarUpdate($con, "UPDATE Comunidade SET topico='{$_POST['top']}' WHERE idComunidade={$_SESSION['comID']}");
    }
    
    if($_POST['desc']!=null){
        executarUpdate($con, "UPDATE Comunidade SET descricao='{$_POST['desc']}' WHERE idComunidade={$_SESSION['comID']}");
    }
    
    if(isset($_FILES['foto_Comunidade'])){
        $hora = date("Ymd_His_");
        $nomeFotoOriginal = $_FILES["foto_Comunidade"]["name"];
        $nomeFotoTemp = $_FILES['foto_Comunidade']['tmp_name'];
        $nomeFotoRenomeada = $hora. $nomeFotoOriginal;
        move_uploaded_file($nomeFotoTemp, "uploadComunidade/$nomeFotoRenomeada");

        executarUpdate($con, "UPDATE Comunidade SET foto_Comunidade='uploadComunidade/$nomeFotoRenomeada' WHERE idComunidade={$_SESSION['comID']}");
    }
   
    header('location:indexCom.php');
}
?>

<main class="container mt-5">
    <div class="" style="padding: 20px;background-color: white;border-radius: 5px;">
        <h2><strong>Configurações</strong></h2>
        <br> 
        <div class="d-flex">
            <div class="p-3 rounded-sm " style="width: auto;height: auto;">
                <div class="text-center">
                <img src=<?= $com[0]['foto_Comunidade'] ?> alt="Imagem de Perfil" class="border border-dark rounded-lg" width="250rem" height="250rem"/>
                </div>
                <form action="settingCom.php" method="POST" enctype="multipart/form-data" id="Foto">
                    <input name='foto_Comunidade' id="foto_Comunidade" class="p-2" type="file" action="settingCom.php" method="POST" required>
                    <button type="submit" class="btn btn-primary" name="Enviar" value="Enviar"  >Enviar Foto</button>
                </form>
            </div>
            <div class="mx-auto" style="width: 100%;">
                <form action="settingCom.php" method="POST">
                    
                    <div class="form-group">
                        <label for="desc">Descrição:</label><br>
                        <textarea name="desc" id="desc" rows="5" cols=50 maxlength="80" placeholder="Maxímo de 80 caracteres" style="width: 100%;"></textarea>
                    </div>
                    <br>
                    
                    <div class="form-group  ">
                        <label for="top">Tópicos:</label>
                        <input type="text" class="form-control" id="top" name="top" maxlength="15">    
                    </div>
                    
                    <br>
                    <div style="text-align: right;">
                        <button type="submit" class="btn btn-info px-3" name="Enviar" id="Enviar" >Enviar formulário</button>
                    </div>
                </form>
            </div>
        </div>
        
        
        </div>
    
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>