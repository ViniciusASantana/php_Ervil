<?php
$titulo = "Comunidade";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

conectarBanco();

if(!empty($_POST['idPost'])){
    $_SESSION['idPost'] = $_POST['idPost'];
}

$post = executarSelect($con, "SELECT * FROM Postagem Where idPost={$_SESSION['idPost']}");
$user = executarSelect($con, "SELECT apelido,foto_usuario FROM Usuario,Postagem WHERE idUsuario={$post[0]['usuario']}");
$com = executarSelect($con, "select nome,foto_comunidade FROM Comunidade,Postagem WHERE {$post[0]['idComunidade']} = comunidade.idComunidade");
$count = executarSelect($con, "SELECT COUNT(*) as usuario_idUsuario FROM Usuario_has_Comunidade WHERE comunidade_idComunidade = {$_SESSION['comID']} AND cargo>0");
$all = executarSelect($con, "SELECT * FROM Comunidade where idComunidade={$_SESSION['comID']}");
$a = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and usuario_idUsuario={$_SESSION['log']}");
$data = new DateTime($post[0]['data_post']);

if(isset($_POST['Feedback'])){
    if(count($a)>0 && $_SESSION['login']==true ){
        $valor = $_POST['Feedback'];
        $idPost = $post[0]['idPost'];
        
        $dados = executarSelect($con, "SELECT * FROM feedback WHERE idPost=$idPost AND idUsuario={$_SESSION['log']}");
        
        if(empty($dados))
            executarInsert ($con, "INSERT INTO feedback(idPost,idUsuario,Usuario_valor) VALUES ($idPost,{$_SESSION['log']},$valor)");
        else{
            executarUpdate ($con, "UPDATE feedback SET Usuario_valor=Usuario_valor+$valor WHERE idPost=$idPost AND idUsuario={$_SESSION['log']} AND Usuario_valor+$valor<=1 AND Usuario_valor+$valor>=-1");
        }
        $soma = executarSelect($con, "SELECT SUM(Usuario_valor) as soma FROM feedback WHERE idPost=$idPost");
        executarUpdate($con, "UPDATE Postagem SET feedback={$soma[0]['soma']} WHERE idPost=$idPost"); 
        header('location:Postagem.php'); //Somente para "forçar" a atualização da página
    }
}
?>
<main class="container-fluid mt-5">
    
    <div class='media mx-auto' style="width: 60%;">
        <div class="mx-auto " style="width: 70%;background-color: white;">
            <div class="d-flex">
                <form class="text-center" action='Postagem.php' method='POST' name='Feedback' id='form'>
                    <button type='submit' name='Feedback' class='btn dropdown-item' value=1>
                        <img src='imagens/Seta_Para_Cima.png' alt='Pedidos' class='' width='15px' height='15px'/>
                    </button>
                    <a class='text-monospace text-muted mx-1'><?= $post[0]['feedback'] ?></a>
                    <button type='submit' name='Feedback' class='btn dropdown-item' value=-1>
                        <img src='imagens/Seta_Para_Baixo.png' alt='Pedidos' class='' width='15px' height='15px'/>
                    </button>
                </form>
                
                <form class="pt-3" action="indexCom.php" method="POST">
                    <button type="submit" class="btn" name="Com" style="margin: -20px;"><img src=<?= $com[0]['foto_comunidade'] ?> alt="Imagem da Comunidade" class="border border-dark rounded-circle" width="30rem" height="30rem"/>
                    <?= $com[0]['nome'] ?> </button>
                    
                    
                    <button type="submit" formaction="#.php" class="btn" name="user" style="margin: -20px;"><small class='text-muted '>Postado por <?= $user[0]['apelido'] ?> </small>
                    <img src=<?= $user[0]['foto_usuario'] ?> alt="Imagem do usuario" class="border border-dark rounded-circle" width="20rem" height="20rem"/>
                    </button>
                    
                    </form>
                
                <div class="pt-3 px-5 text-right" style="width: 100%;">
                    <small class='text-muted '><?= $data->format('d-m-Y H:i')?> </small>
                </div>
            </div>
                <div class="mx-2 mb-3 px-5" style="width: auto;">
                <strong><?= $post[0]['title'] ?></strong>
                <br><br>
                <?= $post[0]['conteudo'] ?>
                </div>
        </div>
        <div class="ml-4 p-4 media-body align-content-center border" style="width: 30%;">
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