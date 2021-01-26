
<?php
$titulo = "Comunidades";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';


$con= conectarBanco();
$dados= executarSelect($con, "SELECT * FROM comunidade");

if(isset($_POST['Participar'])){
    $_SESSION['idCom'] = $_POST['Participar'];
}else $_SESSION['idCom'] = "";
if(isset($_POST['categoria'])){
    $_SESSION['categoria'] = $_POST['categoria'];
}else $_SESSION['categoria'] = "";



$ver = executarSelect($con, "SELECT DISTINCT * FROM Usuario_has_Comunidade,Comunidade where usuario_idUsuario={$_SESSION['log']} and comunidade_idComunidade={$_SESSION['idCom']}");
    if($ver!=1){
        print_r($_SESSION['categoria']);
        switch ($_SESSION['categoria']){
            case 0: {executarInsert($con, "INSERT INTO Usuario_has_Comunidade(usuario_idUsuario,comunidade_idComunidade,cargo) VALUES ({$_SESSION['log']},{$_SESSION['idCom']},1)");
            unset ($_SESSION['categoria']);break;}
            case 1: {executarInsert($con, "INSERT INTO Usuario_has_Comunidade(usuario_idUsuario,comunidade_idComunidade) VALUES ({$_SESSION['log']},{$_SESSION['idCom']})");
            unset ($_SESSION['categoria']);break;}
        }
        
         
    
    }



?>

<main class="container mt-5">
        <div class="corpo">
            <h2><strong>Comunidades</strong></h2>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input -->   
        <ul class="list-group px-4">
            <?php
                for($e = 0; $e < count($dados);$e++){
                    $com=$dados[$e];
                    $a=executarSelect($con, "SELECT * FROM Usuario_has_Comunidade where usuario_idUsuario={$_SESSION['log']} and comunidade_idComunidade={$com['idComunidade']}");
                    if(empty($a)){
                        echo "<li class='list-group-item heigthCom p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                    . "<a class='px-5'><img src='imagens/logo1.jpg' alt='Imagem de Perfil' class='border border-dark rounded-circle' width='120px' height='120px'/></a>"
                    . "<div class='form-group col'>"
                            . "<h5>{$com["nome"]}";
                    if($com["categoria"]==1){
                            echo "<small class='rounded-sm bg-info priv'>Particular</small>";
                        }else echo "<small class='rounded-sm bg-info priv'>Pública</small>";
                        echo "</h5>";
                        if($com["topico"]!=null)    echo "<p><small class='btn-danger rounded-pill px-2 topicos'>{$com["topico"]}</small>";
                        if($com["num_partic"]!=null)    echo "<small class='pl-3'>{$com["num_partic"]} Participantes</small>";
                        if($com["descricao"]!=null)    echo "<p><textarea class='descricao'> {$com["descricao"]}</textarea>";
                    echo "</div>"
                    . "<form action='Comunidades.php' method='POST' class='pr-5'>"
                    . "<br><br><br><br><button type='submit' class='btn btn-info partic' name='Participar' value='{$com['idComunidade']}'>Participar</button></div>"
                    . "<input type='hidden' name='categoria' value='{$com['categoria']}'>" 
                    . "</form>"
                    . "</li>";  
                    }
                    
                }
            ?>
        </ul>
        </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
    desconectarBanco($con);
?>