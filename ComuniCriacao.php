<?php
$titulo = "Criar";
// um exemplo de trabalhar com arquivos externos
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';
//Teste se aparece para o Eduardo
//Apareceu?
?>

<main class="container mt-5">
        <div class="corpo">
            <h2><strong>Criar nova Comunidade</strong></h2>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input -->
            <?php
                include 'fragmentos/formularios/formComunidade.php';
            ?>
        </div>
</main>

<?php
    include 'fragmentos/rodape.php';
?>
