<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Criar Postagem";
$imagem= "imagens/logo1.jpg";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

if(isset($_POST['conteudo']) && isset($_POST['title'])){
    if($_SESSION['login']==true)
    executarInsert($con, "INSERT INTO Postagem(usuario_has_comunidade_usuario, usuario_has_comunidade_idComunidade, conteudo, title) VALUES ({$_SESSION['log']},{$_SESSION['comID']},'{$_POST['conteudo']}','{$_POST['title']}')");
}

$comunidade= executarSelect($con, "SELECT * FROM Comunidade WHERE idComunidade={$_SESSION['comID']}");
?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 45vw;">
        <h5 class="text-monospace"><strong style="color: white;">Criar uma postagem</strong></h5>
        <hr>
        <div class="conteiner form-group p-2 border" style="width: 15vw;">
            <img src=<?= $imagem?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $comunidade[0]['nome']?>
        </div>
        
            
        <div class="p-4 d-flex align-content-center" style="background-color: whitesmoke;">
            <form action="Criar.php" method="POST">
                <div class="form-group col">
                <input type="text" class="form-control" name="title" placeholder=" Título">
                </div>
                
                <textarea name="conteudo" id="criar"  maxlength=400 placeholder=" Texto">

                </textarea>
                <br><br>
                <button type='submit' class='btn bg-primary btn-outline-light' id="confirmar"><strong>Postar</strong></button>
            </form>

                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
