<?php
$titulo = "Reporte";
$alvo = "Bob Esponja Calça Quadrada";
// um exemplo de trabalhar com arquivos externos 
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

?>
<main class="container mt-5">
    <div class="corpo2 m-auto">
        <h2><strong>Reporte</strong></h2>
        <br>
        <div class="menu p-4 rounded-sm" >
            <div class="form-group col">
                Alvo:
                <div class="conteiner-sm form-group p-2 border">
                    <?= $alvo ?>
               </div> 

                Motivo:
                <br>
                <form action="#" method="GET">
                    <textarea name="comentario" id="comentario" rows=3 cols=35 maxlength=80 placeholder=" Maxímo de 80 caracteres""></textarea>
                </form>
                
            </div>
        </div>    
        <br>
        <form action="#" method="GET">
            <button type="submit" class="btn btn-info m-auto" id="disney">Enviar</button>
        </form>
    </div>
        
</main>
<?php
    include 'fragmentos/rodape.php';
?>