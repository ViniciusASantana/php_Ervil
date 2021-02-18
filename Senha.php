<?php
if(!isset($_SESSION)){
    session_start();
}
$titulo = "Mudar senha";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';


if(isset($_POST['senha'])){
    $senha   = $_POST['senha'];
}
if(isset($_POST['versenha'])){
$versenha   = $_POST['versenha'];
}


if(isset($_POST['confirmar']) && $_SESSION['login']==true && isset($senha) && isset($versenha)){
    if($senha != $versenha){
        header('location:Senha.php');
    }else {
    executarUpdate ($con, "UPDATE Usuario SET senha='$senha' WHERE idUsuario={$_SESSION['log']}");
    header('location:MeuPerfil.php');
    }
}

$usuario= executarSelect($con, "SELECT * FROM usuario WHERE idUsuario={$_SESSION['log']}");
?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 15vw;">
        <h5 class="text-monospace" style="color:whitesmoke;"><strong>Mudar senha</strong></h5>
        <hr>
        <div class="conteiner form-group p-2 border" style="width: 10vw;">
            <img src=<?= $usuario[0]['foto_usuario'] ?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $usuario[0]['apelido']?>
        </div>
        
            
        <div class="p-4 d-flex" style="background-color: whitesmoke;">
            <form action="Senha.php" method="POST">
                <div class="form-group col ">
                    <label for="senha">Nova senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha"  maxlength=30 requerid><br>
                </div>
                
                <div class="form-group col ">
                    <label for="versenha">Confirme a senha:</label>
                    <input type="password" class="form-control" name="versenha" id="versenha"  maxlength=30 requerid>
                </div>
                
                <button type='submit' class='btn bg-primary btn-outline-light' name="confirmar" value="1" style="margin-left: 78%;margin-top: 3vw;"><strong>Enviar</strong></button>
            </form>
            
                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
