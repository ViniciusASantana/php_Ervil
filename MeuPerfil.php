<?php
$titulo = "Login";
$perfil = "imagens/OIP.jpg";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con= conectarBanco();
$dados= executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario=$log");
desconectarBanco($con);
?>
<main class="container mt-5">
    <div class="corpo">
        <h2><strong>Meu Perfil</strong></h2>
        <br>
        <div class="menu p-4 rounded-sm" >
            <img src=<?= $perfil ?> alt="Imagem de Perfil" class="border border-dark rounded-lg" width="25%" height="250"/>
            <div class="form-group col">
                Apelido:
                <div class="conteiner-sm form-group p-2 border">
                    <?= $dados[0]['apelido'] ?>
               </div> 
                <a class="p-2" href="#.php">Mudar Apelido</a>
                <br><br>
                
                Email:
                <div class="conteiner-sm form-group p-2 border">
                    <?= $dados[0]["email"]?>
                </div>    
                <a class="p-2" href="#.php">Mudar Email</a>
                <br><br>

                
            </div>
        </div>    
        <br>
        <form action="#" method="GET">
            <button type="submit" class="btn btn-danger " id="disney">Excluir</button>
        </form>
    </div>
        
</main>
<?php
    include 'fragmentos/rodape.php';
?>