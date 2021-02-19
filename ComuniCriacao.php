<?php
$titulo = "Criar";
// um exemplo de trabalhar com arquivos externos
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';
//Teste se aparece para o Eduardo
//Apareceu?
?>

<main class="container mt-4">
<!--    <div class="">-->
    <link href='https://fonts.googleapis.com/css?family=EB Garamond' rel='stylesheet' > 
    <style> body { font-family: 'EB Garamond';font-size: 22px; } </style> 
    <div class="media" style="width: 118%;" id="estilo-borda-comunidade">

        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input -->
        <?php
        include 'fragmentos/formularios/formComunidade.php';
        ?>
    </div>
    <!--</div>-->
</main>

<?php
include 'fragmentos/rodape.php';
?>
