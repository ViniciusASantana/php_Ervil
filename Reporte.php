<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Criar Postagem";
$imagem= "imagens/usuario.png";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$_SESSION['ButtonUserID'];


if(isset($_POST['motivo']) && isset($_SESSION['ButtonUserID'])){
    if($_SESSION['login']==true)
    executarInsert($con, "INSERT INTO ReporteUsuario(usuario,motivo) VALUES ({$_SESSION['ButtonUserID']},'{$_POST['motivo']}')");
}

$usuario= executarSelect($con, "SELECT * FROM usuario WHERE idUsuario={$_SESSION['ButtonUserID']}");
?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 45vw;">
        <h5 class="text-monospace"><strong>Reportar</strong></h5>
        <hr>
        <div class="conteiner form-group p-2 border" style="width: 15vw;">
            <img src=<?= $imagem?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $usuario[0]['apelido']?>
        </div>
        
            
        <div class="p-4 d-flex align-content-center" style="background-color: whitesmoke;">
            <form action="Reporte.php" method="POST">
                
                
                <textarea name="motivo" id="criar"  maxlength=120 placeholder=" Motivo">

                </textarea>
                <br><br>
                <button type='submit' class='btn bg-primary btn-outline-light' name="confirmar" value="1" id="confirmar"><strong>Enviar</strong></button>
            </form>

                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
