<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Mudar email";
$imagem= "imagens/usuario.png";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';


if(isset($_POST['confirmar']) && $_SESSION['login']==true && isset($_POST['text'])){
    $ver = executarSelect($con, "SELECT email FROM Usuario WHERE apelido='{$_POST['text']}'");
    if(empty($ver)){
    executarUpdate ($con, "UPDATE Usuario SET apelido='{$_POST['text']}' WHERE idUsuario={$_SESSION['log']}");
    header('location:MeuPerfil.php');
    }
}

$usuario= executarSelect($con, "SELECT * FROM usuario WHERE idUsuario={$_SESSION['log']}");
?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 20vw;">
        <h5 class="text-monospace" style="color:whitesmoke;"><strong>Mudar email</strong></h5>
        <hr>
        <div class="conteiner form-group p-2 border" style="width: 15vw;">
            <img src=<?= $usuario[0]['foto_usuario'] ?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $usuario[0]['apelido']?>
        </div>
        
            
        <div class="p-4 d-flex align-content-center" style="background-color: whitesmoke;">
            <form action="Apelido.php" method="POST" style="width: 20vw;">
                
                <div class="form-group col ">
                    <label for="text">Novo Apelido:</label>
                    <input type="text" class="form-control" name="text" id="text"  maxlength=20 requerid>
                </div>
                
                <button type='submit' class='btn bg-primary btn-outline-light' name="confirmar" value="1" style="margin-left: 78%;margin-top: 3vw;"><strong>Enviar</strong></button>
            </form>
            
                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
