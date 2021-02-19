<?php
$titulo = "Página Inicial";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';

include 'fragmentos/menuResponsivo.php';
?>
<main class="container">

    <!-- jumbotron eh como se fosse um banner -->

    <div class="estilo-borda-inicio">  
            <div class="jumbotron bg-transparent">

                <h1 id="estilo-titulo" class="text-white"> Ervil</h1>
                <h3  class="text-white" id="estilo-texto-inicio">  <p class="solid">Bem vindo a rede social mais completa e interativa.</p></h3>

            </div>  
        </div>
    <div class="d-flex mx-auto align-items-center" style="width: 100%;">
        <div class="estilo_card_inicio2">
        <div class="card-group">
            <div class="card">
                <img src="imagens/imagem5.jpg" class="card-img-top" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">sobre nós</h5>
                        <p class="card-text">Saiba mais sobre nos.</p><br/>
                        <a href="SobreNos.php" class="btn btn-primary">vamos lá</a>

                    </div>
            </div>
        </div>
    </div>
    <div class="estilo_card_inicio2">
        <div id="seguranca-estilo" class="card">
            <img src="imagens/imagem8.jpg" class="card-img-top" alt="..." >

                <div class="card-body">
                    <h5 class="card-title"style="display: inline-block;">segurança</h5> 
                    <i class="bi bi-exclamation-triangle"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                    </svg>
                    <p class="card-text" >Veja nossos termos de segurança, para que não haja irregularidades.</p>
                    <a href="Seguranca.php" class="btn btn-primary">vamos lá</a>
                </div>
        </div>
    </div> 
    <div class="estilo_card_inicio3">
        <div class="card">
            <img src="imagens/imagem7.jpg" class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">cadastre-se:</h5>
                    <p class="card-text">Venha fazer parte dessa comuidade tambem</p><br>
                        <a href="Cadastro.php" class="btn btn-primary">vamos lá</a>
                </div>
        </div>
    </div>
</div>
</main>

<!--    </div>  -->


<?php
include 'fragmentos/rodape.php';
?>

