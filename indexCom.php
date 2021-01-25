<?php
$titulo = "Comunidade";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

conectarBanco();

if(isset($_POST['comID'])){
    $_SESSION['comID'] = $_POST['comID'];
}
$all = executarSelect($con, "SELECT DISTINCT * FROM Comunidade where idComunidade={$_SESSION['comID']}");
$usuario = executarSelect($con, "SELECT DISTINCT cargo FROM Usuario_has_Comunidade where comunidade_idComunidade={$_SESSION['comID']} and cargo>0 and usuario_idUsuario=$log");
$postadoPor= Array("Vinicius","IFSP","XxxX");
$feedback= Array(3,2,4);
$totalCom = 3;
$TitPost = array ("blá bla bla","blá bla bla","blá bla bla");


desconectarBanco($con);
?>
<main class="container mt-5">
    
    <div class="corpo d-fle">
        <div class="d-flex rounded-lg" id='ferramentas'>
        <?php 
            if($usuario=2 && $all['categoria']=1 || $usuario=3 && $all['categoria']=1){
                echo "<a href='Pedidos.php'><img src='imagens/Pedidos.png' alt='Pedidos' class='border border-dark rounded-lg' width='30' height='30'/></a>";
            }
                    
        ?>
        <a class="pl-1"href="Membros.php"><img src='imagens/Membros.png' alt="Membros" class="border border-dark rounded-lg" width="30" height="30"/></a>
        </div>
        <ul class="list-group px-4 rounded-sm p-4">
            <?php
                for($e = 0; $e < $totalCom;$e++){
                    echo "<div class='d-flex'><li class='list-group-item feedback text-center'>"
                    . "<a href='#'><img src='imagens/Seta_Para_Cima.png' alt='Pedidos' class='' width='20' height='20'/></a>"
                    . "<a class='text-monospace text-muted mx-1'>$feedback[$e]</a>"
                    . "<a href='#'><img src='imagens/Seta_Para_Baixo.png' alt='Pedidos' class='' width='20' height='20'/></a>"
                    . "</li><li class='list-group-item Post'>"
                    . "<div class='mt-n2 Post'><strong>$TitPost[$e]</strong>"
                            . "<p><small class='text-muted'>Postado por $postadoPor[$e]</small>"
                    . "</div></div></li>";  
                }
            ?>
        </ul>
          
        <br>
    </div>
</main>
<?php
    include 'fragmentos/rodape.php';
?>