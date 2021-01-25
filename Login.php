<?php
$local = "Início";
$titulo = "Entrar";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

?>

<main class="container mt-5">
    <div class="justify-content-md-center">
        <div class="corpo ">
            <h3 class="p-2"><strong>Entrar</strong></h3>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input -->       
        <?php
            include 'fragmentos/formularios/formLogin.php';
        ?>
        </div>
    </div>
</main>

<?php
    include 'fragmentos/rodape.php';
?>

