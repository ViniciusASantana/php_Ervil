<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Criar Postagem";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';
date_default_timezone_set('America/Sao_Paulo');

if(isset($_POST['conteudo']) && isset($_POST['title'])){
    if($_SESSION['login']==true){
        $data = new DateTime();
        $data = $data->format('Y/m/d h:i:s');
        executarInsert($con, "INSERT INTO Postagem(usuario, idComunidade, conteudo, title, data_post) VALUES ({$_SESSION['log']},{$_SESSION['comID']},'{$_POST['conteudo']}','{$_POST['title']}','$data')");
    }
    header('location:IndexCom.php');
}
$comunidade= executarSelect($con, "SELECT * FROM Comunidade WHERE idComunidade={$_SESSION['comID']}");
?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 45vw;">
        <h5 class="text-monospace"><strong style="color: white;">Criar uma postagem</strong></h5>
        <hr>
        <div class="conteiner form-group p-2 border" style="width: 15vw;">
            <img src=<?= $comunidade[0]['foto_Comunidade']?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $comunidade[0]['nome']?>
        </div>
        
            
        <div class="p-4 d-flex align-content-center" style="background-color: whitesmoke;">
            <form action="Criar.php" method="POST">
                <div class="form-group col">
                    <input type="text" class="form-control" name="title" wrap="hard" maxlength="80" placeholder=" Maxímo de 80 caracteres" required>
                </div>
                
                <textarea name="conteudo" id="criar"  maxlength=400 wrap="hard" placeholder=" Conteúdo da postagem" required=""></textarea>
                <br><br>
                <button type='submit' class='btn bg-primary btn-outline-light' id="confirmar"><strong>Postar</strong></button>
            </form>

                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
