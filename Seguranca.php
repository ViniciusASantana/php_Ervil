<?php
$titulo = "sobre nós";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';

include 'fragmentos/menuResponsivo.php';
?>
<main class="container">

    <!-- jumbotron eh como se fosse um banner -->
    <div class="jumbotron bg-warning" id="estilo-borda-comunidade">
        <h1 id="titulo-seguranca"> Atenção ! </h1>
        <h3> Siga os termos e condições de segurança abaixo, para que voce não viole
            nenhuma de nossas directrizes.
            <!--            Segundo as directrizes do site, todo e qualquer tipo de conteúdo 
                    inapropriado é  terminantemente proibido. Aquele(a) que  violar  essa clausula
                    sera expulso(a) do site.--></h3>
        <br>
        <h2 class="estilo-topico-seguranca">É terminantemente proibido o uso de imagens inapropriadas dentro
            das comunidades.</h2>
        <h2 class="estilo-topico-seguranca">Qualquer usuario que infrija as regras, podera ser reportado e banido
            da comunidade.</h2>
        <h2 class="estilo-topico-seguranca"> Comunidades que promovem Bullyng, chingamentos ou palavras 
            ofencivas contra pessoas não são permitidas, e qualquer sinal de irregularidades, conta como
            banimento da comunidade.</h2>
        <h2 class="estilo-topico-seguranca">Qualquer usuario podera, caso necessario, reportar uma pessoa ou comunidade,
            se alguma regra for violada.</h2>
        <br>
        <br>
        <a href="index.php" class="btn btn-primary">Eu li e concordo com os termos de segurança !</a>
    </div>    
    <!--    <div class="estilo-topico-seguranca">
            <h2>é terminantemente proibido o uso de imagens inapropriadas</h2>
        </div>-->
</main>

<?php
include 'fragmentos/rodape.php';
?>
