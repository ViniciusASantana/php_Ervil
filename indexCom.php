<?php
$titulo = "Comunidade";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

conectarBanco();

if(isset($_POST['comID'])){
    $_SESSION['comID'] = $_POST['comID'];
}

if(isset($_POST['Visual'])){
    $_SESSION['comID'] = $_POST['Visual'];
}

if(isset($_POST['Feedback'])){
    executarUpdate($con, "UPDATE Postagem SET feedback=feedback+{$_POST['Feedback']} WHERE usuario={$_POST['userPost']}");
}

if(isset($_POST['deixarCom'])){
    mysqli_query($con, "DELETE FROM Usuario_has_Comunidade WHERE usuario_idUsuario={$_SESSION['log']} AND comunidade_idComunidade={$_SESSION['comID']}");
    header('location:Comunidades.php');
}


$post = executarSelect($con, "SELECT * FROM Postagem WHERE idComunidade={$_SESSION['comID']}");
$all = executarSelect($con, "SELECT DISTINCT * FROM Comunidade where idComunidade={$_SESSION['comID']}");

$a = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and usuario_idUsuario={$_SESSION['log']}");

$usuario = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and cargo>0 and usuario_idUsuario={$_SESSION['log']}");
?>
<main class="container-fluid mt-5">
    <div class='media' style="width: 100%;">
        <div class="mx-auto" style="width: 80%;">

            <div class="d-flex conteiner-sm form-group p-2 border">
                <?php 
                    if($usuario=2 && $all[0]['categoria']==1 || $usuario=3 && $all[0]['categoria']==1){

                        echo "<form action='Pedidos.php' method='POST'>"
                        . "<button type='submit' class='btn '>"
                                . "<img src='imagens/Pedidos.png' alt='Pedidos' class='border border-dark rounded-lg' width='30' height='30'/>"
                                . " Pedidos"
                        . "</button>"
                        . "</form>";
                    }

                ?>
                <form action='Membros.php' method='POST'>
                    <button type="submit" class="btn">
                        <img src='imagens/Membros.png' alt="Membros" class="border border-dark rounded-lg" width="30" height="30"/>
                        Membros
                    </button>
                </form>    
            </div>
            
            
            <ul class="list-group rounded-sm" style="width:100%;">
                    <?php
                        for($e = 0; $e < count($post);$e++){
                            $userPost = $post[$e];
                            $Postado = executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario={$userPost['usuario']}");
                            echo "<div class='media'>"
                            . "<li class='list-group-item text-center' style='height: 6vw;background-color: whitesmoke;'>"
                                . "<form action='indexCom.php' method='POST' name='Feedback' id='form'>"
                                        . "<button type='submit' name='Feedback' class='btn dropdown-item' value=1>"
                                                . "<img src='imagens/Seta_Para_Cima.png' alt='Pedidos' class='' width='20px' height='20px'/>"
                                        . "</button>"
                                        . "<a class='text-monospace text-muted mx-1'>{$userPost['feedback']}</a>"
                                        . "<button type='submit' name='Feedback' class='btn dropdown-item' value=-1>"
                                            . "<img src='imagens/Seta_Para_Baixo.png' alt='Pedidos' class='' width='20px' height='20px'/>"
                                        . "</button>"
                                        . "<input type='hidden' name='userPost' value='{$userPost['usuario']}'>"
                                . "</form>"
                            . "</li>"
                            . "<li class='list-group-item text-left border' style='height: 6vw;width:100%;'>";
                            echo "<div class='mt-n2 Post' style='width: 45vw;'>"
                                    . "<strong>{$userPost['title']}</strong>"
                                    . "<p><small class='text-muted'>Postado por {$Postado[0]['apelido']}</small>"
                            . "</div></div></li>";  
                        }
                    ?>
                </ul>
            
            <br>
        </div>
        <div class="ml-4 p-4 media-body align-content-center border">
            <strong>Sobre a Comunidade</strong>
            <br><br>
            <?php if(!empty($all[0]['descricao'])){
                echo $all[0]['descricao'];
            }
            ?>
            <div class="mt-3">
                <?= $all[0]['num_partic'] ?>
                <br>
                <small>Participantes</small>
            </div>
            <?php
            if(count($a)>0 && $_SESSION['login']==true ){
            ?>
                <hr>
                <form action="Criar.php" method="POST">
                    <button type="submit" class="btn btn-primary btn-outline-light" style="border-radius: 2vw; width: 100%;">
                        <strong>Criar Postagem</strong>
                    </button>
                </form>
                <form action="indexCom.php" method="POST">
                    <button type="submit" class="btn btn-danger btn-outline-light" name='deixarCom' value="deixar" style="border-radius: 2vw; width: 100%;">
                        <strong>Deixar Comunidade</strong>
                    </button>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</main>
<?php
    desconectarBanco($con);
    include 'fragmentos/rodape.php';
?>