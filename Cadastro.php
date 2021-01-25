<?php
$local = "Início";
$titulo = "Cadastrar";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

?>

<main class="container mt-5">
    
    <!-- jumbotron eh como se fosse um banner -->
  
    
    <!-- vejam que nao colocamos o action ainda -->
    <div class=" justify-content-md-center">
        <div class="corpo ">
            <h3 class="p-2"><strong>Cadastro</strong></h3>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input -->  
            <?php
            include 'fragmentos/formularios/formCadastro.php';
            ?>   
        </div>
    </div>
    
    
</main>

<?php
    include 'fragmentos/rodape.php';
?>

