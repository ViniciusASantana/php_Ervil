<?php
$titulo = "Perfil";

// um exemplo de trabalhar com arquivos externos
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con= conectarBanco();
$dados= executarSelect($con, "SELECT * FROM Usuario WHERE idUsuario={$_SESSION['log']}");


if(isset($_POST['Excluir'])){
    executarDelete($con, "DELETE FROM Usuario WHERE idUsuario={$_SESSION['log']}");
    executarDelete($con, "DELETE FROM Postagem WHERE usuario={$_SESSION['log']}");
    session_destroy();
    header('location:Index.php');
}
if(isset($_POST['Enviar'])){
    $hora = date("Ymd_His_");
    $nomeFotoOriginal = $_FILES["foto_usuario"]["name"];
    $nomeFotoTemp = $_FILES['foto_usuario']['tmp_name'];
    $nomeFotoRenomeada = $hora. $nomeFotoOriginal;
    move_uploaded_file($nomeFotoTemp, "upload/$nomeFotoRenomeada");
    
    executarUpdate($con, "UPDATE Usuario SET foto_usuario='upload/$nomeFotoRenomeada' WHERE idUsuario={$_SESSION['log']}");
    header('location:MeuPerfil.php');
}
?>
<main class="container mt-5">
    <div class="media" style="width: 100%;">
        <div class="d-flex" style="width: 100%;">
            <div class="p-3 rounded-sm mx-auto" style="background-color: white;border-radius: 20px;width: 30%;height: auto;">
                <div class="text-center">
                <img src=<?= $dados[0]['foto_usuario'] ?> alt="Imagem de Perfil" class="border border-dark rounded-lg" width="250rem" height="250rem"/>
                </div>
                <form action="MeuPerfil.php" method="POST" enctype="multipart/form-data">
                    <input name='foto_usuario' id="foto_usuario" class="p-2" type="file" action="MeuPerfil.php" method="POST" required>
                    <button type="submit" class="btn btn-primary" name="Enviar" value="Enviar"  >Enviar Foto</button>
                </form>
            </div>

            <div class="p-3 ml-4 rounded-sm" style="background-color: white;border-radius: 20px;width: 70%;height: auto;">
                <div class="form-group col">
                    Apelido:
                    <div class="conteiner-sm form-group p-2 border">
                        <?= $dados[0]['apelido'] ?>
                   </div>
                    <a class="p-2" href="Apelido.php">Mudar Apelido</a>
                    <br><br>

                    Email:
                    <div class="conteiner-sm form-group p-2 border">
                        <?= $dados[0]["email"]?>
                    </div>
                    <a class="p-2" href="Email.php">Mudar Email</a>
                    <br><br>
                    
                </div>
                <form action="MeuPerfil.php" method="POST" style="width: 100%;">
                    <button type="submit" class="btn btn-primary ml-3" formaction="Senha.php">Mudar minha senha</button>
                    <button onclick="return confirm('Você tem certeza que deseja excluir sua conta?')" type="submit" class="btn btn-danger" name="Excluir" value=1 style="margin-left: 49%;">Excluir minha conta</button>
                </form>
            </div>

        </div>
</div>
</main>
<?php
    desconectarBanco($con);
    include 'fragmentos/rodape.php';
?>
