<?php
$titulo = "Membros";
$comunidade = "IFSP";
$imagem= "imagens/logo1.jpg";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

?>

<main class="container mt-5">
    <div class=" mx-auto" style="width: 45vw;">
        <h5 class="text-monospace"><strong>Criar uma postagem</strong></h5>
        <hr>
        <div class="conteiner-sm form-group p-2 border" style="width: 15vw;">
            <img src=<?= $imagem?> alt='Pedidos' class='rounded-circle' width='20' height='20'/>
            <?= $comunidade?>
        </div>
        
            
        <div class="p-4 d-flex align-content-center" style="background-color: whitesmoke;">
            <form action="#" method="GET">
                <textarea name="comentario" id="criar" rows=3 cols=35 maxlength=80 placeholder=" Texto">

                </textarea>
                <br><br>
                <button type='submit' class='btn bg-info' id="confirmar">Postar</button>
            </form>

                
        </div>
        
        
        
    </div>
        
</main>

<?php
    include 'fragmentos/rodape.php';
?>
