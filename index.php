<?php
$titulo = "Página Inicial";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';

include 'fragmentos/menuResponsivo.php';


?>
<main class="container">
    
    <!-- jumbotron eh como se fosse um banner -->
    <div class="jumbotron bg-warning">
        <h1 id="estilo-titulo"> Ervil</h1>
        <h3 id="estilo-texto-inicio"> Bem vindo a rede social mais completa e interativa.</h3>
    </div>    
    
</main>
<div class="estilo_card_inicio1">
<div class="card-group">
  <div class="card">
      <img src="imagens/imagem5.jpg" class="card-img-top" alt="..." >
    <div class="card-body">
      <h5 class="card-title">sobre nós</h5>
      <p class="card-text">Venha descobrir oque é Ervil.</p><br/>
      <a href="SobreNos.php" class="btn btn-primary">vamos lá</a>
    </div>
    </div>
  </div>
</div>
    <div class="estilo_card_inicio2">
        <div id="seguranca-estilo" class="card">
            <img src="imagens/imagem8.jpg" class="card-img-top" alt="..." >
    <div class="card-body">
      <h5 class="card-title">segurança</h5>
      <p class="card-text">veja nossos termos de segurança para que não haja irregularidades.</p>
      <a href="Seguranca.php" class="btn btn-primary">vamos lá</a>
    </div>
  </div>
  </div> 
    <div class="estilo_card_inicio3">
  <div class="card">
      <img src="imagens/imagem7.jpg" class="card-img-top" alt="..." >
    <div class="card-body">
      <h5 class="card-title">cadastre-se</h5>
      <p class="card-text">Venha fazer parte dessa comuidade tambem</p><br>
      <a href="Cadastro.php" class="btn btn-primary">vamos lá</a>
    </div>
  </div>
</div>
<!--    </div>  -->


<?php
    include 'fragmentos/rodape.php';
?>

