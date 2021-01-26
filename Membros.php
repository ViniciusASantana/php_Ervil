<?php
$titulo = "Membros";
include 'fragmentos/cabecalho.php';
include 'fragmentos/menuResponsivo.php';

$con= conectarBanco();
$user = executarSelect($con, "SELECT * FROM usuario");
$usuario = executarSelect($con, "SELECT cargo from Usuario_has_Comunidade where usuario_idUsuario={$_SESSION['log']}");
$dados = executarSelect($con, "SELECT * from Usuario_has_Comunidade where comunidade_idComunidade=1");
desconectarBanco($con);


?>

<main class="container mt-5">
        <div class="corpo">
            <h2><strong>Membros</strong></h2>
            <br>
        <!-- uma boa pratica de organizacao - coloque uma div para agrupar o label e o input --> 
        <div class=" px-4 d-flex a">
            
            <ul class="list-group">
                <?php
                    for($e = 0; $e < count($dados);$e++){
                        if(($e+1)%2==1){
                            $apelido=$dados[$e];
                            echo "<li class='list-group-item heigthCom2 p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=imagens/usuario.png alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>";
                                switch ($apelido["cargo"]){
                                    Case 1: echo "<strong>{$user[$e]["apelido"]}</strong>";break;
                                    Case 2: echo "<strong>{$user[$e]["apelido"]}</strong>"
                                            . "<small class='rounded-sm bg-info priv'>Moderador</small>";break;
                                    default : echo "<strong>{$user[$e]["apelido"]}</strong>"
                                            . "<small class='rounded-sm bg-danger priv'>Dono</small>";
                                }
                                if ($usuario[0]["cargo"] == 2 || $usuario[0]["cargo"] == 3) {
                                    echo "<form action='#' method='GET'>"
                                    . "<button type='submit' class='btn'><small>Promover</small></button>"
                                    . "<button type='submit' class='btn'><small>Expusar</small></button>"
                                    . "<a class='btn' href='Reporte.php'><small>Reportar</small></a>"
                                    . "</form></div></li>";
                                } else {
                                    echo "<p><a class='btn' href='Reporte.php'><small>Reportar</small></a></div></li>";
                                } 
                                    
                        }
                    }

                ?>

            </ul>
                <ul class="list-group">

                <?php
                    for($e = 0; $e < count($dados);$e++){
                        if(($e+1)%2==0){
                            $apelido=$dados[$e];
                            echo "<li class='list-group-item heigthCom2 p-4'><div class='d-flex rounded-sm conteiner-sm form-group ' >"
                            . "<a class='px-2 py-1'><img src=imagens/usuario.png alt='Imagem de Perfil' class='border border-dark rounded-circle' width='60px' height='60px'/></a>"
                            . "<div class='form-group col'>";
                            switch ($apelido["cargo"]){
                                Case 1: echo "<strong>{$user[$e]["apelido"]}</strong>";break;
                                Case 2: echo "<strong>{$user[$e]["apelido"]}</strong>"
                                        . "<small class='rounded-sm bg-info priv'>Moderador</small>";break;
                                default : echo "<strong>{$user[$e]["apelido"]}</strong>"
                                        . "<small class='rounded-sm bg-danger priv'>Dono</small>";
                            }
                                if ($usuario[0]["cargo"] == 2 || $usuario[0]["cargo"] == 3) {
                                    echo "<form action='#' method='GET'>"
                                    . "<button type='submit' class='btn'><small>Promover</small></button>"
                                    . "<button type='submit' class='btn'><small>Expusar</small></button>"
                                    . "<a class='btn' href='Reporte.php'><small>Reportar</small></a>"
                                    . "</form></div></li>";
                                } else {
                                    echo "<p><a class='btn' href='Reporte.php'><small>Reportar</small></a></div></li>";
                                } 
                                    
                        }
                    }

                ?>

            </ul>
        </div>
        
        
        </div>
    
        
</main>

<?php
    include 'fragmentos/rodape.php';
    
    
?>
