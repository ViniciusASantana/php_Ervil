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

if(isset($_POST['deixarCom'])){
    mysqli_query($con, "DELETE FROM Usuario_has_Comunidade WHERE usuario_idUsuario={$_SESSION['log']} AND comunidade_idComunidade={$_SESSION['comID']}");
    header('location:Comunidades.php');
}
$post = executarSelect($con, "SELECT * FROM Postagem WHERE idComunidade={$_SESSION['comID']} ORDER BY data_post DESC");

if(isset($_POST['populares'])){
    $post = executarSelect($con, "SELECT * FROM Postagem WHERE idComunidade={$_SESSION['comID']} ORDER BY feedback DESC");
}

$all = executarSelect($con, "SELECT * FROM Comunidade where idComunidade={$_SESSION['comID']}");
$count = executarSelect($con, "SELECT COUNT(*) as usuario_idUsuario FROM Usuario_has_Comunidade WHERE comunidade_idComunidade = {$_SESSION['comID']} AND cargo>0");

$a = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and usuario_idUsuario={$_SESSION['log']}");
if(isset($_POST['Feedback'])){
    if(count($a)>0 && $_SESSION['login']==true ){
        $valor = $_POST['Feedback'];
        $idPost = $_POST['idPost'];
        
        $dados = executarSelect($con, "SELECT * FROM feedback WHERE idPost=$idPost AND idUsuario={$_SESSION['log']}");
        
        if(empty($dados))
            executarInsert ($con, "INSERT INTO feedback(idPost,idUsuario,Usuario_valor) VALUES ($idPost,{$_SESSION['log']},$valor)");
        else{
            executarUpdate ($con, "UPDATE feedback SET Usuario_valor=Usuario_valor+$valor WHERE idPost=$idPost AND idUsuario={$_SESSION['log']} AND Usuario_valor+$valor<=1 AND Usuario_valor+$valor>=-1");
        }
        $soma = executarSelect($con, "SELECT SUM(Usuario_valor) as soma FROM feedback WHERE idPost=$idPost");
        executarUpdate($con, "UPDATE Postagem SET feedback={$soma[0]['soma']} WHERE idPost=$idPost"); 
        header('location:IndexCom.php'); //Somente para "forçar" a atualização da página
    }
}
$usuario = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and cargo>0 and usuario_idUsuario={$_SESSION['log']}");
?>
<main class="container-fluid">
    <div class="row" style="margin-top: -25px;background-color: blue;height: 8vh;">
    </div>
    <div class="mb-4 row" style="height: 7vh;background-color: whitesmoke;">
        <div class="ml-5 d-flex ">
            <div class=" align-items-center" style="margin-top: -2vh;">
            <img src=<?= $all[0]['foto_Comunidade'] ?> alt="Imagem da Comunidade" class="border border-light rounded-circle" width="80rem" height="80rem" style="border-width: 250px;"/>
            </div>
        <span class="ml-3 mt-2" ><h4 class="font-weight-bold"><?= $all[0]['nome'] ?></h4></span>
        </div>
        </div>
    
    <div class='media' style="width: 100%;">
        <div class="mx-auto" style="width: 80%;">
            <div class="d-flex conteiner-sm form-group p-2 border">
                <form action="indexCom.php" method="POST" class="ml-1" style="width: 50%;">
                    <input type="submit" value="Recentes" name="recentes" class="btn btn-outline-primary"/>
                    <input type="submit" value="Populares" name="populares" class="btn btn-outline-primary"/>
                </form>
                <?php 
                    if(count($a)>0 && $_SESSION['login']==true && $usuario[0]['cargo']==2 && $all[0]['categoria']==1 || count($a)>0 && $_SESSION['login']==true && $usuario[0]['cargo']==3 && $all[0]['categoria']==1){

                        echo "<div style='width: 37.2%;'><form action='Pedidos.php' method='POST' class='text-right'>"
                        . "<button type='submit' class='btn'>"
                                . "<img src='imagens/Pedidos.png' alt='Pedidos' class='border border-dark rounded-lg' width='30' height='30'/>"
                                . " Pedidos"
                        . "</button>"
                        . "</form></div>"
                        . "<form action='Membros.php' method='POST' class='text-right'>"
                        . "<button type='submit' class='btn'>"
                        . "<img src='imagens/Membros.png' alt='Membros' class='border border-dark rounded-lg' width='30' height='30'/>"
                        . " Membros</button></form>";
                        if($usuario[0]['cargo']==3){
                            echo "<form action='settingCom.php' method='POST'>"
                        . "<button type='submit' class='btn'>"
                                . "<img src='imagens/settings.png' alt='Configurações' class='border border-dark rounded-lg' width='30' height='30'/>"
                        . "</button>"
                        . "</form>";
                        }
                    }else{
                        echo "<div style='margin-left: 60vh;'>";
                        
                ?>
                
                <form action='Membros.php' method='POST'>
                    <button type="submit" class="btn">
                        <img src='imagens/Membros.png' alt="Membros" class="border border-dark rounded-lg" width="30" height="30"/>
                        Membros
                    </button>
                </form>
                <?php 
                echo '</div>';
                if(count($a)>0 && $_SESSION['login']==true && $usuario[0]['cargo']==3){
                    echo "<form action='settingCom.php' method='POST'>"
                    . "<button type='submit' class='btn'>"
                        . "<img src='imagens/settings.png' alt='Configurações' class='border border-dark rounded-lg' width='30' height='30'/>"
                    . "</button>"
                    . "</form>";
                    }
                }
                ?>
            </div>
            
            
            <ul class="list-group rounded-sm" style="width:100%;display: table;">
                    <?php
                        for($e = 0; $e < count($post);$e++){
                            $userPost = $post[$e];
                            $Postado = executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario={$userPost['usuario']}");
                            $feedback = executarSelect($con, "SELECT * FROM feedback WHERE idPost={$userPost['idPost']}");
                            echo "<div class='media'>"
                            . "<li class='list-group-item text-center' style='display: table-cell;height: 6vw;background-color: whitesmoke;'>"
                                . "<form action='indexCom.php' method='POST' name='Feedback' id='form'>"
                                        . "<button type='submit' name='Feedback' class='btn dropdown-item' value=1>"
                                                . "<img src='imagens/Seta_Para_Cima.png' alt='Pedidos' class='' width='20px' height='20px'/>"
                                        . "</button>"
                                        . "<a class='text-monospace text-muted mx-1'>{$userPost['feedback']}</a>"
                                        . "<button type='submit' name='Feedback' class='btn dropdown-item' value=-1>"
                                            . "<img src='imagens/Seta_Para_Baixo.png' alt='Pedidos' class='' width='20px' height='20px'/>"
                                        . "</button>"
                                        . "<input type='hidden' name='idPost' value='{$userPost['idPost']}'>"
                                . "</form>"
                            . "</li>"
                            . "<li class='list-group-item text-left border' style='height: 6vw;width:100%;'>";
                            echo "<form action='Postagem.php' method='POST' name='Postagem' id='form' style='width: 45vw;'>"
                                    . "<input class='btn font-weight-bold' href='Postagem.php' type='submit' name='title' id='title' Value='{$userPost['title']}'/>"
                                    . "<input type='hidden' value='{$userPost['idPost']}' name='idPost'>"
                                    . "<div class='mt-4'>"
                                    . "<p><small class='text-muted '>Postado por "
                                    . "<img src={$Postado[0]['foto_usuario']} alt='Configurações' class='rounded-circle' width='20' height='20'/>"
                                    . " {$Postado[0]['apelido']}</small></div>"
                            . "</div></form></li>"; 
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
                <?= $count[0]['usuario_idUsuario'] ?>
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